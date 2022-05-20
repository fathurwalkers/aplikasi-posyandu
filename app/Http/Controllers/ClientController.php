<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Login;
use App\Models\Data;
use App\Models\Hasilpemeriksaan;
use App\Models\Makanan;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function menu_admin()
    {
        return view('client.menu-admin');
    }

    public function menu_hitung_gizi()
    {
        return view('client.menu-hitung-gizi');
    }

    public function update_data(Request $request, $id)
    {
        $data_id = $id;
        $data = Data::find($data_id);
        if ($data == null) {
            return redirect()->route('data-anak')->with('status', 'Data yang anda ingin ubah tidak dapat ditemukan. ');
        } else {
            $gambar_cek = $request->file('data_foto');
            if (!$gambar_cek) {
                $gambar_ori = $data->data_foto;
                $gambar = $gambar_ori;
            } else {
                $ext = $request->file('data_foto')->getClientOriginalExtension();
                $randomNamaGambar = strtolower(Str::random(10)) . "." .$ext;
                $gambar_ori = $request->file('data_foto')->move(public_path('default-img/foto'), $randomNamaGambar);
                $gambar = $randomNamaGambar;
            }
            $umur = intval($request->data_umur);
            if ($request->data_umur < 38) {
                $tipe                   = "BALITA";
            } else {
                $tipe                   = "ANAK";
            }

            $save_update_data = $data->update([
                "data_foto"             => $gambar,
                "data_nama_lengkap"     => $request->data_nama_lengkap,
                "data_nama_orang_tua"   => $request->data_nama_orang_tua,
                "data_alamat_lengkap"   => $request->data_alamat_lengkap,
                "data_jenis_kelamin"    => $request->data_jenis_kelamin,
                "data_tipe"             => $tipe,
                "data_umur"             => $umur,
                "updated_at"            => now()
            ]);
            return redirect()->route('client-profile')->with('status', 'Data dengan nama "' . $data->data_nama_lengkap . '" Telah berhasil diubah!');
        }
    }

    public function profile()
    {
        $user = session('data_login');
        $users = Login::find($user->id);
        $data = Data::find($users->data_id);
        return view('client.profile', [
            'users' => $users,
            'data' => $data
        ]);
    }

    public function daftar_makanan()
    {
        $makanan = Makanan::all();
        return view('client.daftar-makanan', [
            'makanan' => $makanan
        ]);
    }

    public function info_gizi()
    {
        return view('client.info-gizi');
    }

    public function menu_makanan()
    {
        return view('client.menu-makanan');
    }

    public function daftar_anak()
    {
        $user = session('data_login');
        $users = Login::find($user->id);
        $data = Data::find($users->data_id);
        return view('client.daftar-anak', [
            'data' => $data,
            'users' => $users
        ]);
    }

    public function lihat_data()
    {
        $user = session('data_login');
        $users = Login::find($user->id);
        $data = Data::find($users->data_id);
        return view('client.daftar-anak', [
            'data' => $data,
            'users' => $users
        ]);
    }

    public function daftar_balita()
    {
        return view('client.daftar-balita');
    }
}
