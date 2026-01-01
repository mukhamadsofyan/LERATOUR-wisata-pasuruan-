<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
{
    // halaman chat (dipakai juga dari tiket)
  public function show(Request $request)
  {
    $user = Auth::user();

    $conversation = Conversation::firstOrCreate(
      ['user_id' => $user->id],
      ['status' => 'open']
    );

    // kalau dibuka dari tiket:
    $transaksiId = $request->query('transaksi_id');

    // Bot default: kalau user masuk dari tiket, buat 1 pesan system untuk konteks tiket (sekali per tiket)
    if ($transaksiId) {
      $exists = Message::where('conversation_id', $conversation->id)
        ->where('sender_role', 'system')
        ->where('transaksi_id', $transaksiId)
        ->exists();

      if (!$exists) {
        Message::create([
          'conversation_id' => $conversation->id,
          'sender_id' => null,
          'sender_role' => 'system',
          'body' => "Halo! Pertanyaan cepat terkait transaksi #{$transaksiId}:\n\n✅ Apakah tiket masih tersedia?\n✅ Bisa dipakai tanggal berapa?\n✅ Cara penukaran tiketnya gimana?\n\nSilakan balas ya 🙂",
          'type' => 'text',
          'transaksi_id' => (int)$transaksiId,
          'meta' => [
            'source' => 'ticket',
          ],
        ]);
      }
    }

    $messages = $conversation->messages()->orderBy('id')->get();

    return view('chat.user', [
      'conversation' => $conversation,
      'messages' => $messages,
      'transaksiId' => $transaksiId,
    ]);
  }
}
