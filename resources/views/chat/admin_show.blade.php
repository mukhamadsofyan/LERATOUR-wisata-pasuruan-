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
            --primary: #2563eb;
            --bg: #f4f6fb;
            --me: #2563eb;
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
            font-family: 'Inter', system-ui;
            background: var(--bg);
            height: 100vh;
            display: flex;
            justify-content: center;
        }

        /* ===== CONTAINER ===== */
        .app {
            width: 100%;
            max-width: 900px;
            height: 100vh;
            background: #fff;
            display: flex;
            flex-direction: column;
            border-left: 1px solid var(--border);
            border-right: 1px solid var(--border);
        }

        /* ===== HEADER ===== */
        .header {
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border);
            background: #fff;
        }

        .back {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .header-info {
            flex: 1;
        }

        .name {
            font-weight: 700;
        }

        .status {
            font-size: 12px;
            color: var(--muted);
        }

        /* ===== CHAT ===== */
        .chat {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: var(--bg);
        }

        .row {
            display: flex;
        }

        .row.me {
            justify-content: flex-end;
        }

        .bubble {
            max-width: 70%;
            padding: 12px 14px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.4;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
        }

        .me .bubble {
            background: var(--me);
            color: #fff;
            border-bottom-right-radius: 6px;
        }

        .other .bubble {
            background: var(--other);
            color: var(--text);
            border: 1px solid var(--border);
            border-bottom-left-radius: 6px;
        }

        .meta {
            font-size: 11px;
            margin-top: 6px;
            opacity: .75;
            display: flex;
            justify-content: flex-end;
            gap: 6px;
        }

        .wa {
            font-weight: 700;
            color: #c7c7c7;
        }

        .wa.read {
            color: #3b82f6;
        }

        /* ===== INPUT ===== */
        .composer {
            padding: 14px;
            border-top: 1px solid var(--border);
            background: #fff;
            display: flex;
            gap: 10px;
        }

        textarea {
            flex: 1;
            resize: none;
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 12px 16px;
            font-family: inherit;
            outline: none;
        }

        button {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 0 22px;
            border-radius: 999px;
            font-weight: 600;
            cursor: pointer;
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
                <div class="status">
                    {{ $conversation->user?->is_online ? 'Online' : 'Offline' }}
                </div>
            </div>
            <div style="font-size:12px;color:#6b7280">
                #{{ $conversation->id }}
            </div>
        </div>

        <!-- CHAT -->
        <div id="chat" class="chat">
            @foreach ($messages as $m)
                @php
                    $cls = $m->sender_role === 'admin' ? 'me' : 'other';
                @endphp
                <div class="row {{ $cls }}">
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
    </script>

</body>

</html>
