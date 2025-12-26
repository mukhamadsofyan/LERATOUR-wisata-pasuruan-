<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    // Halaman Home
    public function index()
    {
        $nama = "UMM";
        return view('home', compact('nama'));
    }

    // Halaman daftar
    public function daftar()
    {
        // $nama = "UMM";
        return view('login.register');
    }

    // Simpan user baru
    public function simpan(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/')->with('pesan', 'Pendaftaran berhasil, silakan login.');
    }

    // Login user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Proses login dengan JWT
        if (! $token = JWTAuth::attempt($credentials)) {
            return redirect('/')->with('pesan', 'Email atau password salah');
        }

        // Simpan JWT ke session
        session(['jwt' => $token]);

        return redirect('/profile')->with('pesan', 'Berhasil login');
    }

    // Logout user
    public function logout()
    {
        // Hapus session token
        session()->forget('jwt');

        // Invalidate token JWT
        try {
            $token = JWTAuth::getToken();
            if ($token) {
                JWTAuth::invalidate($token);
            }
        } catch (\Exception $e) {
            // Token sudah tidak valid atau tidak ada
        }

        return redirect('/')->with('pesan', 'Anda berhasil logout');
    }

    // Halaman profile (hanya contoh)
    public function profile()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            return redirect('/')->with('pesan', 'Silakan login dulu');
        }

        return view('profile', compact('user'));
    }
}
