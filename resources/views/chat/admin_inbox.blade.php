<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

@include('layout.head')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* ===== CHAT HEADER ===== */
    #chatHeader {
        background: #fff;
    }

    .chat-header-name {
        font-weight: 600;
        font-size: 16px;
        color: #111827;
        /* KUNCI WARNA */
        opacity: 1 !important;
    }

    .chat-header-status {
        font-size: 12px;
        color: #10b981;
        /* hijau online */
        opacity: 1 !important;
    }

    /* ===== CHAT LIST WRAPPER ===== */
    #chatList {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    /* ===== CHAT ITEM ===== */
    .chat-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: 12px;
        background: #fff;
        border: none;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    /* hover */
    .chat-item:hover {
        background: #f3f4f6;
    }

    /* active */
    .chat-item.active {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        box-shadow: inset 4px 0 0 #4f46e5;
    }

    /* ===== AVATAR ===== */
    .chat-list-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* ===== CONTENT ===== */
    .chat-list-content {
        flex: 1;
        min-width: 0;
    }

    /* name */
    .chat-list-name {
        font-weight: 600;
        font-size: 14px;
        color: #111827;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* preview */
    .chat-list-preview {
        font-size: 13px;
        color: #6b7280;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-top: 2px;
    }

    /* ===== UNREAD BADGE ===== */
    .chat-list-badge {
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        background: #4f46e5;
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chat-item {
        cursor: pointer;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
    }

    .chat-item.active {
        background: #f3f4f6;
        border-left: 4px solid #4f46e5;
    }

    /* ===== CHAT BODY ===== */
    #chatBody {
        display: flex;
        flex-direction: column;
        gap: 18px;
        overflow-y: auto;
        padding: 20px 10px;
        background: #fafafa;
        scroll-behavior: smooth;
    }

    /* ===== ROW ===== */
    .chat-row {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        max-width: 100%;
    }

    /* kiri (user) */
    .chat-row.left {
        justify-content: flex-start;
    }

    /* kanan (admin) */
    .chat-row.right {
        justify-content: flex-end;
    }

    /* ===== AVATAR ===== */
    .chat-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* ===== BUBBLE ===== */
    .chat-bubble {
        max-width: 60%;
        padding: 12px 16px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.5;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    }

    /* USER */
    .chat-row.left .chat-bubble {
        background: #ffffff;
        color: #111;
        border-top-left-radius: 6px;
    }

    /* ADMIN */
    .chat-row.right .chat-bubble {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: #fff;
        border-top-right-radius: 6px;
    }
</style>

<body>
    @include('layout.preloader')

    <main>
        <div class="dashboard -is-sidebar-visible js-dashboard">
            @include('layout.sidebar')

            <div class="dashboard__content">
                <div class="dashboard__content_content">

                    <div class="mb-30">
                        <h1 class="text-30 fw-700">Messages</h1>
                        <p class="text-light-1">Inbox percakapan pengguna</p>
                    </div>

                    <div class="row y-gap-30 pt-40">

                        {{-- ================= LEFT ================= --}}
                        <div class="col-lg-4">
                            <div class="rounded-16 bg-white shadow-2 px-30 pt-30 pb-20">

                                <div id="chatList">
                                    @foreach ($conversations as $c)
                                        {{-- <button type="button"
                                            class="chat-item d-flex items-center gap-15 p-15 rounded-12 mb-10 w-100 text-left"
                                            onclick="openChatById({{ $c->id }})">


                                            <img src="{{ asset('template/img/dashboard/messages/main/4.png') }}"
                                                class="size-50 rounded-full">

                                            <div class="flex-1">
                                                <h5 class="fw-500">{{ $c->user?->name ?? 'User' }}</h5>
                                                <div class="text-14 text-light-1">
                                                    {{ $c->last_message ?? 'Belum ada pesan' }}
                                                </div>
                                            </div>

                                            @if ($c->unread_count > 0)
                                                <div
                                                    class="size-18 rounded-full bg-accent-2 text-white flex-center text-11">
                                                    {{ $c->unread_count }}
                                                </div>
                                            @endif
                                        </button> --}}
                                        <button type="button" class="chat-item"
                                            onclick="openChatById({{ $c->id }})">

                                            <img src="{{ asset('template/img/dashboard/messages/main/4.png') }}"
                                                class="chat-list-avatar">

                                            <div class="chat-list-content">
                                                <div class="chat-list-name">
                                                    {{ $c->user?->name ?? 'User' }}
                                                </div>

                                                <div class="chat-list-preview">
                                                    {{ $c->messages->first()?->body ?? 'Belum ada pesan' }}
                                                </div>
                                                <div class="chat-list-preview">
                                                    {{ $c->last_message_at }}
                                                </div>
                                            </div>

                                            @if ($c->unread_count > 0)
                                                <span class="chat-list-badge">{{ $c->unread_count }}</span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>


                            </div>
                        </div>

                        {{-- ================= RIGHT ================= --}}
                        <div class="col-lg-8">
                            <div class="rounded-16 bg-white shadow-2 px-40 pt-30 pb-30
            d-flex flex-column"
                                style="height: calc(100vh - 200px);">


                                <div id="chatHeader" class="pb-20 border-bottom text-light-1">
                                    Pilih chat untuk melihat pesan
                                </div>

                                <div id="chatBody" class="flex-1 overflow-auto py-30"></div>

                                <div id="chatInput" class="pt-20 border-top d-none">
                                    <div class="d-flex gap-15">
                                        <input id="messageInput" class="border-1 rounded-200 px-20 py-15 w-100"
                                            placeholder="Type a message">
                                        <button onclick="sendMessage()"
                                            class="button -md -dark-1 bg-accent-1 text-white">
                                            Send
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </main>

    @include('layout.js')

    <script>
        /* ======================================================
                   GLOBAL STATE
                ====================================================== */
        window.currentChat = null;
        window.lastMessageId = 0;
        window.pollInterval = null;

        /* ======================================================
           OPEN CHAT (KLIK LIST KIRI)
        ====================================================== */
        window.openChatById = async function(chatId) {
            window.currentChat = chatId;
            window.lastMessageId = 0;

            // ===== ACTIVE STATE LEFT =====
            document.querySelectorAll('.chat-item').forEach(item => {
                if (item.getAttribute('onclick')?.includes(`(${chatId})`)) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });

            try {
                const res = await fetch(
                    `{{ route('admin.chat.detail', ':id') }}`.replace(':id', chatId), {
                        headers: {
                            'Accept': 'application/json'
                        }
                    }
                );

                if (!res.ok) {
                    console.error(await res.text());
                    alert('Gagal membuka chat');
                    return;
                }

                const data = await res.json();

                /* ===== HEADER ===== */
                document.getElementById('chatHeader').innerHTML = `
    <div class="d-flex items-center gap-12">
        <img src="{{ asset('template/img/dashboard/messages/main/4.png') }}" class="size-40 rounded-full">

        <div>
            <div class="chat-header-name">
                ${data.conversation.name}
            </div>
            <div class="chat-header-status">
                Active
            </div>
        </div>
    </div>
`;


                /* ===== BODY ===== */
                let html = '';
                data.messages.forEach(m => {
                    window.lastMessageId = m.id;
                    html += renderMessage(m);
                });

                document.getElementById('chatBody').innerHTML = html;
                document.getElementById('chatInput').classList.remove('d-none');

                scrollBottom();
                startPolling();

            } catch (err) {
                console.error(err);
                alert('Error membuka chat');
            }
        };

        /* ======================================================
           RENDER MESSAGE (KANAN / KIRI)
        ====================================================== */
        function renderMessage(m) {
            const isAdmin = m.sender_role === 'admin';

            return `
        <div class="chat-row ${isAdmin ? 'right' : 'left'}">
            ${!isAdmin ? `<img src="{{ asset('template/img/dashboard/messages/main/4.png') }}" class="chat-avatar">` : ''}
            <div class="chat-bubble">
                ${m.body}
            </div>
            ${isAdmin ? `<img src="{{ asset('template/img/dashboard/messages/main/4.png') }}" class="chat-avatar">` : ''}
        </div>
    `;
        }

        /* ======================================================
           SEND MESSAGE (TANPA APPEND MANUAL)
        ====================================================== */
        window.sendMessage = async function() {
            const input = document.getElementById('messageInput');
            if (!input.value.trim() || !window.currentChat) return;

            const body = input.value;
            input.value = '';

            try {
                const res = await fetch(
                    `{{ route('chat.admin.send', ':id') }}`.replace(':id', window.currentChat), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document
                                .querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            body
                        })
                    }
                );

                if (!res.ok) {
                    console.error(await res.text());
                    alert('Gagal mengirim pesan');
                }

                // ❌ jangan append di sini (anti dobel)

            } catch (err) {
                console.error(err);
                alert('Gagal mengirim pesan');
            }
        };

        /* ======================================================
           POLLING CHAT (AMBIL PESAN BARU)
        ====================================================== */
        function startPolling() {
            if (window.pollInterval) clearInterval(window.pollInterval);

            window.pollInterval = setInterval(async () => {
                if (!window.currentChat) return;

                try {
                    const res = await fetch(
                        `{{ route('chat.admin.poll', ':id') }}`.replace(':id', window.currentChat) +
                        `?last_id=${window.lastMessageId}`, {
                            headers: {
                                'Accept': 'application/json'
                            }
                        }
                    );

                    if (!res.ok) return;

                    const data = await res.json();

                    data.forEach(m => {
                        window.lastMessageId = m.id;
                        document.getElementById('chatBody')
                            .insertAdjacentHTML('beforeend', renderMessage(m));
                        scrollBottom();
                    });

                } catch (err) {
                    console.error('Polling error:', err);
                }
            }, 2000);
        }

        /* ======================================================
           SCROLL KE BAWAH
        ====================================================== */
        function scrollBottom() {
            const box = document.getElementById('chatBody');
            box.scrollTop = box.scrollHeight;
        }
    </script>

</body>

</html>
