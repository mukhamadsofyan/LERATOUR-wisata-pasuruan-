<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(Request $request)
    {
        // 👉 USER CANCEL / ERROR DARI GOOGLE
        if (!$request->has('code')) {
            return redirect()
                ->route('login')
                ->with('error', 'Login Google dibatalkan');
        }

        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()
                ->route('login')
                ->with('error', 'Gagal login Google, silakan coba lagi');
        }

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(16)),
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        return redirect()->route('landingpage.home');
    }

    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            ['email' => $githubUser->getEmail()],
            [
                'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                'password' => bcrypt(Str::random(16)),
                'provider' => 'github',
                'provider_id' => $githubUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        return redirect()->route('landingpage.home');
    }
}
