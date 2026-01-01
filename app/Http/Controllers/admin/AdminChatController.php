<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChatController extends Controller
{
    public function index()
    {
        $conversations = Conversation::with('user')
            ->withCount('messages')
            ->orderByDesc('last_message_at')
            ->paginate(20);

        return view('chat.admin_inbox', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        $conversation->load(['user', 'messages.sender']);

        return view('chat.admin_show', [
            'conversation' => $conversation,
            'messages' => $conversation->messages()->orderBy('id')->get(),
        ]);
    }

    // 🔥 INI YANG SEBELUMNYA TIDAK ADA (KUNCI)
    // public function send(Request $request, Conversation $conversation)
    // {
    //     $request->validate([
    //         'body' => 'required|string|max:5000',
    //         'transaksi_id' => 'nullable|integer',
    //     ]);

    //     // pastikan admin (sesuaikan kalau pakai role lain)
    //     if (strtolower(Auth::user()->role ?? '') !== 'admin') {
    //         abort(403);
    //     }

    //     //  SIMPAN PESAN KE DATABASE
    //     $message = Message::create([
    //         'conversation_id' => $conversation->id,
    //         'sender_id' => Auth::id(),
    //         'sender_role' => 'admin',
    //         'body' => $request->body,
    //         'type' => 'text',
    //         'transaksi_id' => $request->transaksi_id,
    //     ]);

    //     // ✅ UPDATE INBOX (INI YANG BIKIN REFRESH AMAN)
    //     $conversation->update([
    //         'last_message' => $request->body,
    //         'last_message_at' => now(),
    //     ]);

    //     // 🔔 REALTIME (opsional tapi direkomendasikan)
    //     broadcast(new MessageSent($message))->toOthers();

    //     return response()->json([
    //         'ok' => true,
    //         'message' => [
    //             'body' => $message->body,
    //             'transaksi_id' => $message->transaksi_id,
    //             'created_at' => $message->created_at->toDateTimeString(),
    //         ]
    //     ]);
    // }
    public function send(Request $request, Conversation $conversation)
{
    $message = Message::create([
        'conversation_id' => $conversation->id,
        'sender_id' => Auth::id(),
        'sender_role' => 'admin',
        'body' => $request->body,
    ]);

    return response()->json([
        'ok' => true,
        'message' => [
            'body' => $message->body,
            'created_at' => $message->created_at->toDateTimeString(),
        ]
    ]);
}

}
