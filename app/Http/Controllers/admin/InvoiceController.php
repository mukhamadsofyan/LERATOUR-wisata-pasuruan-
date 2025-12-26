<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show($order_id)
    {
        $transaksi = Transaksi::where('order_id', $order_id)->firstOrFail();

        if ($transaksi->payment_status !== 'settlement') {
            return redirect('/')->with('error', 'Pembayaran belum selesai');
        }

        return view('landingpage.invoice', compact('transaksi'));
    }
    public function printTiket($order_id)
    {
        $transaksi = Transaksi::where('order_id', $order_id)->firstOrFail();

        if ($transaksi->payment_status !== 'settlement') {
            abort(403, 'Tiket belum dibayar');
        }

        // return view('tiket.print', compact('transaksi'));
    }

     public function index()
    {
        $transaksis = Transaksi::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.invoice.invoiceadmin', compact('transaksis'));
    }

    public function showadmin($id)
    {
        $invoice = Transaksi::findOrFail($id);

        return response()->json($invoice);
    }
}
