<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:59:25 GMT -->

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


        <section data-anim="fade" class="pageHeader -type-1">
            <div class="pageHeader__bg">
                <img src="{{ asset('template/img/pageHeader/1.jpg') }}" alt="image">
                <img src="{{ asset('template/img/hero/1/shape.svg') }}" alt="image">
            </div>

            <div class="container">
                <div class="row justify-center">
                    <div class="col-12">
                        <div class="pageHeader__content">
                            <h1 class="pageHeader__title">
                                Tentang LERATour
                            </h1>

                            <p class="pageHeader__text">
                                LERATour adalah platform informasi wisata yang menghadirkan
                                destinasi unggulan, budaya lokal, dan potensi pariwisata Pasuruan
                                dalam satu sistem digital yang mudah diakses, informatif, dan terpercaya.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="layout-pt-lg">
            <div data-anim-wrap class="container">
                <div class="row y-gap-20 justify-between">
                    <div data-anim-child="slide-up" class="col-lg-6">
                        <h2 class="text-30 fw-700">
                            Halo. LERATour hadir sebagai jembatan eksplorasi wisata lokal Pasuruan.
                            Kami menghubungkan destinasi, budaya, dan pengalaman terbaik untuk semua.
                        </h2>
                    </div>

                    <div data-anim-child="slide-up delay-2" class="col-lg-5">
                        <p>
                            LERATour merupakan platform wisata digital yang dirancang untuk
                            memperkenalkan potensi alam, budaya, dan destinasi unggulan Pasuruan
                            secara modern dan mudah diakses.
                            <br><br>
                            Melalui sistem informasi terintegrasi, kami membantu wisatawan menemukan
                            tempat terbaik, merencanakan perjalanan, hingga menikmati pengalaman wisata
                            yang aman, informatif, dan berkesan.
                        </p>

                        <a href="{{ route('landingpage.about') }}"
                            class="button -md -dark-1 bg-accent-1 text-white mt-30">
                            Tentang LERATour
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <section data-anim="slide-up" class=" layout-pt-xl">
            <div class="video relative container">
                <div class="video__bg">
                    <img src="{{ asset('template/img/misc/1.png') }}" alt="image" class="rounded-12">
                </div>

                <div class="row justify-center pb-50 md:pb-0">
                    <div class="col-auto">
                        <a href="https://youtu.be/jzClv7kkvHo?si=7fOTcXLWBXd0t-Al" class="d-block js-gallery"
                            data-gallery="gallery1">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="30" cy="30" r="29" stroke="white" stroke-width="2" />
                                <g clip-path="url(#clip0_79_4379)">
                                    <path
                                        d="M39.339 27.6922L27.5265 20.4107C26.6718 19.8846 25.6386 19.8627 24.7625 20.3522C23.8863 20.8416 23.3633 21.7331 23.3633 22.7366V37.2332C23.3633 38.7506 24.5859 39.9918 26.0887 40C26.0928 40 26.0969 40 26.1009 40C26.5705 40 27.0599 39.8528 27.517 39.5739C27.8847 39.3495 28.0009 38.8696 27.7765 38.502C27.5522 38.1342 27.0722 38.0181 26.7046 38.2424C26.4908 38.3728 26.282 38.4402 26.0971 38.4402C25.5301 38.4371 24.923 37.9514 24.923 37.2332V22.7367C24.923 22.3061 25.1474 21.9238 25.5232 21.7139C25.899 21.5039 26.3422 21.5133 26.7083 21.7387L38.5208 29.0202C38.8759 29.2388 39.0791 29.6033 39.0782 30.0202C39.0773 30.4371 38.8727 30.8008 38.5157 31.0187L29.9752 36.2479C29.6078 36.4728 29.4924 36.9529 29.7173 37.3202C29.9422 37.6876 30.4223 37.8031 30.7896 37.5781L39.3291 32.3495C40.1468 31.8507 40.636 30.9812 40.638 30.0234C40.64 29.0656 40.1542 28.1941 39.339 27.6922Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_79_4379">
                                        <rect width="20" height="20" fill="white"
                                            transform="translate(22 20)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="layout-pt-xl">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-up" class="row">
                    <div class="col-auto">
                        <h2 class="text-30 md:text-24">Kenapa Harus LERATour?</h2>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-2" class="row md:x-gap-20 pt-40 sm:pt-20 mobile-css-slider -w-280">

                    <div class="col-lg-3 col-sm-6">
                        <div class="featureIcon -type-1 pr-40 md:pr-0">
                            <div class="featureIcon__icon">
                                <img src="{{ asset('template/img/icons/1/ticket.svg') }}" alt="icon">
                            </div>

                            <h3 class="featureIcon__title text-18 fw-500 mt-30">{{ $k1->title_keunggulan }}</h3>
                            <p class="featureIcon__text mt-10">{{ $k1->deskripsi_keunggulan }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="featureIcon -type-1 pr-40 md:pr-0">
                            <div class="featureIcon__icon">
                                <img src="{{ asset('template/img/icons/1/hot-air-balloon.svg') }}" alt="icon">
                            </div>

                            <h3 class="featureIcon__title text-18 fw-500 mt-30">{{ $k2->title_keunggulan }}</h3>
                            <p class="featureIcon__text mt-10">{{ $k2->deskripsi_keunggulan }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="featureIcon -type-1 pr-40 md:pr-0">
                            <div class="featureIcon__icon">
                                <img src="{{ asset('template/img/icons/1/diamond.svg') }}" alt="icon">
                            </div>

                            <h3 class="featureIcon__title text-18 fw-500 mt-30">{{ $k3->title_keunggulan }}</h3>
                            <p class="featureIcon__text mt-10">{{ $k3->deskripsi_keunggulan }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="featureIcon -type-1 pr-40 md:pr-0">
                            <div class="featureIcon__icon">
                                <img src="{{ asset('template/img/icons/1/medal.svg') }}" alt="icon">
                            </div>

                            <h3 class="featureIcon__title text-18 fw-500 mt-30">{{ $k4->title_keunggulan }}</h3>
                            <p class="featureIcon__text mt-10">{{ $k4->deskripsi_keunggulan }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section data-anim="fade" class="layout-pt-xl relative">
            <div class="relative xl:unset container">
                <div class="layout-pt-xl layout-pb-xl rounded-12">
                    <div class="sectionBg">
                        <img src="{{ asset('template/img/about/1/1.png') }}" alt="image"
                            class="img-ratio rounded-12 md:rounded-0">
                    </div>

                    <div class="row y-gap-30 justify-center items-center">
                        <div class="col-lg-4 col-md-6">
                            <h2 class="text-40 lh-13">
                                LERATour<br class="md:d-none">
                                Jelajahi Pasuruan Lebih Mudah
                            </h2>

                            <p class="mt-10">
                                LERATour mempermudah wisatawan dalam menemukan destinasi unggulan,
                                budaya lokal, dan pengalaman wisata terbaik di Pasuruan
                                secara cepat, informatif, dan terpercaya.
                            </p>

                            <a href="{{ route('landingpage.home') }}"
                                class="button -md -dark-1 bg-accent-1 text-white mt-60 md:mt-30">
                                Jelajahi Wisata
                            </a>
                        </div>

                        <div class="col-md-6">
                            <div class="featuresGrid">

                                <div class="featuresGrid__item px-40 py-40 text-center bg-white rounded-12">
                                    <img src="{{ asset('template/img/icons/2/1.svg') }}" alt="icon">
                                    <div class="text-40 fw-700 text-accent-1 mt-20 lh-14">
                                        {{ $totalWisata ?? '50+' }}
                                    </div>
                                    <div>Destinasi Wisata</div>
                                </div>

                                <div class="featuresGrid__item px-40 py-40 text-center bg-white rounded-12">
                                    <img src="{{ asset('template/img/icons/2/2.svg') }}" alt="icon">
                                    <div class="text-40 fw-700 text-accent-1 mt-20 lh-14">
                                        {{ $totalKategori ?? '10+' }}
                                    </div>
                                    <div>Kategori Wisata</div>
                                </div>

                                <div class="featuresGrid__item px-40 py-40 text-center bg-white rounded-12">
                                    <img src="{{ asset('template/img/icons/2/3.svg') }}" alt="icon">
                                    <div class="text-40 fw-700 text-accent-1 mt-20 lh-14">
                                        {{ $totalPengunjung ?? '1.000+' }}
                                    </div>
                                    <div>Wisatawan Terlayani</div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section data-anim-wrap class="relative layout-pt-xl layout-pb-xl">
            <div data-anim-child="slide-up delay-1" class="sectionBg md:d-none">
                <img src="{{ asset('template/img/testimonials/1/1.png') }}" alt="image">
            </div>

            <div data-anim-child="slide-up delay-3" class="container">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <h2 class="text-30 md:text-24">Apa Kata Mereka Tentang LERATour</h2>
                    </div>
                </div>

                <div class="row justify-center pt-60 md:pt-20">
                    <div class="col-xl-6 col-md-8 col-sm-10">
                        <div class="overflow-hidden js-section-slider" data-slider-cols="xl-1 lg-1 md-1 sm-1 base-1"
                            data-pagination="js-testimonials-pagination">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $item)
                                    <div class="swiper-slide">
                                        <div class="testimonials -type-1 pt-10 text-center">
                                            <div class="testimonials__image size-100 rounded-full">
                                                @if ($item->foto_testimoni)
                                                    <img src="{{ asset('storage/testimoni/' . $item->foto_testimoni) }}"
                                                        alt="Foto Testimoni" class="rounded-full object-cover"
                                                        style="width:80px;height:80px;">
                                                @else
                                                    <img src="{{ asset('template/img/testimonials/1/2.png') }}"
                                                        alt="Default Avatar" class="rounded-full object-cover"
                                                        style="width:80px;height:80px;">
                                                @endif
                                                <div class="testimonials__icon">
                                                    <svg width="16" height="13" viewBox="0 0 16 13"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.3165 0.838867C12.1013 1.81846 10.9367 3.43478 9.77215 5.63887C8.65823 7.84295 8 10.2429 7.8481 12.8389H12.4557C12.4051 8.87152 13.6203 5.24703 16 1.91642L13.3165 0.838867ZM5.51899 0.838867C4.25316 1.81846 3.08861 3.43478 1.92405 5.63887C0.810126 7.84295 0.151899 10.2429 0 12.8389H4.60759C4.55696 8.87152 5.77215 5.19805 8.20253 1.91642L5.51899 0.838867Z"
                                                            fill="white" />
                                                    </svg>
                                                </div>
                                            </div>

                                            <div class="text-18 fw-500 text-accent-1 mt-60 md:mt-40">Great quality!
                                            </div>

                                            <div class="text-20 fw-500 mt-20">{{ $item->deskripsi_testimoni }}</div>

                                            <div class="mt-20 md:mt-40">
                                                <div class="lh-16 text-16 fw-500">{{ $item->nama }}</div>
                                                <div class="lh-16">{{ $item->keterangan }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="pagination -type-1 justify-center pt-60 md:pt-40 js-testimonials-pagination">
                                <div class="pagination__button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section data-anim="slide-up" class="cta -type-1">
            <div class="cta__bg">
                <img src="{{ asset('template/img/cta/1/bg.png') }}" alt="image">
            </div>

            <div class="container">
                <div class="row justify-between">
                    <div class="col-xl-5 col-lg-6">
                        <div class="cta__content">
                            <h2 class="text-40 md:text-24 lh-13 text-white">
                                Jelajahi Wisata Pasuruan<br class="lg:d-none">
                                Lebih Mudah Bersama LERATour
                            </h2>

                            <p class="mt-10 text-white">
                                Temukan destinasi unggulan, budaya lokal, dan pengalaman wisata
                                terbaik Pasuruan dalam satu platform digital yang informatif
                                dan terpercaya.
                            </p>

                            <div class="text-18 text-white mt-40 md:mt-20">
                                Dapatkan update wisata & rekomendasi terbaru
                            </div>

                            <div class="mt-10">
                                <div class="singleInput -type-2 row x-gap-10 y-gap-10">
                                    <div class="col-md-auto col-12">
                                        <input type="email" placeholder="Masukkan Email" class="">
                                    </div>
                                    <div class="col-md-auto col-12">
                                        <button class="button -md -accent-1 bg-white col-12 text-accent-2">
                                            Berlangganan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="cta__image">
                            <img src="{{ asset('template/img/cta/1/1.png') }}" alt="LERATour CTA">
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="layout-pt-xl">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-up" class="row">
                    <div class="col-auto">
                        <h2 class="text-30">Meet The Team</h2>
                    </div>
                </div>

                <div class="row y-gap-30 pt-40 sm:pt-20 justify-content-center">

                    <!-- TEAM 1 -->
                    <div data-anim-child="slide-up delay-1" class="col-lg-3 col-md-4 col-sm-6">
                        <div class="ratio ratio-1:1">
                            <img src="{{ asset('template/img/team/1/2.jpg') }}" alt="image"
                                class="img-ratio bg-light-1 rounded-12">
                        </div>

                        <h3 class="text-16 fw-500 mt-15">Mukhamad Sofyan</h3>
                        <p class="text-14 lh-16">Informatika</p>
                    </div>

                    <!-- TEAM 2 -->
                    <div data-anim-child="slide-up delay-2" class="col-lg-3 col-md-4 col-sm-6">
                        <div class="ratio ratio-1:1">
                            <img src="{{ asset('template/img/team/1/2.jpg') }}" alt="image"
                                class="img-ratio bg-light-1 rounded-12">
                        </div>

                        <h3 class="text-16 fw-500 mt-15">Alfito</h3>
                        <p class="text-14 lh-16">Informatika</p>
                    </div>

                </div>
            </div>
        </section>


        <section class="layout-pt-xl layout-pb-xl">
            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <h2 class="text-30">Trusted by all thelargest travel brands</h2>
                    </div>
                </div>

                <div class="row y-gap-30 justify-between pt-40 sm:pt-20">

                    <div class="col-md-auto col-6">
                        <img src="{{ asset('template/img/clients/1/1.svg') }}" alt="image">
                    </div>

                    <div class="col-md-auto col-6">
                        <img src="{{ asset('template/img/clients/1/2.svg') }}" alt="image">
                    </div>

                    <div class="col-md-auto col-6">
                        <img src="{{ asset('template/img/clients/1/3.svg') }}" alt="image">
                    </div>

                    <div class="col-md-auto col-6">
                        <img src="{{ asset('template/img/clients/1/4.svg') }}" alt="image">
                    </div>

                    <div class="col-md-auto col-6">
                        <img src="{{ asset('template/img/clients/1/5.svg') }}" alt="image">
                    </div>

                    <div class="col-md-auto col-6">
                        <img src="{{ asset('template/img/clients/1/6.svg') }}" alt="image">
                    </div>

                </div>
            </div>
        </section>



        @include('layout.footer')
    </main>
    @include('layout.js')
    <!-- JavaScript -->
</body>


<!-- Mirrored from creativelayers.net/themes/viatours-html/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:59:41 GMT -->

</html>
