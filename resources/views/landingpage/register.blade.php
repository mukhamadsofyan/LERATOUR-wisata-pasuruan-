<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:56:13 GMT -->
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
                            <h1 class="text-30">Register</h1>
                            <div class="text-18 fw-500 mt-20 md:mt-15">Let's create your account!</div>
                            <div class="mt-5">
                                Already have an account? <a href="{{ route("login") }}" class="text-accent-1">Log In!</a>
                            </div>
                        </div>

                        <form action="{{ route('register.process') }}" method="POST">
                            @csrf

                            <div class="contactForm border-1 rounded-12 px-60 py-60 md:px-25 md:py-30">

                                {{-- NAME --}}
                                <div class="form-input">
                                    <input type="text" name="name" required placeholder="Full Name"
                                        value="{{ old('name') }}">
                                </div>

                                {{-- EMAIL --}}
                                <div class="form-input mt-30">
                                    <input type="email" name="email" required placeholder="Your Email"
                                        value="{{ old('email') }}">
                                </div>

                                {{-- PASSWORD --}}
                                <div class="form-input mt-30">
                                    <input type="password" name="password" required placeholder="Password">
                                </div>

                                {{-- CONFIRM PASSWORD --}}
                                <div class="form-input mt-30">
                                    <input type="password" name="password_confirmation" required
                                        placeholder="Confirm Password">
                                </div>

                                {{-- BUTTON --}}
                                <button type="submit" class="button -md -dark-1 bg-accent-1 text-white col-12 mt-30">
                                    Register
                                    <i class="icon-arrow-top-right ml-10"></i>
                                </button>

                                {{-- OR --}}
                                <div class="relative line mt-50 mb-30">
                                    <div class="line__word fw-500">OR</div>
                                </div>

                                {{-- SOCIAL --}}
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


<!-- Mirrored from creativelayers.net/themes/viatours-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:56:13 GMT -->

</html>
