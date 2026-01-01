<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Chat – Inbox</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #6366f1;
            --bg: #f5f7fb;
            --card: #ffffff;
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
            background: linear-gradient(135deg, #eef2ff, #f5f7fb);
        }

        .wrap {
            max-width: 980px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .06);
        }

        /* HEADER */
        .head {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .head-title {
            font-size: 18px;
            font-weight: 800;
        }

        .admin-pill {
            font-size: 12px;
            background: #eef2ff;
            color: #3730a3;
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: 600;
        }

        /* LIST */
        .list a {
            display: block;
            padding: 16px 20px;
            border-bottom: 1px solid #f1f1f7;
            color: inherit;
            text-decoration: none;
            transition: .15s;
        }

        .list a:hover {
            background: #fafafa;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
        }

        .left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .user {
            font-weight: 700;
            font-size: 15px;
        }

        .sub {
            font-size: 12px;
            color: var(--muted);
            margin-top: 4px;
        }

        /* STATUS */
        .status {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }

        .status.online {
            background: #22c55e
        }

        .status.offline {
            background: #9ca3af
        }

        /* RIGHT */
        .right {
            text-align: right;
            font-size: 12px;
            color: var(--muted);
        }

        .badge {
            margin-top: 6px;
            display: inline-block;
            min-width: 22px;
            padding: 4px 7px;
            border-radius: 999px;
            background: #ef4444;
            color: #fff;
            font-weight: 700;
            font-size: 11px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="card">

            <!-- HEADER -->
            <div class="head">
                <div class="head-title">Admin Chat Inbox</div>
                <div class="admin-pill">
                    Login: {{ auth()->user()->name }}
                </div>
            </div>

            <!-- LIST -->
            <div class="list">
                @forelse($conversations as $c)
                    <a href="{{ route('admin.chat.show', $c->id) }}">
                        <div class="row">

                            <!-- LEFT -->
                            <div class="left">
                                <div class="avatar">
                                    {{ strtoupper(substr($c->user?->name ?? 'U', 0, 1)) }}
                                </div>

                                <div>
                                    <div class="user">
                                        <span class="status {{ $c->user?->is_online ? 'online' : 'offline' }}"></span>
                                        {{ $c->user?->name ?? 'User' }}
                                        <span style="font-weight:400;color:#6b7280">
                                            #{{ $c->id }}
                                        </span>
                                    </div>

                                    <div class="sub">
                                        {{ $c->last_message ?? 'Belum ada pesan' }}
                                    </div>
                                </div>
                            </div>

                            <!-- RIGHT -->
                            <div class="right">
                                {{ optional($c->last_message_at)->format('d M H:i') }}

                                @if (($c->unread_count ?? 0) > 0)
                                    <div class="badge">
                                        {{ $c->unread_count }}
                                    </div>
                                @endif
                            </div>

                        </div>
                    </a>
                @empty
                    <div style="padding:20px;color:#6b7280">
                        Belum ada conversation.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</body>

</html>
