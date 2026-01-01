<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(Request $request, Conversation $conversation)
    {
        $request->validate([
            'body' => ['required', 'string', 'max:5000'],
            'transaksi_id' => ['nullable', 'integer'],
        ]);

        $user = Auth::user();

        // authorize: pemilik conversation atau admin
        $isAdmin = strtolower(trim($user->role ?? '')) === 'admin';
        if (!$isAdmin && $conversation->user_id !== $user->id) {
            abort(403);
        }

        $senderRole = $isAdmin ? 'admin' : 'user';

        $msg = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'sender_role' => $senderRole,
            'body' => $request->body,
            'type' => 'text',
            'transaksi_id' => $request->transaksi_id,
            'meta' => $request->transaksi_id ? ['source' => 'ticket'] : null,
        ]);

        $conversation->update([
            'last_message_at' => now(),
            'assigned_admin_id' => $isAdmin ? $user->id : $conversation->assigned_admin_id,
        ]);

        broadcast(new MessageSent($msg))->toOthers();

        return response()->json([
            'ok' => true,
            'message' => [
                'id' => $msg->id,
                'conversation_id' => $msg->conversation_id,
                'sender_id' => $msg->sender_id,
                'sender_role' => $msg->sender_role,
                'sender_name' => $user->name,
                'body' => $msg->body,
                'transaksi_id' => $msg->transaksi_id,
                'created_at' => $msg->created_at->toISOString(),
            ],
        ]);
    }
}
