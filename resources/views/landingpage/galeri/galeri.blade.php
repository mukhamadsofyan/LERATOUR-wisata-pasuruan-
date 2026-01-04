<!DOCTYPE html>
<html lang="id" data-x="html" data-x-toggle="html-overflow-hidden">

@include('layout.head')

<body>

    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon"></div>
        </div>
        <div class="preloader__title">LERATour</div>
    </div>

    <main class="bg-light-1">

        @include('layout.header')

        {{-- ================= HERO SECTION (BIAR AMAN/TIDAK BUG) ================= --}}
        <section class="lt-hero mt-header">
            <div class="lt-hero__bg"
                style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80');">
            </div>
            <div class="lt-hero__overlay"></div>

            <div class="container">
                <div class="lt-hero__content">
                    <div class="text-14 text-white opacity-80">
                        Home <span class="mx-6">/</span> Galeri
                    </div>
                    <h1 class="text-40 md:text-30 fw-800 text-white mt-10">Galeri LERATour</h1>
                    <p class="text-white opacity-80 mt-10">
                        Dokumentasi foto dari Admin & Pengunjung
                    </p>
                </div>
            </div>
        </section>

        {{-- ================= GALERI ================= --}}
        <section class="layout-pt-md layout-pb-lg">
            <div class="container">

                {{-- FILTER --}}
                <div class="filter-wrapper">
                    <div class="filter-box">
                        <button class="filter active" type="button" data-filter="all">Semua</button>
                        <button class="filter" type="button" data-filter="admin">Galeri Admin</button>
                        <button class="filter" type="button" data-filter="user">Galeri Pengunjung</button>
                    </div>
                </div>

                {{-- GRID --}}
                <div class="gallery" id="gallery">

                    {{-- ===== ADMIN ===== --}}
                    @foreach ($galleries as $item)
                        <div class="gallery-card admin">
                            <div class="hover-label">Admin</div>
                            <img src="{{ asset('storage/gallery/' . $item->image) }}" alt="Admin">
                        </div>
                    @endforeach
                    {{-- <div class="gallery-card admin">
                        <div class="hover-label">Admin</div>
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80"
                            alt="Admin">
                    </div> --}}


                    {{-- ===== USER ===== --}}
                    @foreach ($userGalleries as $item)
                        <div class="gallery-card user">
                            <div class="hover-label">Pengunjung</div>
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Pengunjung">
                        </div>
                    @endforeach
                    {{-- <div class="gallery-card user">
                        <div class="hover-label">Pengunjung</div>
                        <img src="https://images.unsplash.com/photo-1520975661595-6453be3f7070?auto=format&fit=crop&w=1200&q=80"
                            alt="Pengunjung">
                    </div> --}}

                </div>
            </div>
        </section>

        @include('layout.footer')

    </main>
    <!-- ================= POPUP VIEWER ================= -->
    <div class="gallery-modal" id="galleryModal">
        <button class="gm-close" id="gmClose">✕</button>

        <div class="gm-tools">
            <button id="zoomIn">＋</button>
            <button id="zoomOut">－</button>
        </div>

        <div class="gm-canvas">
            <img id="gmImage" src="" alt="Preview">
        </div>

        <button class="gm-nav left" id="prevImg">‹</button>
        <button class="gm-nav right" id="nextImg">›</button>
    </div>


    @include('layout.js')
    <style>
        /* ===== MODAL TRANSPARAN ===== */
        .gallery-modal {
            position: fixed;
            inset: 0;
            display: none;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.35);
            /* 🔥 transparan */
            backdrop-filter: blur(14px);
        }

        .gallery-modal.active {
            display: block;
        }

        /* IMAGE AREA */
        .gm-canvas {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .gm-canvas img {
            max-width: 90%;
            max-height: 90%;
            transition: transform .25s ease;
            cursor: grab;
        }

        /* CLOSE */
        .gm-close {
            position: absolute;
            top: 20px;
            right: 24px;
            font-size: 28px;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 10;
        }

        /* ZOOM TOOLS */
        .gm-tools {
            position: absolute;
            top: 20px;
            left: 24px;
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .gm-tools button {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: none;
            font-size: 22px;
            cursor: pointer;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
        }

        /* NAV */
        .gm-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 44px;
            border: none;
            background: none;
            cursor: pointer;
            z-index: 10;
        }

        .gm-nav.left {
            left: 20px;
        }

        .gm-nav.right {
            right: 20px;
        }
    </style>

    <style>
        /* ===== HERO (AMAN DARI BUG HEADER/OVERLAY) ===== */
        .lt-hero {
            position: relative;
            min-height: 280px;
            display: flex;
            align-items: flex-end;
            padding: 60px 0 44px;
            overflow: hidden;
        }

        .lt-hero__bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1.03);
        }

        .lt-hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, .25) 0%, rgba(0, 0, 0, .65) 100%);
        }

        .lt-hero__content {
            position: relative;
            z-index: 2;
            max-width: 760px;
        }

        /* ===== FILTER ===== */
        .filter-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            position: relative;
            z-index: 5;
            /* penting biar bisa diklik */
        }

        .filter-box {
            display: flex;
            gap: 6px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 999px;
            padding: 6px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
        }

        .filter {
            appearance: none;
            border: 0;
            background: transparent;
            padding: 10px 26px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 999px;
            cursor: pointer;
            color: #555;
        }

        .filter.active {
            background: #7CFF4E;
            color: #000;
        }

        /* ===== GRID 3 KOLOM ===== */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 26px;
        }

        /* ===== CARD KHUSUS GALERI ===== */
        .gallery-card {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            aspect-ratio: 4/3;
            cursor: pointer;
            background: #eee;
        }

        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s ease;
            display: block;
        }

        .gallery-card:hover img {
            transform: scale(1.08);
        }

        /* ===== HOVER LABEL (ADMIN/PENGUNJUNG) ===== */
        .hover-label {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            background: rgba(0, 0, 0, .45);
            opacity: 0;
            transition: .25s ease;
            z-index: 2;
            pointer-events: none;
            /* 🔥 INI KUNCINYA */
        }

        .gallery-card:hover .hover-label {
            opacity: 1;
        }

        /* Responsive */
        @media(max-width:992px) {
            .gallery {
                grid-template-columns: repeat(2, 1fr);
            }

            .lt-hero {
                min-height: 240px;
            }
        }

        @media(max-width:576px) {
            .gallery {
                grid-template-columns: 1fr;
            }

            .lt-hero {
                padding: 46px 0 34px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('galleryModal');
            const img = document.getElementById('gmImage');
            const cards = document.querySelectorAll('.gallery-card img');

            let scale = 1;
            let currentIndex = 0;

            if (!cards.length) {
                console.error('Gallery image not found');
                return;
            }

            function openModal(index) {
                currentIndex = index;
                scale = 1;
                img.style.transform = 'scale(1)';
                img.src = cards[index].src;
                modal.classList.add('active');
            }

            cards.forEach((image, i) => {
                image.style.cursor = 'zoom-in';
                image.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal(i);
                });
            });

            document.getElementById('gmClose').addEventListener('click', () => {
                modal.classList.remove('active');
            });

            document.getElementById('zoomIn').addEventListener('click', () => {
                scale += 0.15;
                img.style.transform = `scale(${scale})`;
            });

            document.getElementById('zoomOut').addEventListener('click', () => {
                scale = Math.max(0.5, scale - 0.15);
                img.style.transform = `scale(${scale})`;
            });

            document.getElementById('nextImg').addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % cards.length;
                openModal(currentIndex);
            });

            document.getElementById('prevImg').addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                openModal(currentIndex);
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') modal.classList.remove('active');
            });

        });
    </script>

    <script>
        (function() {
            const buttons = document.querySelectorAll('.filter');
            const items = document.querySelectorAll('.gallery-card');

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    buttons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const filter = btn.dataset.filter;

                    items.forEach(card => {
                        if (filter === 'all') {
                            card.style.display = '';
                        } else {
                            card.style.display = card.classList.contains(filter) ? '' : 'none';
                        }
                    });
                });
            });
        })();
    </script>

</body>

</html>
