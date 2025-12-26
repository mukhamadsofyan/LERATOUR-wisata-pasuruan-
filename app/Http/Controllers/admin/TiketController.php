<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;

class TiketController extends Controller
{
    private function midtransConfig()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /* ================= BAYAR PERTAMA ================= */
    public function bayar(Request $request)
    {
        $request->validate([
            'nama_wisata'   => 'required',
            'harga_tiket'   => 'required|numeric',
            'jumlah_tiket'  => 'required|numeric|min:1',
            'total_bayar'   => 'required|numeric',
            'nama_pemesan'  => 'required',
            'email'         => 'required|email',
        ]);

        $orderId = 'TIKET-' . time();

        Transaksi::create([
            'order_id' => $orderId,
            'nama_wisata' => $request->nama_wisata,
            'nama_pemesan' => $request->nama_pemesan,
            'email' => $request->email,
            'harga_tiket' => $request->harga_tiket,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_bayar' => $request->total_bayar,
            'payment_status' => 'pending',
        ]);

        $this->midtransConfig();

        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int)$request->total_bayar,
            ],
            'customer_details' => [
                'first_name' => $request->nama_pemesan,
                'email' => $request->email,
            ],
        ]);

        return response()->json([
            'snap_token' => $snapToken,
            'order_id' => $orderId,
        ]);
    }

    /* ================= HALAMAN PENDING ================= */
    public function showPending(Request $request)
    {
        $order_id = $request->query('order_id');
        $transaksi = Transaksi::where('order_id', $order_id)->first();

        if ($transaksi && $transaksi->payment_status === 'settlement') {
            return redirect('/invoice/' . $order_id);
        }

        return view('landingpage.pendingpembayaran', compact('order_id', 'transaksi'));
    }

    /* ================= BAYAR ULANG ================= */
    public function bayarUlang(Request $request)
    {
        $old = Transaksi::where('order_id', $request->order_id)->firstOrFail();

        if ($old->payment_status !== 'pending') {
            return response()->json(['error' => true], 400);
        }

        $newOrderId = 'TIKET-' . time();

        Transaksi::create([
            'order_id' => $newOrderId,
            'nama_wisata' => $old->nama_wisata,
            'nama_pemesan' => $old->nama_pemesan,
            'email' => $old->email,
            'harga_tiket' => $old->harga_tiket,
            'jumlah_tiket' => $old->jumlah_tiket,
            'total_bayar' => $old->total_bayar,
            'payment_status' => 'pending',
        ]);

        $this->midtransConfig();

        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $newOrderId,
                'gross_amount' => (int)$old->total_bayar,
            ],
            'customer_details' => [
                'first_name' => $old->nama_pemesan,
                'email' => $old->email,
            ],
        ]);

        return response()->json([
            'snap_token' => $snapToken,
            'order_id' => $newOrderId,
        ]);
    }

    /* ================= POLLING STATUS ================= */
    public function pollStatus($orderId)
    {
        $this->midtransConfig();
        $trx = Transaksi::where('order_id', $orderId)->first();

        if (!$trx) return response()->json(['status' => 'not_found']);

        if ($trx->payment_status === 'settlement') {
            return response()->json([
                'status' => 'settlement',
                'redirect' => url('/invoice/' . $orderId),
            ]);
        }

        try {
            /** @var object $status */
            $status = (object) Transaction::status($orderId);
        } catch (\Exception $e) {
            return response()->json(['status' => 'pending']);
        }

        if (in_array($status->transaction_status, ['settlement', 'capture'])) {
            $trx->update([
                'payment_status' => 'settlement',
                'payment_method' => $status->payment_type,
                'transaction_id' => $status->transaction_id,
            ]);

            return response()->json([
                'status' => 'settlement',
                'redirect' => url('/invoice/' . $orderId),
            ]);
        }

        return response()->json(['status' => 'pending']);
    }

public function finish(Request $request)
{
    $orderId = $request->order_id;

    $this->midtransConfig();

    $trx = Transaksi::where('order_id', $orderId)->firstOrFail();

    /** @var object $status */
    $status = (object) \Midtrans\Transaction::status($orderId);

    if (in_array($status->transaction_status, ['settlement', 'capture'])) {

        $trx->update([
            'payment_status' => 'settlement',
            'payment_method' => $status->payment_type,
            'transaction_id' => $status->transaction_id,
        ]);

        return redirect('/invoice/' . $orderId);
    }

    return redirect('/tiket/pending/' . $orderId);
}

}
