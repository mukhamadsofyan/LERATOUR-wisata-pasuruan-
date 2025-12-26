<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:56:13 GMT -->
@include('layout.head')

<body>
    @include('layout.preloader')

    <div class="tourPagesSidebar" data-x="tourPagesSidebar" data-x-toggle="-is-active">
        <div class="tourPagesSidebar__overlay"></div>
        <div class="tourPagesSidebar__content">
            <div class="tourPagesSidebar__header d-flex items-center justify-between">
                <div class="text-20 fw-500">All filters</div>

                <button class="button -dark-1 size-40 rounded-full bg-light-1" data-x-click="tourPagesSidebar">
                    <i class="icon-cross text-10"></i>
                </button>
            </div>


        </div>
    </div>

    <button class="toTopButton js-top-button">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_83_4004)">
                <path
                    d="M17.8783 0H4.12177C3.59388 0 3.16602 0.42786 3.16602 0.955755C3.16602 1.48365 3.59388 1.91151 4.12177 1.91151H17.8783C18.4062 1.91151 18.834 1.48365 18.834 0.955755C18.834 0.42786 18.4062 0 17.8783 0Z" />
                <path
                    d="M11.6759 4.67546C11.3026 4.30219 10.6975 4.30219 10.3242 4.67546L6.04107 8.95863C5.66779 9.3319 5.66779 9.937 6.04107 10.3103C6.41434 10.6837 7.01955 10.6836 7.39272 10.3103L10.0444 7.6587V21.0443C10.0444 21.5722 10.4723 22 11.0002 22C11.5281 22 11.9559 21.5722 11.9559 21.0443V7.65859L14.6076 10.3102C14.7942 10.4969 15.0389 10.5901 15.2834 10.5901C15.528 10.5901 15.7726 10.4968 15.9593 10.3102C16.3325 9.9369 16.3325 9.3318 15.9593 8.95852L11.6759 4.67546Z" />
            </g>
            <defs>
                <clipPath id="clip0_83_4004">
                    <rect width="22" height="22" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </button>

    <main>


        @include('layout.header')

        @include('layout.menu')


        <section class="mt-header layout-pt-lg layout-pb-lg">
            <div class="container">
                <div data-anim="slide-up" class="row justify-center">
                    <div class="col-xl-6 col-lg-7 col-md-9">
                        <div class="text-center mb-60 md:mb-30">
                            <h1 class="text-30">Log In</h1>
                            <div class="text-18 fw-500 mt-20 md:mt-15">We're glad to see you again!</div>
                            <div class="mt-5">
                                Don't have an account? <a href="{{ route('register') }}" class="text-accent-1">Sign
                                    Up!</a>
                            </div>
                        </div>

                        <form action="{{ route('login.process') }}" method="POST">
                            @csrf

                            <div class="contactForm border-1 rounded-12 px-60 py-60 md:px-25 md:py-30">

                                {{-- EMAIL --}}
                                <div class="form-input">
                                    <input type="email" name="email" required placeholder="Email Address"
                                        value="{{ old('email') }}">
                                </div>

                                {{-- PASSWORD --}}
                                <div class="form-input mt-30">
                                    <input type="password" name="password" required placeholder="Password">
                                </div>

                                {{-- REMEMBER ME --}}
                                <div class="row y-ga-10 justify-between items-center pt-30">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox" name="remember" id="remember">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon">
                                                        <svg width="10" height="8" viewBox="0 0 10 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.29082 0.971021C9.01235 0.692189 8.56018 0.692365 8.28134 0.971021L3.73802 5.51452L1.71871 3.49523C1.43988 3.21639 0.987896 3.21639 0.709063 3.49523C0.430231 3.77406 0.430231 4.22604 0.709063 4.50487L3.23309 7.0289C3.37242 7.16823 3.55512 7.23807 3.73783 7.23807C3.92054 7.23807 4.10341 7.16841 4.24274 7.0289L9.29082 1.98065C9.56965 1.70201 9.56965 1.24984 9.29082 0.971021Z"
                                                                fill="white" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lh-11 ml-10">Remember me</div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <a href="#">Lost your password?</a>
                                    </div>
                                </div>

                                {{-- BUTTON --}}
                                <button type="submit" class="button -md -dark-1 bg-accent-1 text-white col-12 mt-30">
                                    Log In
                                    <i class="icon-arrow-top-right ml-10"></i>
                                </button>

                                {{-- OR --}}
                                <div class="relative line mt-50 mb-30">
                                    <div class="line__word fw-500">OR</div>
                                </div>

                                {{-- SOCIAL (OPSIONAL / UI SAJA) --}}
                                <div class="row y-gap-15">
                                    <div class="col">
                                        <button type="button" class="button -md -outline-blue-1 text-blue-1 col-12">
                                            <i class="icon-facebook mr-10"></i>
                                            Continue Facebook
                                        </button>
                                    </div>

                                    <div class="col">
                                        <button type="button" class="button -md -outline-red-1 text-red-1 col-12">
                                            <i class="icon-google mr-10"></i>
                                            Continue Google
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        @include('layout.footer')


    </main>

    <!-- JavaScript -->
    @include('layout.js')
</body>


<!-- Mirrored from creativelayers.net/themes/viatours-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:56:13 GMT -->

</html>
