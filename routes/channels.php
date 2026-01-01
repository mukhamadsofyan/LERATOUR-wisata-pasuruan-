<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Conversation;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
| Di sini kita atur siapa saja yang boleh listen channel realtime
| Shopee-style: 1 conversation = 1 private channel
*/

Broadcast::channel('chat.conversation.{conversationId}', function ($user, $conversationId) {
    $conversation = Conversation::find($conversationId);

    if (!$conversation) {
        return false;
    }

    // user pemilik conversation
    if ($conversation->user_id === $user->id) {
        return true;
    }

    // admin boleh masuk semua chat
    return strtolower(trim($user->role ?? '')) === 'admin';
});
