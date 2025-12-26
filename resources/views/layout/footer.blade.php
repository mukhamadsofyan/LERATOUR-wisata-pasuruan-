<footer class="footer -type-1 -light bg-accent-2">
  <div class="footer__main">
    <div class="container">

      <!-- INFO ATAS -->
      <div class="footer__info">
        <div class="row y-gap-20 justify-between">
          <div class="col-auto">
            <div class="row y-gap-20 items-center">
              <div class="col-auto">
                <i class="icon-headphone text-50 text-white"></i>
              </div>

              <div class="col-auto">
                <div class="text-20 fw-500 text-white">
                  Hubungi kami di
                  <span class="text-white">LERATour Pasuruan</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <div class="footerSocials">
              <div class="footerSocials__title text-white">
                Ikuti Kami
              </div>

              <div class="footerSocials__icons text-white">
                <a href="#" class="icon-facebook"></a>
                <a href="#" class="icon-instagram"></a>
                <a href="#" class="icon-twitter"></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- CONTENT -->
    <div class="border-white-15-top">
      <div class="container">
        <div class="footer__content">
          <div class="row y-gap-40 justify-between">

            <!-- CONTACT -->
            <div class="col-lg-4 col-md-6">
              <h4 class="text-20 fw-500 text-white">Kontak</h4>

              <div class="y-gap-10 mt-20 text-white">
                <span class="d-block">
                  Kabupaten Pasuruan, Jawa Timur
                </span>
                <span class="d-block">
                  info@leratour.id
                </span>
              </div>
            </div>

            <!-- COMPANY -->
            <div class="col-lg-auto col-6">
              <h4 class="text-20 fw-500 text-white">LERATour</h4>

              <div class="y-gap-10 mt-20">
                <a class="d-block fw-500 text-white" href="{{ route('landingpage.about') }}">
                  Tentang Kami
                </a>
                <a class="d-block fw-500 text-white" href="{{ route('landingpage.home') }}">
                  Destinasi Wisata
                </a>
                <a class="d-block fw-500 text-white" href="#">
                  Budaya Lokal
                </a>
                <a class="d-block fw-500 text-white" href="#">
                  Kebijakan Data
                </a>
              </div>
            </div>

            <!-- SUPPORT -->
            <div class="col-lg-auto col-6">
              <h4 class="text-20 fw-500 text-white">Bantuan</h4>

              <div class="y-gap-10 mt-20">
                <a class="d-block fw-500 text-white" href="#">
                  Pusat Bantuan
                </a>
                <a class="d-block fw-500 text-white" href="#">
                  Cara Kerja
                </a>
                <a class="d-block fw-500 text-white" href="#">
                  Hubungi Kami
                </a>
              </div>
            </div>

            <!-- NEWSLETTER -->
            <div class="col-lg-3 col-md-6">
              <h4 class="text-20 fw-500 text-white">Newsletter</h4>
              <p class="text-white mt-20">
                Dapatkan informasi dan rekomendasi wisata terbaru Pasuruan
              </p>

              <div class="footer__newsletter">
                <input type="email" placeholder="Email Anda">
                <button>Daftar</button>
              </div>

              <h4 class="text-20 fw-500 text-white mt-30">Platform</h4>

              <div class="mt-10 text-white">
                Website Resmi LERATour
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- BOTTOM -->
  <div class="border-white-15-top">
    <div class="container">
      <div class="footer__bottom">
        <div class="row y-gap-5 justify-between items-center">
          <div class="col-auto text-white">
            <div>© {{ date('Y') }} LERATour — Wisata Pasuruan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
