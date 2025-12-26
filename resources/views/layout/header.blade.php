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
                            <a href="{{ route('landingpage.home') }}">
                                Home
                            </a>
                        </div>

                        <div class="desktopNav__item">
                            <a href="{{ route('landingpage.about') }}">
                                About
                            </a>
                        </div>
                        {{-- <div class="desktopNav__item">
                            <a href="{{ route('landingpage.WisataList') }}">
                                Semua Wisata
                            </a>
                        </div> --}}


                        <div class="desktopNav__item">
                            <a href="{{ route('user.testimonial.form') }}">
                                Testimoni
                            </a>
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
                <a href="{{ route('register') }}" class="button -sm -outline-white text-white rounded-200 ml-30">
                    Sign up
                </a>
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
