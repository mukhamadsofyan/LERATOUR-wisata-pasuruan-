<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChatController extends Controller
{
    /**
     * ==================================
     * ADMIN INBOX (HALAMAN UTAMA)
     * ==================================
     */
   public function index()
{
    $conversations = Conversation::with([
            'user',
            'messages' => function ($q) {
                $q->latest()->limit(1);
            }
        ])
        ->withCount([
            'messages as unread_count' => function ($q) {
                $q->where('sender_role', 'user')
                  ->whereNull('read_at');
            }
        ])
        ->latest('updated_at')
        ->get();

    return view('chat.admin_inbox', compact('conversations'));
}


    /**
     * ==================================
     * DETAIL CHAT (AJAX - KANAN)
     * ==================================
     */
    public function detail(Conversation $conversation)
    {
        $conversation->load('user');

        // Tandai pesan user sebagai dibaca
        Message::where('conversation_id', $conversation->id)
            ->where('sender_role', 'user')
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        $messages = Message::where('conversation_id', $conversation->id)
            ->orderBy('id')
            ->get();

        // 🔥 SAFETY FIX:
        // Kalau conversation belum punya last_message tapi message sudah ada
        if ($conversation->last_message === null && $messages->isNotEmpty()) {
            $last = $messages->last();

            $conversation->update([
                'last_message'    => $last->body,
                'last_message_at' => $last->created_at,
            ]);
        }

        return response()->json([
            'conversation' => [
                'id'   => $conversation->id,
                'name' => $conversation->user?->name ?? 'User',
            ],
            'messages' => $messages,
        ]);
    }

    /**
     * ==================================
     * ADMIN KIRIM PESAN (AJAX)
     * ==================================
     */
    public function send(Request $request, Conversation $conversation)
    {
        $request->validate([
            'body' => 'required|string'
        ]);

        $message = Message::create([
    'conversation_id' => $conversation->id,
    'sender_id'       => Auth::id(), // ✅ FINAL FIX
    'sender_role'     => 'admin',    // ⚠️ ini admin controller
    'body'            => $request->body,
]);

$conversation->update([
    'last_message'    => $message->body,
    'last_message_at' => $message->created_at,
]);


        return response()->json([
            'ok' => true,
            'message' => $message
        ]);
    }


    /**
     * ==================================
     * POLLING CHAT (KANAN)
     * ==================================
     */
    public function poll(Conversation $conversation)
    {
        $lastId = request('last_id', 0);

        $messages = Message::where('conversation_id', $conversation->id)
            ->where('id', '>', $lastId)
            ->orderBy('id')
            ->get();

        // 🔥 Update conversation jika ada message baru
        if ($messages->isNotEmpty()) {
            $last = $messages->last();

            $conversation->update([
                'last_message'    => $last->body,
                'last_message_at' => $last->created_at,
            ]);
        }

        return response()->json($messages);
    }

    /**
     * ==================================
     * POLLING LIST CHAT (KIRI)
     * ==================================
     */
    public function pollList()
    {
        $conversations = Conversation::with('user')
            ->withCount([
                'messages as unread_count' => function ($q) {
                    $q->where('sender_role', 'user')
                        ->whereNull('read_at');
                }
            ])
            ->with(['messages' => function ($q) {
                $q->latest()->limit(1);
            }])
            ->orderByDesc('last_message_at')
            ->get()
            ->map(function ($c) {

                $lastMsg = $c->messages->first();

                return [
                    'id' => $c->id,
                    'user' => [
                        'name' => $c->user?->name ?? 'User',
                    ],
                    // 🔥 AMAN: tidak bergantung last_message saja
                    'last_message' => $c->last_message
                        ?: ($lastMsg?->body ?? 'Belum ada pesan'),

                    'last_message_at' => optional(
                        $c->last_message_at ?? $lastMsg?->created_at
                    )->format('H:i'),

                    'unread_count' => $c->unread_count,
                ];
            });

        return response()->json($conversations);
    }
}
