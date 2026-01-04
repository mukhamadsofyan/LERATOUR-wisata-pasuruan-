<style>
    /* ===== PAGES NAV ===== */
    .nav-pages {
        position: relative;
    }

    .nav-pages__trigger {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .nav-pages__icon {
        font-size: 12px;
        transition: transform .25s ease;
    }

    /* rotate icon */
    .nav-pages:hover .nav-pages__icon {
        transform: rotate(180deg);
    }

    /* dropdown */
    .nav-pages__dropdown {
        position: absolute;
        top: 110%;
        left: 0;
        min-width: 190px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
        padding: 10px 0;

        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: .25s ease;
        z-index: 99;
    }

    /* show */
    .nav-pages:hover .nav-pages__dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* item */
    .nav-pages__dropdown a {
        display: block;
        padding: 10px 18px;
        font-size: 15px;
        color: #05073C;
        transition: background .2s ease;
    }

    .nav-pages__dropdown a:hover {
        background: #f5f7fa;
    }
</style>
<header class="header -type-8 js-header">
    <div data-anim="fade delay-3" class="header__container container">
        <div class="headerMobile__left">
            <button class="header__menuBtn js-menu-button">
                <i class="icon-main-menu text-white"></i>
            </button>
        </div>

        <div class="header__left">
            <div class="header__logo">
                <a href="#" class="header__logo">
                    <img src="{{ asset('template/img/general/logo.png') }}" alt="logo icon">
                </a>

                <div class="xl:d-none ml-30">
                    <div class="desktopNav -light">

                        <div class="desktopNav__item">
                            <a href="{{ route('landingpage.home') }}">Home</a>
                        </div>

                        <div class="desktopNav__item">
                            <a href="{{ route('landingpage.about') }}">About</a>
                        </div>

                        <div class="desktopNav__item">
                            <a href="{{ route('user.testimonial.form') }}">Testimoni</a>
                        </div>

                        {{-- PAGES --}}
                        <div class="desktopNav__item nav-pages">
                            <a href="javascript:void(0)" class="nav-pages__trigger">
                                Pages
                                <i class="icon-chevron-down nav-pages__icon"></i>
                            </a>

                            <div class="nav-pages__dropdown">
                                <a href="{{ route('gallery.all') }}">Galeri Wisata</a>
                                <a href="{{ route('gallery.index') }}">Kirim Galeri</a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


        <div class="headerMobile__right">
            <button class="d-flex">
                <i class="icon-search text-18 text-white"></i>
            </button>

            <button class="d-flex ml-20">
                <i class="icon-person text-18 text-white"></i>
            </button>
        </div>

        <div class="header__right">


            {{-- <a href="register.html" class="text-white ml-10">
            Sign up
          </a> --}}

            @guest
                {{-- <a href="{{ route('register') }}" class="button -sm -outline-white text-white rounded-200 ml-30">
                    Sign up
                </a> --}}
                <a href="{{ route('login') }}" class="button -sm -outline-white text-white rounded-200 ml-30">
                    Log in
                </a>
            @endguest

            @auth
                @if (Auth::user()->role === 'user')
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="button -sm -outline-white text-white rounded-200 ml-30">
                            Logout
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</header>
