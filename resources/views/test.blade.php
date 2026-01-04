<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

@include('layout.head')

<body>
    @include('layout.preloader')

    <main>
        <div class="dashboard -is-sidebar-visible js-dashboard">

            {{-- SIDEBAR --}}
            @include('layout.sidebar')

            {{-- CONTENT --}}
            <div class="dashboard__content">

                {{-- HEADER --}}
                @include('layout.header')

                {{-- ================= CONTENT CHAT ================= --}}
                <div class="dashboard__content_content">

                    <h1 class="text-30">Admin Chat</h1>
                    <p class="text-light-1">Inbox percakapan pengguna</p>

                    <div class="mt-40 rounded-12 bg-white shadow-2 overflow-hidden">

                        {{-- CHAT LIST --}}
                        @forelse($conversations as $c)
                            <a href="{{ route('admin.chat.show', $c->id) }}"
                                class="d-flex items-center justify-between px-30 py-20 border-bottom hover:bg-light-1 transition">

                                {{-- LEFT --}}
                                <div class="d-flex items-center gap-15">

                                    {{-- AVATAR --}}
                                    <div class="size-50 rounded-full flex-center text-white fw-700"
                                        style="background:linear-gradient(135deg,#4f46e5,#6366f1)">
                                        {{ strtoupper(substr($c->user?->name ?? 'U', 0, 1)) }}
                                    </div>

                                    {{-- USER --}}
                                    <div>
                                        <div class="fw-600 text-15">
                                            <span
                                                class="circle mr-5 {{ $c->user?->is_online ? 'text-green-2' : 'text-light-1' }}">
                                                ●
                                            </span>
                                            {{ $c->user?->name ?? 'User' }}
                                            <span class="text-13 text-light-1 fw-400">
                                                #{{ $c->id }}
                                            </span>
                                        </div>

                                        <div class="text-13 text-light-1 mt-5">
                                            {{ $c->last_message ?? 'Belum ada pesan' }}
                                        </div>
                                    </div>
                                </div>

                                {{-- RIGHT --}}
                                <div class="text-right text-13 text-light-1">
                                    <div>
                                        {{ optional($c->last_message_at)->format('d M H:i') }}
                                    </div>

                                    @if (($c->unread_count ?? 0) > 0)
                                        <div class="mt-5 px-10 py-3 bg-red-1 text-white rounded-200 d-inline-block">
                                            {{ $c->unread_count }}
                                        </div>
                                    @endif
                                </div>

                            </a>
                        @empty
                            <div class="px-30 py-40 text-center text-light-1">
                                Belum ada percakapan masuk
                            </div>
                        @endforelse

                    </div>

                    <div class="text-center pt-30">
                        © Copyright LERATOUR 2025
                    </div>

                </div>
                {{-- ================= END CONTENT ================= --}}

            </div>
        </div>
    </main>

    {{-- JS --}}
    @include('layout.js')

    {{-- ONLINE / OFFLINE --}}
    <script>
        fetch('/admin/online', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        window.addEventListener('beforeunload', () => {
            navigator.sendBeacon('/admin/offline');
        });
    </script>

</body>

</html>
