<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Login;
use App\Models\Data;

class BackController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function login_admin()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('admin-home');
        }
        return view('login');
    }

    public function login_client()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('client-home');
        }
        return view('client.login');
    }

    public function register_client()
    {
        return view('client.register');
    }

    public function logout(Request $request)
    {
        $users = session('data_login');
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('status', 'Anda telah logout!');
    }

    public function post_login(Request $request)
    {
        $cek_request = $request->cekrequest;
        $cariUser = Login::where('login_username', $request->login_username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                if ($cek_request == "admin") {
                    $cek_password = Hash::check($request->login_password, $data_login->login_password);
                    if ($data_login) {
                        if ($cek_password) {
                            $users = session(['data_login' => $data_login]);
                            return redirect()->route('admin-home')->with('status', 'Berhasil Login!');
                        }
                    }
                } else {
                    return redirect()->route('login-admin')->with('status', 'Maaf anda tidak dapat memasukkan akun user pada halaman administrator!');
                }
                break;
            case 'pengguna':
                if ($cek_request !== "client") {
                    return redirect()->route('login-client')->with('status', 'Maaf anda tidak dapat memasukkan akun user pada halaman administrator!');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('client-home')->with('status', 'Berhasil Login!');
                    }
                }
                break;
        }
        return back()->with('status', 'Maaf username atau password salah!')->withInput();
    }

    public function post_register(Request $request)
    {
        $validatedLogin                 = $request->validate([
            'login_nama'                => 'required',
            'login_username'            => 'required',
            'login_password'            => 'required',
            'login_email'               => 'required',
            'login_telepon'             => 'required',
            'login_alamat'              => 'required'
        ]);
        if ($validatedLogin["login_password"] !== $request->login_password2) {
            return back()->with('status', 'Password harus sama.')->withInput();
        }
        $hashPassword                   = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token_raw                      = Str::random(16);
        $token                          = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level                          = "user";
        $login_status                   = "verified";
        $login_data                     = new Login;
        $save_login                     = $login_data->create([
            'login_nama'                => $validatedLogin["login_nama"],
            'login_username'            => $validatedLogin["login_username"],
            'login_password'            => $hashPassword,
            'login_email'               => $validatedLogin["login_email"],
            'login_telepon'             => $validatedLogin["login_telepon"],
            'login_alamat'              => $validatedLogin["login_alamat"],
            'login_token'               => $token,
            'login_level'               => $level,
            'login_status'              => $login_status,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        $save_login->save();
        return redirect()->route('login')->with('status', 'Berhasil melakukan registrasi!');
    }
}
