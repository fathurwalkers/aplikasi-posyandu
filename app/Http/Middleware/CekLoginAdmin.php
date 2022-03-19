<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CekLoginAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $cek_users = session('data_login');
        if ($cek_users == null) {
            return redirect()->route('login-admin')->with('status_fail', 'Silahkan login terlebih dahulu!');
        }
        if ($cek_users->login_level == "pengguna") {
            return redirect()->route('client-home')->with('status_fail', 'Tidak bisa melakukan login sebagai pengguna. ');
        } elseif ($cek_users->login_level == "admin") {
            View::share('users', $cek_users);
            return $next($request);
        } else {
            return redirect()->route('login-admin')->with('status_fail', 'Silahkan login terlebih dahulu!');
        }
    }
}
