<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LERATOUR – Chat Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #6366f1;
            --bg: #f5f7fb;
            --card: #ffffffcc;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            height: 100vh;
            font-family: 'Inter', system-ui;
            background: linear-gradient(135deg, #eef2ff, #f5f7fb);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .app {
            width: 100%;
            max-width: 920px;
            height: 92vh;
            background: var(--card);
            backdrop-filter: blur(14px);
            border-radius: 22px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, .12);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* ================= HEADER ================= */
        .header {
            padding: 14px 18px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .back-btn {
            background: rgba(255, 255, 255, .2);
            border: none;
            color: #fff;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #fff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .info {
            flex: 1
        }

        .title {
            font-weight: 700;
            font-size: 15px;
        }

        .conv {
            font-size: 12px;
            opacity: .9;
        }

        /* ================= CHAT ================= */
        .chat {
            flex: 1;
            padding: 22px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: var(--bg);
        }

        .row {
            display: flex
        }

        .row.me {
            justify-content: flex-end
        }

        .bubble {
            max-width: 72%;
            padding: 12px 14px;
            border-radius: 18px;
            line-height: 1.45;
            font-size: 14px;
        }

        .me .bubble {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            border-bottom-right-radius: 6px;
        }

        .other .bubble {
            background: #fff;
            color: var(--text);
            border: 1px solid var(--border);
            border-bottom-left-radius: 6px;
        }

        .meta {
            margin-top: 6px;
            font-size: 11px;
            opacity: .75;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .wa-check {
            color: #d1d5db;
            font-weight: 600;
        }

        .wa-check.read {
            color: #3b82f6;
        }

        /* ================= TYPING ================= */
        #typing {
            padding: 8px 18px;
            font-size: 12px;
            color: var(--muted);
            display: none;
        }

        /* ================= INPUT ================= */
        .composer {
            padding: 14px;
            background: #fff;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 12px;
        }

        textarea {
            flex: 1;
            resize: none;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 12px 14px;
            font-size: 14px;
        }

        button {
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            border-radius: 14px;
            padding: 0 18px;
            font-weight: 600;
            cursor: pointer;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/pusher-js@8.4.0/dist/web/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.3/dist/echo.iife.js"></script>
</head>

<body>
    <div class="app">

        <!-- HEADER -->
        <div class="header">
            <button class="back-btn" onclick="history.back()">←</button>
            <div class="avatar">A</div>

            <div class="info">
                <div class="title">Admin LERATOUR</div>
            </div>

            <div class="conv">#{{ $conversation->id }}</div>
        </div>

        <!-- CHAT -->
        <div id="chat" class="chat">
            @foreach ($messages as $m)
                @php $cls = $m->sender_role === 'user' ? 'me' : 'other'; @endphp
                <div class="row {{ $cls }}">
                    <div class="bubble">
                        {!! nl2br(e($m->body)) !!}
                        <div class="meta">
                            {{ $m->created_at->format('H:i') }}
                            @if ($m->sender_role === 'user')
                                <span class="wa-check {{ $m->read_at ? 'read' : '' }}">
                                    {!! $m->read_at ? '✓✓' : '✓' !!}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="typing">Admin sedang mengetik…</div>

        <!-- INPUT -->
        <div class="composer">
            <textarea id="body" placeholder="Tulis pesan…"></textarea>
            <button id="sendBtn">Kirim</button>
        </div>

    </div>

    <script>
        const chat = document.getElementById('chat');
        const body = document.getElementById('body');
        const sendBtn = document.getElementById('sendBtn');
        const typing = document.getElementById('typing');

        chat.scrollTop = chat.scrollHeight;

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: "{{ env('PUSHER_APP_KEY') }}",
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            forceTLS: true
        });

        function appendMessage(p) {
            const row = document.createElement('div');
            row.className = 'row ' + (p.sender_role === 'user' ? 'me' : 'other');
            row.innerHTML = `
            <div class="bubble">
                ${p.body}
                <div class="meta">${p.time} <span class="wa-check">✓</span></div>
            </div>`;
            chat.appendChild(row);
            chat.scrollTop = chat.scrollHeight;
        }

        async function send() {
            if (!body.value.trim()) return;

            appendMessage({
                sender_role: 'user',
                body: body.value,
                time: new Date().toLocaleTimeString().slice(0, 5)
            });

            await fetch("{{ route('chat.send', $conversation->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    body: body.value
                })
            });

            body.value = '';
        }

        sendBtn.onclick = send;

        body.oninput = () => {
            Echo.private('conversation.{{ $conversation->id }}')
                .whisper('typing', {
                    user: 'admin'
                });
        };

        Echo.private('conversation.{{ $conversation->id }}')
            .listenForWhisper('typing', () => {
                typing.style.display = 'block';
                clearTimeout(window.t);
                window.t = setTimeout(() => typing.style.display = 'none', 1500);
            });
    </script>

</body>

</html>
