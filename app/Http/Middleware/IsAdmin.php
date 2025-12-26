<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // belum login → ke login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // login tapi BUKAN admin
        if (Auth::user()->role !== 'admin') {
            // bisa redirect ke home / user dashboard
            return redirect()->route('landingpage.home')
                ->with('error', 'Anda tidak memiliki akses ke halaman admin');
        }

        return $next($request);
    }
}
