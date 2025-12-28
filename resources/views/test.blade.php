<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:56:13 GMT -->
@include('layout.head')
<style>
    .verify-card {
        background: #ffffff;
        padding: 48px 40px;
        border-radius: 20px;
        box-shadow: 0 16px 32px rgba(0, 0, 0, .08);
        text-align: center;
    }

    .verify-title {
        font-size: 26px;
        font-weight: 700;
        color: #0f172a;
    }

    .verify-desc {
        font-size: 15px;
        color: #64748b;
        margin: 12px 0 32px;
    }

    .otp-wrapper {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 28px;
    }

    .otp-input {
        width: 48px;
        height: 56px;
        text-align: center;
        font-size: 20px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }

    .otp-input:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, .15);
        outline: none;
    }

    .btn-primary {
        width: 100%;
        height: 52px;
        background: #ff6b35;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        border: none;
    }

    .btn-secondary {
        width: 100%;
        height: 52px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        font-weight: 500;
    }

    .verify-divider {
        margin: 28px 0;
        font-size: 14px;
        color: #94a3b8;
    }

    .verify-back {
        display: block;
        margin-top: 24px;
        font-size: 14px;
        color: #ff6b35;
        font-weight: 500;
    }

    /* wrapper */
    .otp-wrapper {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin: 28px 0 32px;
    }

    /* input dasar */
    .otp-input {
        width: 48px;
        height: 56px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        transition: all .2s ease;
    }

    /* background soft biar kelihatan bisa diisi */
    .otp-soft {
        background: #f8fafc;
        /* abu lembut */
    }

    /* fokus */
    .otp-input:focus {
        background: #fff7ed;
        /* peach lembut */
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, .15);
        outline: none;
    }

    /* hover (desktop) */
    .otp-input:hover {
        border-color: #cbd5e1;
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


        <section class="mt-header layout-pt-lg layout-pb-lg bg-white">
            <div class="container">
                <div class="row justify-center items-center min-vh-100">
                    <div class="col-xl-4 col-lg-5 col-md-7">

                        <div class="verify-card">

                            <h1 class="verify-title">
                                Verifikasi Email
                            </h1>

                            <p class="verify-desc">
                                Masukkan kode OTP yang kami kirim ke email kamu
                            </p>

                            @if ($errors->any())
                                <div class="verify-error">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('verify.process') }}">
                                @csrf

                                <div class="otp-wrapper">
                                    @for ($i = 0; $i < 6; $i++)
                                    <input type="text" maxlength="1" class="otp-input otp-soft otp-digit"
                                    inputmode="numeric" placeholder="*" required>
                                    @endfor
                                    <input type="hidden" name="email" value="{{ session('email') }}">
                                    <input type="hidden" name="code" id="otp_code">
                                </div>

                                <button class="btn-primary">
                                    Verifikasi
                                </button>
                            </form>

                            <div class="verify-divider">atau</div>

                            <form method="POST" action="{{ route('otp.resend') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ session('email') }}">
                                <button class="btn-secondary">
                                    Kirim Ulang Kode
                                </button>
                            </form>

                            <a href="{{ route('login') }}" class="verify-back">
                                ← Kembali ke Login
                            </a>

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
        const inputs = document.querySelectorAll('.otp-digit');
        const hiddenInput = document.getElementById('otp_code');

        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                let otp = '';
                inputs.forEach(i => otp += i.value);
                hiddenInput.value = otp;
            });

            input.addEventListener('keydown', e => {
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>

</body>


<!-- Mirrored from creativelayers.net/themes/viatours-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:56:13 GMT -->

</html>
