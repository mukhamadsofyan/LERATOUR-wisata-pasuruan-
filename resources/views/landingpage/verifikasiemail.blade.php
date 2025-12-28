<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi Email</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #ecf0f3;
            --shadow1: #d1d9e6;
            --shadow2: #ffffff;
            --primary: #4B70E2;
            --accent: #ff7a3c;
            --text: #181818;
            --gray: #9aa0a6;
        }

        /* ================= RESET ================= */
        * {
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(180deg, #f5f7fa, #ecf0f3);
        }

        /* ================= CARD ================= */
        .verify-box {
            width: 420px;
            padding: 52px 48px;
            border-radius: 22px;
            background: var(--bg);
            box-shadow: 20px 20px 40px var(--shadow1),
                -20px -20px 40px var(--shadow2);
            text-align: center;

            animation: popIn .8s cubic-bezier(.4, 1.6, .6, 1);
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(.9) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* ================= TEXT ================= */
        .verify-box h2 {
            font-size: 26px;
            margin-bottom: 8px;
            color: var(--text);
        }

        .verify-box p {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 32px;
        }

        /* ================= OTP ================= */
        .otp-input {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-bottom: 30px;
        }

        .otp-input input {
            width: 48px;
            height: 56px;
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            border: none;
            border-radius: 14px;
            background: var(--bg);
            color: var(--text);

            box-shadow: inset 4px 4px 8px var(--shadow1),
                inset -4px -4px 8px var(--shadow2);

            transition: .25s ease;
        }

        .otp-input input::placeholder {
            color: #c2c6cc;
            font-weight: 600;
        }

        .otp-input input:focus {
            outline: none;
            transform: translateY(-3px);
            box-shadow:
                inset 6px 6px 10px var(--shadow1),
                inset -6px -6px 10px var(--shadow2),
                0 0 0 3px rgba(255, 122, 60, .25);
        }

        /* ================= BUTTON ================= */
        .btn-primary {
            width: 100%;
            height: 48px;
            border-radius: 30px;
            border: none;
            background: linear-gradient(135deg, #ff7a3c, #ff985f);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 6px 6px 12px var(--shadow1),
                -6px -6px 12px var(--shadow2);
            margin-bottom: 18px;
            transition: .3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(255, 122, 60, .35);
        }

        .btn-outline {
            width: 100%;
            height: 48px;
            border-radius: 30px;
            border: none;
            background: var(--bg);
            color: var(--text);
            font-weight: 700;
            cursor: pointer;
            box-shadow: 6px 6px 12px var(--shadow1),
                -6px -6px 12px var(--shadow2);
            transition: .25s ease;
        }

        .btn-outline:hover {
            transform: translateY(-2px);
        }

        /* ================= EXTRA ================= */
        .or {
            font-size: 13px;
            color: var(--gray);
            margin-bottom: 14px;
        }

        .links {
            margin-top: 22px;
            font-size: 13px;
            line-height: 1.8;
        }

        .links a {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        /* ================= SHAKE ERROR ================= */
        .shake {
            animation: shake .35s;
        }

        @keyframes shake {
            0% {
                transform: translateX(0)
            }

            25% {
                transform: translateX(-6px)
            }

            50% {
                transform: translateX(6px)
            }

            75% {
                transform: translateX(-6px)
            }

            100% {
                transform: translateX(0)
            }
        }
    </style>
</head>

<body>

    <div class="verify-box" id="card">
        <h2>Verifikasi Email</h2>
        <p>Masukkan kode OTP yang kami kirim ke email kamu</p>

        <form id="otpForm" action="{{ route('verify.process') }}" method="POST">
            @csrf

            <div class="otp-input">
                <input type="text" maxlength="1" class="otp" placeholder="*">
                <input type="text" maxlength="1" class="otp" placeholder="*">
                <input type="text" maxlength="1" class="otp" placeholder="*">
                <input type="text" maxlength="1" class="otp" placeholder="*">
                <input type="text" maxlength="1" class="otp" placeholder="*">
                <input type="text" maxlength="1" class="otp" placeholder="*">
                <input type="hidden" name="email" value="{{ session('email') }}">
                <input type="hidden" name="code" id="otp_code">
            </div>

            <input type="hidden" name="otp" id="otpValue">

            <button type="submit" class="btn-primary">Verifikasi</button>
        </form>

        <div class="or">atau</div>

        <form action="{{ route('otp.resend') }}" method="POST">
            @csrf
            <button type="submit" class="btn-outline">Kirim Ulang Kode</button>
        </form>

        <div class="links">
            <div>Email salah? <a href="{{ route('login') }}">Daftar ulang</a></div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp');
        const hidden = document.getElementById('otpValue');
        const form = document.getElementById('otpForm');
        const card = document.getElementById('card');

        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                input.value = input.value.replace(/[^0-9]/g, '');
                if (input.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                updateOtp();
            });

            input.addEventListener('keydown', e => {
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        function updateOtp() {
            const otp = Array.from(inputs).map(i => i.value).join('');
            hidden.value = otp; // punyamu (TETAP)
            document.getElementById('otp_code').value = otp; // ✅ TAMBAHAN
        }


        form.addEventListener('submit', e => {
            if (hidden.value.length < 6) {
                e.preventDefault();
                card.classList.add('shake');
                setTimeout(() => card.classList.remove('shake'), 350);
            }
        });
    </script>

</body>

</html>
