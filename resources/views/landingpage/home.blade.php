<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/home-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:57:18 GMT -->
@include('layout.head')

<style>
    /* Background abu-abu soft */
    .cta-leratour {
        background: #e6e0f2;
        border-radius: 24px;
        margin: 60px 0;
        padding: 50px 0;
    }

    /* Badge PROCESS */
    .badge-process {
        display: inline-block;
        background: #ff7a00;
        color: #fff;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Step Card */
    .process-card {
        background: #fff;
        border-radius: 16px;
        padding: 28px;
        height: 100%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .step-number {
        width: 40px;
        height: 40px;
        background: #ff7a00;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .process-card h4 {
        font-size: 18px;
        font-weight: 500;
    }

    .process-card p {
        margin-top: 8px;
        font-size: 14px;
        color: #666;
    }
</style>

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


        <section data-anim-wrap class="hero -type-8">
            <div data-anim-child="slide-up" class="hero__bg">
                <img src="{{ asset('template/img/hero/8/1.jpg') }}" alt="background">
            </div>

            <div class="container">
                <div data-anim-child="slide-up delay-2" class="row justify-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="hero__content text-center">
                            <div class="hero__filter mb-60 md:mb-0 md:mt-30">
                                <div class="searchForm -type-1 shadow-1 rounded-200">
                                    <div class="searchForm__form">
                                        <div class="searchFormItem js-select-control js-form-dd">
                                            <div class="searchFormItem__button" data-x-click="location">
                                                <div
                                                    class="searchFormItem__icon size-50 rounded-full border-1 flex-center">
                                                    <i class="text-20 icon-pin"></i>
                                                </div>
                                                <div class="searchFormItem__content">
                                                    <h5>Where</h5>
                                                    <div class="js-select-control-chosen">Search destinations</div>
                                                </div>
                                            </div>

                                            <div class="searchFormItemDropdown -location" data-x="location"
                                                data-x-toggle="is-active">
                                                <div class="searchFormItemDropdown__container">
                                                    <div class="searchFormItemDropdown__list sroll-bar-1">

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Europe</span>
                                                                <span>Continent</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">France</span>
                                                                <span>Country</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">London</span>
                                                                <span>Destinations</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Asia</span>
                                                                <span>Continent</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">United
                                                                    States</span>
                                                                <span>Country</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Tokio</span>
                                                                <span>Destinations</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Africa</span>
                                                                <span>Continent</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">New
                                                                    Zealand</span>
                                                                <span>Country</span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="searchFormItem js-select-control js-form-dd js-calendar">
                                            <div class="searchFormItem__button" data-x-click="calendar">
                                                <div
                                                    class="searchFormItem__icon size-50 rounded-full border-1 flex-center">
                                                    <i class="text-20 icon-calendar"></i>
                                                </div>
                                                <div class="searchFormItem__content">
                                                    <h5>When</h5>
                                                    <div>
                                                        <span class="js-first-date">Add dates</span>
                                                        <span class="js-last-date"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="searchFormItemDropdown -calendar" data-x="calendar"
                                                data-x-toggle="is-active">
                                                <div class="searchFormItemDropdown__container">

                                                    <div class="searchMenu-date -searchForm js-form-dd js-calendar-el">
                                                        <div class="searchMenu-date__field shadow-2"
                                                            data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                                                            <div class="bg-white rounded-4">
                                                                <div class="elCalendar js-calendar-el-calendar"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="searchFormItem js-select-control js-form-dd">
                                            <div class="searchFormItem__button" data-x-click="tour-type">
                                                <div
                                                    class="searchFormItem__icon size-50 rounded-full border-1 flex-center">
                                                    <i class="text-20 icon-flag"></i>
                                                </div>
                                                <div class="searchFormItem__content">
                                                    <h5>Tour Type</h5>
                                                    <div class="js-select-control-chosen">All tour</div>
                                                </div>
                                            </div>

                                            <div class="searchFormItemDropdown -tour-type" data-x="tour-type"
                                                data-x-toggle="is-active">
                                                <div class="searchFormItemDropdown__container">
                                                    <div class="searchFormItemDropdown__list sroll-bar-1">

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">City Tour</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Hiking</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Food Tour</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Cultural
                                                                    Tours</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Museums
                                                                    Tours</span>
                                                            </button>
                                                        </div>

                                                        <div class="searchFormItemDropdown__item">
                                                            <button class="js-select-control-button">
                                                                <span class="js-select-control-choice">Beach
                                                                    Tours</span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="searchForm__button">
                                        <button class="button -dark-1 bg-accent-2 size-60 rounded-200 text-white">
                                            <i class="icon-search text-16"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h1 class="hero__title text-white">
                                    Jelajahi Pasuruan Bersama LERA
                                </h1>

                                <div class="hero__text text-white mt-10">
                                    Jelajahi tempat wisata terbaik, pengalaman menarik,
                                    dan perjalanan tak terlupakan untuk liburan yang
                                    lebih mudah dan berkesan bersama LERA.
                                    {{-- <br class="lg:d-none">
                                    interesting places around the world. --}}
                                </div>
                            </div>
                        </div>
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

                <div data-anim-child="slide-up delay-2"
                    class="row md:x-gap-20 pt-40 sm:pt-20 mobile-css-slider -w-280">

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

        <section class="layout-pt-xl layout-pb-xl">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-up" class="row justify-between items-end y-gap-10">
                    <div class="col-auto">
                        <h2 class="text-30 md:text-24">Temukan Tempat Menarik DiPasuruan</h2>
                    </div>

                    <div class="col-auto">

                        <button class="buttonArrow d-flex items-center ">
                            <span>See all</span>
                            <i class="icon-arrow-top-right text-16 ml-10"></i>
                        </button>

                    </div>
                </div>

                <div class="row y-gap-30 justify-between pt-40 sm:pt-20 mobile-css-slider -w-300">
                    @foreach ($wisata as $item)
                        <div data-anim-child="slide-up delay-1" class="col-lg-3 col-md-6">

                            <div class="tourCard -type-1 py-10 px-10 border-1 rounded-12  -hover-shadow">
                                <div class="tourCard__header">
                                    <div class="tourCard__image ratio ratio-28:20">
                                        <img src="{{ asset('storage/wisata/' . $item->foto_wisata) }}"
                                            alt="{{ $item->nama_wisata }}" class="img-ratio rounded-12 object-cover">
                                    </div>

                                    <button class="tourCard__favorite">
                                        <i class="icon-heart"></i>
                                    </button>
                                </div>

                                <div class="tourCard__content px-10 pt-10">
                                    <div class="tourCard__location d-flex items-center text-13 text-light-2">
                                        <i class="icon-pin d-flex text-16 text-light-2 mr-5"></i>
                                        Paris, France
                                    </div>

                                    <h3 class="tourCard__title text-16 fw-500 mt-5">
                                        <span>{{ $item->nama_wisata }}</span>
                                    </h3>
                                    {{-- <p>
                                    {{ $item->deskripsi_wisata }}
                                </p> --}}
                                    <div class="tourCard__rating d-flex items-center text-13 mt-5">
                                        <span class="text-dark-1 ml-10">{{ $item->deskripsi_wisata }}</span>
                                    </div>

                                    <div
                                        class="d-flex justify-between items-center border-1-top text-13 text-dark-1 pt-10 mt-10">
                                        <div class="d-flex items-center">
                                            <i class="icon-clock text-16 mr-5"></i>
                                            {{ $item->jam_buka }} - {{ $item->jam_tutup }}
                                        </div>

                                        <div>Harga Tiket <span class="text-16 fw-500">{{ $item->harga_tiket }}</span>
                                        </div>
                                    </div>

                                </div>
                                <button class="button -sm -accent-1 bg-dark-1 text-white w-100 mt-10"
                                    onclick="handleBeliTiket(
        '{{ $item->nama_wisata }}',
        '{{ $item->harga_tiket }}'
    )">
                                    🎟️ Beli Tiket Sekarang
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <!-- ================= MODAL BELI TIKET ================= -->
                    <!-- OVERLAY MODAL -->
                    <div id="ticketModal" class="ticket-modal">
                        <!-- BOX MODAL -->
                        <div class="ticket-modal__content">

                            <!-- TOMBOL CLOSE -->
                            <span class="ticket-modal__close" onclick="closeTicketModal()">&times;</span>

                            <h3 class="text-20 fw-600 mb-10">🎟️ Pembelian Tiket</h3>

                            <!-- FORM (PUNYA KAMU, TIDAK DIUBAH) -->
                            <form id="formTiket">
                                @csrf

                                <input type="hidden" name="nama_wisata" id="modalNamaWisataHidden">
                                <input type="hidden" name="harga_tiket" id="modalHargaHidden">
                                <input type="hidden" name="total_bayar" id="modalTotalHidden">

                                <div class="form-input mb-10">
                                    <label>Nama Wisata</label>
                                    <input type="text" id="modalNamaWisata" readonly>
                                </div>

                                <div class="form-input mb-10">
                                    <label>Harga Tiket</label>
                                    <input type="text" id="modalHargaTiket" readonly>
                                </div>

                                <div class="form-input mb-10">
                                    <label>Nama Pemesan</label>
                                    <input type="text" name="nama_pemesan" required>
                                </div>

                                <div class="form-input mb-10">
                                    <label>Email</label>
                                    <input type="email" name="email" required>
                                </div>

                                <div class="form-input mb-10">
                                    <label>Jumlah Tiket</label>
                                    <input type="number" id="modalJumlahTiket" name="jumlah_tiket" min="1"
                                        value="1" oninput="hitungTotal()" required>
                                </div>

                                <div class="form-input mb-10">
                                    <label>Total Pembayaran</label>
                                    <input type="text" id="modalTotalBayar" readonly>
                                </div>

                                <button type="button" class="button -md -accent-1 bg-dark-1 text-white w-100 mt-10"
                                    onclick="bayarSekarang()">
                                    💳 Lanjut ke Pembayaran
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="layout-pt-xl layout-pb-xl">
            <div data-anim-wrap class="container">

                <!-- HEADER -->
                <div data-anim-child="slide-up" class="row y-gap-10 justify-between items-end">
                    <div class="col-auto">
                        <h2 class="text-30">🔥 Trending Wisata</h2>
                        <p class="text-14 text-light-2">
                            Wisata paling banyak dipesan di Pasuruan
                        </p>
                    </div>

                    {{-- <div class="col-auto">
                        <a href="javascript:void(0)" class="featureCard -type-7 -hover-image-scale"
                            onclick="openWisataModal(
        '{{ $item->nama_wisata }}',
        '{{ asset('storage/wisata/' . $item->foto_wisata) }}',
        '{{ $item->harga_tiket }}',
        '{{ $item->total_tiket }}',
        `{{ $item->deskripsi_wisata ?? 'Belum ada deskripsi wisata.' }}`
   )">

                            <span>See all</span>
                            <i class="icon-arrow-top-right text-16 ml-10"></i>
                        </a>
                    </div> --}}
                </div>

                <!-- LIST TRENDING -->
                <div data-anim-child="slide-up delay-2" class="row y-gap-30 md:y-gap-20 pt-40 sm:pt-20">

                    @forelse ($trendingWisata as $item)
                        <div class="w-1/5 lg:w-1/4 md:w-1/2">

                            <a href="javascript:void(0)" class="featureCard -type-7 -hover-image-scale"
                                onclick="openWisataModal(
        '{{ $item->nama_wisata }}',
        '{{ asset('storage/wisata/' . $item->foto_wisata) }}',
        '{{ $item->harga_tiket }}',
        '{{ $item->total_tiket }}',
        `{{ $item->deskripsi_wisata ?? 'Belum ada deskripsi wisata.' }}`
   )">



                                <!-- IMAGE -->
                                <div class="featureCard__image ratio ratio-23:30 -hover-image-scale__image rounded-12">
                                    <img src="{{ asset('storage/wisata/' . $item->foto_wisata) }}"
                                        alt="{{ $item->nama_wisata }}" class="img-ratio rounded-12 object-cover">
                                </div>

                                <!-- CONTENT -->
                                <div class="mt-20">
                                    <h4 class="text-18 fw-500">
                                        {{ $item->nama_wisata }}
                                    </h4>

                                    <div class="text-14 lh-13 mt-5 text-light-2">
                                        🎟️ {{ number_format($item->total_tiket) }} tiket terjual
                                    </div>

                                    <div class="text-15 fw-500 mt-5 text-dark-1">
                                        Rp {{ number_format($item->harga_tiket) }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-16 text-light-2">
                                Belum ada data trending wisata
                            </p>
                        </div>
                    @endforelse
                    </a>

                </div>
            </div>
            <!-- ================= MODAL DETAIL WISATA ================= -->
            <div id="wisataModal" class="wisata-modal">

                <div class="wisata-modal__content">

                    <!-- CLOSE -->
                    <span class="wisata-modal__close" onclick="closeWisataModal()">&times;</span>

                    <!-- IMAGE -->
                    <div class="wisata-modal__image">
                        <img id="modalWisataImage" src="" alt="Wisata">
                    </div>

                    <!-- CONTENT -->
                    <div class="wisata-modal__body">
                        <h3 id="modalWisataNama" class="text-22 fw-600 mb-5"></h3>

                        <p class="text-14 text-light-2 mb-10">
                            🎟️ <span id="modalWisataTiket"></span> tiket terjual
                        </p>

                        <p class="text-16 fw-500 mb-10">
                            Harga Tiket: Rp <span id="modalWisataHarga"></span>
                        </p>

                        <p id="modalWisataDeskripsi" class="text-14 lh-16 text-dark-1"></p>

                        <button class="button -md -accent-1 bg-dark-1 text-white w-100 mt-20"
                            onclick="closeWisataModal()">
                            Tutup
                        </button>
                    </div>

                </div>
            </div>

        </section>


        <section data-anim="slide-up" class="cta -type-4">
            <div class="container">
                <div class="cta__content">

                    <!-- HEADER -->
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <span class="badge-process">PROCESS</span>

                            <h2 class="text-24 lh-13 mt-10">
                                Alur Pembelian Tiket Wisata di LERATour
                            </h2>

                            <p class="mt-10">
                                Pesan tiket wisata favoritmu dengan mudah, cepat, dan aman melalui LERATour.
                            </p>
                        </div>
                    </div>

                    <!-- STEPS -->
                    <div class="row x-gap-20 y-gap-20 mt-30">

                        <!-- STEP 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="process-card">
                                <div class="step-number">01</div>
                                <h4>Pilih Wisata</h4>
                                <p>
                                    Jelajahi berbagai destinasi wisata terbaik dan pilih sesuai kebutuhanmu.
                                </p>
                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="process-card">
                                <div class="step-number">02</div>
                                <h4>Pesan & Bayar</h4>
                                <p>
                                    Tentukan tanggal dan jumlah tiket, lalu lakukan pembayaran dengan aman.
                                </p>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="process-card">
                                <div class="step-number">03</div>
                                <h4>E-Ticket & Berangkat</h4>
                                <p>
                                    E-ticket dikirim otomatis dan siap digunakan saat hari keberangkatan.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- CTA BUTTON -->
                    <div class="mt-30">
                        <a href="#" class="button -md -accent-1 bg-dark-1 text-white">
                            Jelajahi Wisata
                            <i class="icon-arrow-top-right ml-10"></i>
                        </a>
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
        <br> <br>
        <section class="faq-section">
            <div class="container">
                <div class="faq-header">
                    <span class="faq-badge">FAQ</span>
                    <h2>Frequently Asked Questions</h2>
                    <p>Pertanyaan yang paling sering diajukan seputar layanan LERATour</p>
                </div>

                <div class="faq-wrapper js-accordion">

                    <!-- FAQ ITEM -->
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah pemesanan wisata di LERATour bisa dibatalkan?</span>
                            <i class="icon-plus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>
                                Ya, pemesanan wisata di LERATour dapat dibatalkan sesuai kebijakan masing-masing paket.
                                Umumnya pembatalan maksimal H-1 untuk mendapatkan pengembalian dana sebagian atau penuh.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah saya bisa mengubah tanggal perjalanan?</span>
                            <i class="icon-plus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>
                                Perubahan tanggal perjalanan dapat dilakukan selama kuota masih tersedia.
                                Silakan hubungi admin LERATour melalui kontak resmi.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Di mana titik kumpul dan kapan perjalanan berakhir?</span>
                            <i class="icon-plus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>
                                Informasi titik kumpul dan estimasi perjalanan akan diberikan setelah pemesanan
                                dikonfirmasi
                                dan dapat dilihat di detail paket wisata.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah LERATour menyediakan transportasi?</span>
                            <i class="icon-plus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>
                                Ya, sebagian besar paket wisata sudah termasuk transportasi sesuai deskripsi paket.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        @include('layout.footer')


    </main>

    <!-- JavaScript -->
    @include('layout.js')
    <script>
        function openWisataModal(nama, image, harga, tiket, deskripsi) {
            document.getElementById('modalWisataNama').innerText = nama;
            document.getElementById('modalWisataImage').src = image;
            document.getElementById('modalWisataHarga').innerText =
                new Intl.NumberFormat('id-ID').format(harga);
            document.getElementById('modalWisataTiket').innerText = tiket;
            document.getElementById('modalWisataDeskripsi').innerText = deskripsi;

            document.getElementById('wisataModal').classList.add('show');
        }

        function closeWisataModal() {
            document.getElementById('wisataModal').classList.remove('show');
        }
    </script>

    <script>
        let hargaTiketGlobal = 0;

        function openTicketModal(nama, harga) {
            hargaTiketGlobal = Number(harga) || 0;

            // Visible input
            document.getElementById('modalNamaWisata').value = nama;
            document.getElementById('modalHargaTiket').value = formatRupiah(hargaTiketGlobal);
            document.getElementById('modalJumlahTiket').value = 1;

            // Hidden input (untuk backend / Midtrans)
            document.getElementById('modalNamaWisataHidden').value = nama;
            document.getElementById('modalHargaHidden').value = hargaTiketGlobal;

            hitungTotal();

            document.getElementById('ticketModal').style.display = 'flex';
        }

        function closeTicketModal() {
            document.getElementById('ticketModal').style.display = 'none';
        }

        function hitungTotal() {
            const jumlahInput = document.getElementById('modalJumlahTiket');
            const jumlah = Math.max(1, parseInt(jumlahInput.value) || 1);
            jumlahInput.value = jumlah;

            const total = hargaTiketGlobal * jumlah;

            document.getElementById('modalTotalBayar').value = formatRupiah(total);

            // Hidden total untuk backend
            document.getElementById('modalTotalHidden').value = total;
        }

        function formatRupiah(angka) {
            return 'Rp ' + Number(angka).toLocaleString('id-ID');
        }

        // Tutup modal hanya jika klik overlay (AMAN)
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('ticketModal');
            if (event.target === modal) {
                closeTicketModal();
            }
        });
    </script>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        let scrollPos = 0;

        function bayarSekarang() {

            const form = document.getElementById('formTiket');
            if (!form) {
                alert('Form tidak ditemukan');
                return;
            }

            // =============================
            // 🔒 LOCK SCROLL POSISI
            // =============================
            scrollPos = window.pageYOffset || document.documentElement.scrollTop;

            document.body.style.position = 'fixed';
            document.body.style.top = `-${scrollPos}px`;
            document.body.style.left = '0';
            document.body.style.right = '0';
            document.body.style.width = '100%';

            // sembunyikan form
            form.style.display = 'none';

            const formData = new FormData(form);

            fetch("{{ route('tiket.bayar') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {

                    if (!data.snap_token || !data.order_id) {
                        resetScroll(form);
                        alert("Snap token tidak valid");
                        return;
                    }

                    snap.pay(data.snap_token, {

                        onSuccess: function() {
                            window.location.href =
                                "/payment/finish?order_id=" + data.order_id;
                        },

                        onPending: function() {
                            window.location.href =
                                "/payment/pending?order_id=" + data.order_id;
                        },

                        onError: function() {
                            alert("Pembayaran gagal");
                            resetScroll(form);
                        },

                        onClose: function() {
                            // user nutup popup midtrans
                            resetScroll(form);
                        }
                    });
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal koneksi server");
                    resetScroll(form);
                });
        }

        // =============================
        // 🔄 RESTORE SCROLL
        // =============================
        function resetScroll(form) {
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.left = '';
            document.body.style.right = '';
            document.body.style.width = '';

            window.scrollTo(0, scrollPos);

            if (form) {
                form.style.display = 'block';
            }
        }
    </script>

    <script>
        const isLoggedIn = @json(auth()->check());
        const role = @json(auth()->check() ? auth()->user()->role : null);

        function handleBeliTiket(nama, harga) {
            if (!isLoggedIn) {
                alert('Silakan login terlebih dahulu untuk membeli tiket.');
                window.location.href = "{{ route('login') }}";
                return;
            }

            if (role !== 'user') {
                alert('Hanya akun user yang dapat membeli tiket.');
                return;
            }

            openTicketModal(nama, harga);
        }
    </script>

    <script>
        document.querySelectorAll(".faq-question").forEach(btn => {
            btn.addEventListener("click", () => {
                const item = btn.parentElement;
                const answer = item.querySelector(".faq-answer");

                item.classList.toggle("active");

                if (item.classList.contains("active")) {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                } else {
                    answer.style.maxHeight = null;
                }
            });
        });
    </script>

</body>


<!-- Mirrored from creativelayers.net/themes/viatours-html/home-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:57:33 GMT -->

</html>
