<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login / Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #ecf0f3;
            --shadow1: #d1d9e6;
            --shadow2: #ffffff;
            --primary: #4B70E2;
            --text: #181818;
            --gray: #9aa0a6;
            --transition: 1.2s;
        }

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

        /* ================= MAIN BOX ================= */
        .main {
            width: 900px;
            height: 520px;
            background: var(--bg);
            border-radius: 18px;
            box-shadow: 20px 20px 40px var(--shadow1),
                -20px -20px 40px var(--shadow2);
            position: relative;
            overflow: hidden;
        }

        /* ================= FORM AREA ================= */
        .form-container {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            padding: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: var(--transition);
        }

        .sign-in {
            left: 0;
            z-index: 2;
        }

        .sign-up {
            left: 50%;
            opacity: 0;
            z-index: 1;
        }

        .main.active .sign-in {
            opacity: 0;
            z-index: 0;
        }

        .main.active .sign-up {
            opacity: 1;
            z-index: 2;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 32px;
            margin-bottom: 6px;
            color: var(--text);
        }

        span {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 18px;
        }

        /* ================= INPUT ================= */
        input {
            width: 100%;
            height: 44px;
            margin: 8px 0;
            padding: 0 16px;
            border: none;
            border-radius: 12px;
            background: var(--bg);
            box-shadow: inset 4px 4px 8px var(--shadow1),
                inset -4px -4px 8px var(--shadow2);
        }

        input:focus {
            outline: none;
            box-shadow: inset 6px 6px 10px var(--shadow1),
                inset -6px -6px 10px var(--shadow2);
        }

        /* ================= BUTTON ================= */
        button {
            margin-top: 20px;
            width: 190px;
            height: 48px;
            border-radius: 30px;
            border: none;
            background: var(--primary);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 6px 6px 12px var(--shadow1),
                -6px -6px 12px var(--shadow2);
        }

        /* ================= SOCIAL LOGIN ================= */
        .social-login {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin: 10px 0 18px;
        }

        .social-btn {
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            background: var(--bg);
            color: #333;
            box-shadow: 4px 4px 8px var(--shadow1),
                -4px -4px 8px var(--shadow2);
            transition: .3s;
        }

        .social-btn img {
            width: 18px;
        }

        .social-btn:hover {
            transform: translateY(-1px);
        }

        .social-btn.google {
            color: #DB4437;
        }

        .social-btn.github {
            color: #24292e;
        }

        .divider {
            width: 100%;
            text-align: center;
            font-size: 13px;
            color: var(--gray);
            margin-bottom: 6px;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: #d0d0d0;
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        /* ================= SWITCH PANEL ================= */
        .switch {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            background: var(--bg);
            border-radius: 18px;
            box-shadow: 10px 10px 30px var(--shadow1),
                -10px -10px 30px var(--shadow2);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 60px;
            transition: var(--transition);
            z-index: 10;
        }

        .main.active .switch {
            transform: translateX(-100%);
        }

        .switch h2 {
            font-size: 34px;
        }

        .switch p {
            color: var(--gray);
            margin: 16px 0 26px;
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
    </style>
</head>

<body>

    <div class="main" id="main">

        <!-- SIGN IN -->
        <div class="form-container sign-in">
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <h2>Sign In</h2>
                <span>Login dengan akun</span>

                <div class="social-login">
                    <a href="#" class="social-btn google">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg">
                        Login with Google
                    </a>
                    <a href="#" class="social-btn github">
                        <img src="https://www.svgrepo.com/show/512317/github-142.svg">
                        Login with GitHub
                    </a>
                </div>

                <div class="divider">atau</div>

                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">SIGN IN</button>
            </form>
        </div>

        <!-- SIGN UP -->
        <div class="form-container sign-up">
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <h2>Create Account</h2>
                <span>Daftar akun baru</span>

                <input type="text" name="name" placeholder="Nama Lengkap">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirmation" placeholder="Password">
                <button type="submit">SIGN UP</button>
            </form>
        </div>

        <!-- SWITCH -->
        <div class="switch">
            <div>
                <h2 id="switchTitle">Hello Friend!</h2>
                <p id="switchText">Daftar untuk memulai perjalanan</p>
                <button id="switchBtn">SIGN UP</button>
                <div class="links">
                    <div>Kembali Ke Halaman Utama <a href="{{ route('landingpage.home') }}">Halaman Utama</a></div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const main = document.getElementById("main");
        const btn = document.getElementById("switchBtn");
        const title = document.getElementById("switchTitle");
        const text = document.getElementById("switchText");

        let isRegister = false;

        btn.onclick = () => {
            isRegister = !isRegister;
            main.classList.toggle("active");

            if (isRegister) {
                title.innerText = "Welcome Back!";
                text.innerText = "Login dengan akun Anda";
                btn.innerText = "SIGN IN";
            } else {
                title.innerText = "Hello Friend!";
                text.innerText = "Daftar untuk memulai perjalanan";
                btn.innerText = "SIGN UP";
            }
        };
    </script>

</body>

</html>
