<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #5b5cf6;
            --bg: #f3f5ff;
            --panel: #ffffff;
            --me: #5b5cf6;
            --other: #ffffff;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: Inter, system-ui;
            background: #eef1ff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* APP */
        .app {
            width: 100%;
            max-width: 980px;
            height: 92vh;
            background: var(--panel);
            border-radius: 22px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, .12);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* HEADER */
        .header {
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            border-bottom: 1px solid var(--border);
            background: #fff;
        }

        .back {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .header-info {
            flex: 1;
        }

        .name {
            font-weight: 700;
            font-size: 16px;
        }

        .header-id {
            font-size: 12px;
            color: var(--muted);
        }

        /* CHAT */
        .chat {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background:
                radial-gradient(circle at top, #f8f9ff, #eef1ff);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .row {
            display: flex
        }

        .row.me {
            justify-content: flex-end
        }

        .bubble {
            max-width: 60%;
            padding: 14px 16px;
            border-radius: 18px;
            font-size: 14px;
            line-height: 1.45;
            position: relative;
        }

        .me .bubble {
            background: linear-gradient(135deg, #5b5cf6, #6d6eff);
            color: #fff;
            border-bottom-right-radius: 6px;
            box-shadow: 0 15px 35px rgba(91, 92, 246, .35);
        }

        .other .bubble {
            background: #fff;
            color: var(--text);
            border: 1px solid var(--border);
            border-bottom-left-radius: 6px;
        }

        /* META */
        .meta {
            font-size: 11px;
            margin-top: 6px;
            opacity: .7;
            display: flex;
            justify-content: flex-end;
            gap: 6px;
        }

        .wa {
            font-weight: 700;
            color: #c7c7c7;
        }

        .wa.read {
            color: #3b82f6
        }

        /* INPUT */
        .composer {
            padding: 18px 20px;
            border-top: 1px solid var(--border);
            background: #fff;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        textarea {
            flex: 1;
            resize: none;
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 14px 20px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            background: #f9fafb;
        }

        textarea:focus {
            background: #fff;
            border-color: var(--primary);
        }

        button {
            background: var(--primary);
            color: #fff;
            border: none;
            height: 46px;
            padding: 0 28px;
            border-radius: 999px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(91, 92, 246, .35);
        }
    </style>
</head>

<body>

    <div class="app">

        <!-- HEADER -->
        <div class="header">
            <a href="{{ route('admin.chat.index') }}" class="back">← Inbox</a>
            <div class="header-info">
                <div class="name">{{ $conversation->user?->name ?? 'User' }}</div>
            </div>
            <div class="header-id">#{{ $conversation->id }}</div>
        </div>

        <!-- CHAT -->
        <div id="chat" class="chat">
            @foreach ($messages as $m)
                @php $cls = $m->sender_role === 'admin' ? 'me' : 'other'; @endphp

                <div class="row {{ $cls }}" data-id="{{ $m->id }}">
                    <div class="bubble">
                        {!! nl2br(e($m->body)) !!}
                        <div class="meta">
                            {{ $m->created_at->format('H:i') }}

                            @if ($m->sender_role === 'user')
                                <span class="wa {{ $m->read_at ? 'read' : '' }}">
                                    {!! $m->read_at ? '✓✓' : '✓' !!}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- INPUT -->
        <div class="composer">
            <textarea id="body" placeholder="Balas user..."></textarea>
            <button id="sendBtn">Kirim</button>
        </div>

    </div>
    <script>
        const chat = document.getElementById('chat');
        const body = document.getElementById('body');
        const btn = document.getElementById('sendBtn');

        chat.scrollTop = chat.scrollHeight;

        function lastMessageId() {
            const rows = chat.querySelectorAll('.row');
            if (!rows.length) return 0;
            return rows[rows.length - 1].dataset.id;
        }

        // ================= AUTO POLLING =================
        async function pollMessages() {
            const lastId = lastMessageId();

            const res = await fetch(
                "{{ route('chat.admin.poll', $conversation->id) }}?last_id=" + lastId
            );

            const messages = await res.json();

            messages.forEach(m => {
                const row = document.createElement('div');
                row.className = 'row ' + (m.sender_role === 'admin' ? 'me' : 'other');
                row.dataset.id = m.id;

                row.innerHTML = `
            <div class="bubble">
                ${m.body.replace(/\n/g, '<br>')}
                <div class="meta">
                    ${new Date(m.created_at).toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    })}
                    ${m.sender_role === 'user'
                        ? `<span class="wa ${m.read_at ? 'read' : ''}">
                                ${m.read_at ? '✓✓' : '✓'}
                              </span>`
                        : ''
                    }
                </div>
            </div>
        `;

                chat.appendChild(row);
                chat.scrollTop = chat.scrollHeight;
            });
        }

        // poll tiap 2 detik (aman)
        setInterval(pollMessages, 2000);

        // ================= SEND =================
        btn.onclick = async () => {
            if (!body.value.trim()) return;

            await fetch("{{ route('chat.admin.send', $conversation->id) }}", {
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
            pollMessages();
        };
    </script>

    {{-- <script>
        const chat = document.getElementById('chat');
        chat.scrollTop = chat.scrollHeight;

        const body = document.getElementById('body');
        const btn = document.getElementById('sendBtn');

        btn.onclick = async () => {
            if (!body.value.trim()) return;
            await fetch("{{ route('chat.admin.send', $conversation->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    body: body.value
                })
            });
            location.reload();
        }
    </script> --}}

</body>

</html>
