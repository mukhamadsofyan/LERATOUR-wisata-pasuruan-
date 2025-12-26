<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OtpVerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /* ================= LOGIN ================= */
    public function showLogin()
    {
        return view('landingpage.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }

        // CEK EMAIL SUDAH VERIFIKASI ATAU BELUM
        if (!Auth::user()->email_verified_at) {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Email belum diverifikasi. Cek email kamu.',
            ]);
        }

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('landingpage.home');
    }

    /* ================= REGISTER ================= */
    public function showRegister()
    {
        return view('landingpage.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $otp = rand(100000, 999999);

        $user = User::create([
            'name'                    => $request->name,
            'email'                   => $request->email,
            'password'                => bcrypt($request->password),
            'email_verification_code' => $otp,
        ]);

        // KIRIM EMAIL OTP
        Mail::to($user->email)->send(
            new OtpVerificationMail($user->name, $otp)
        );

        // SIMPAN EMAIL KE SESSION (BUKAN FLASH)
        session()->put('email', $user->email);

        return redirect()->route('verify.form');
    }

    /* ================= FORM VERIFIKASI ================= */
    public function form()
    {
        if (!session()->has('email')) {
            return redirect()->route('register')
                ->withErrors([
                    'email' => 'Session verifikasi habis, silakan daftar ulang.',
                ]);
        }

        return view('landingpage.verifikasiemail');
    }

    /* ================= PROSES VERIFIKASI OTP ================= */
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)
            ->where('email_verification_code', $request->code)
            ->first();

        if (!$user) {
            return back()->withErrors([
                'code' => 'Kode OTP salah atau sudah kadaluarsa',
            ]);
        }

        $user->update([
            'email_verified_at'       => now(),
            'email_verification_code' => null,
        ]);

        // HAPUS SESSION EMAIL SETELAH BERHASIL
        session()->forget('email');

        return redirect()->route('login')
            ->with('success', 'Email berhasil diverifikasi. Silakan login.');
    }

    /* ================= RESEND OTP ================= */
    public function resendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->email_verified_at) {
            return redirect()->route('login')
                ->with('success', 'Email sudah diverifikasi. Silakan login.');
        }

        $otp = rand(100000, 999999);

        $user->update([
            'email_verification_code' => $otp,
        ]);

        Mail::to($user->email)->send(
            new OtpVerificationMail($user->name, $otp)
        );

        return back()->with('success', 'Kode OTP baru telah dikirim ke email kamu.');
    }

    /* ================= LOGOUT ================= */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
