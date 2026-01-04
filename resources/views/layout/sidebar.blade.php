<style>
    .dashboard__sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh !important;
        width: 280px;
        display: flex;
        flex-direction: column;
        overflow: hidden !important;
    }

    .sidebar-menu {
        flex: 1;
        overflow-y: auto !important;
        overscroll-behavior: contain;
    }

    html,
    body {
        height: 100%;
        overflow: auto !important;
    }

    .dashboard,
    .dashboard__main,
    .dashboard__content {
        overflow: visible !important;
    }

    /* HILANGKAN SCROLLBAR (TAPI TETAP BISA SCROLL) */
    .sidebar-menu {
        -ms-overflow-style: none;
        /* IE & Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .sidebar-menu::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari */
    }
    
</style>
<div class="dashboard__sidebar js-dashboard-sidebar">

    <!-- HEADER / LOGO -->
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
            <img src="{{ asset('template/img/general/logo.png') }}" alt="LERA TOUR">
        </a>
    </div>

    <!-- MENU -->
    <div class="sidebar-menu">

        <div class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </div>

        {{-- <div class="sidebar-item {{ request()->routeIs('admin.slider*') ? 'active' : '' }}">
                <a href="{{ route('admin.slider') }}">
                    <i class="fa-regular fa-calendar"></i>
                    <span>Slider</span>
                </a>
            </div> --}}

        <div class="sidebar-item {{ request()->routeIs('admin.kategori*') ? 'active' : '' }}">
            <a href="{{ route('admin.kategori') }}">
                <i class="fa-solid fa-list"></i>
                <span>Data Kategori</span>
            </a>
        </div>

        <div class="sidebar-item {{ request()->routeIs('admin.wisata*') ? 'active' : '' }}">
            <a href="{{ route('admin.wisata') }}">
                <i class="fa-solid fa-location-dot"></i>
                <span>Data Wisata</span>
            </a>
        </div>

        <div class="sidebar-item {{ request()->routeIs('admin.keunggulan*') ? 'active' : '' }}">
            <a href="{{ route('admin.keunggulan') }}">
                <i class="fa-solid fa-bars-staggered"></i>
                <span>Kenapa Harus LERA</span>
            </a>
        </div>

        <div class="sidebar-item {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
            <a href="{{ route('admin.gallery.index') }}">
                <i class="fa-regular fa-file-image"></i>
                <span>Galeri</span>
            </a>
        </div>
        <div class="sidebar-item {{ request()->routeIs('admin.testimonial*') ? 'active' : '' }}">
            <a href="{{ route('admin.testimonial.index') }}">
                <i class="fa-regular fa-comment-dots"></i>
                <span>Testimonial</span>
            </a>
        </div>

        <div class="sidebar-item {{ request()->routeIs('admin.invoice*') ? 'active' : '' }}">
            <a href="{{ route('admin.invoice') }}">
                <i class="fa-regular fa-file-lines"></i>
                <span>Invoice</span>
            </a>
        </div>
        <div class="sidebar-item {{ request()->routeIs('admin.chat.index*') ? 'active' : '' }}">
            <a href="{{ route('admin.chat.index') }}">
                <i class="fa-regular fa-message"></i>
                <span>Message</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </div>
</div>
