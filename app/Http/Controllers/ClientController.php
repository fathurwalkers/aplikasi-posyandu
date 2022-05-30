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
    public function hitung_bulan($id)
    {
        $testdata = Data::find($id);
        $date1 = strtotime($testdata->detail_ttl);
        $date2 = strtotime(now());
        $totalbulan = 0;
        while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2) {
            $totalbulan++;
        }
        return $totalbulan;
    }

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
        $data = Data::find($id);
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
            $hitung_umur = $this->hitung_bulan($data->id);
            $umur = intval($hitung_umur);

            if ($umur < 38) {
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
                // "data_umur"             => $umur,
                "updated_at"            => now()
            ]);
            // dd($data);
            return redirect()->route('client-daftar-anak')->with('status', 'Data dengan nama "' . $data->data_nama_lengkap . '" Telah berhasil diubah!');
        }
    }

    public function profile()
    {
        $user = session('data_login');
        $users = Login::find($user->id);
        if ($users->login_level == "admin") {
            return redirect()->route('client-home');
        }
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

    public function lihat_profile($id)
    {
        $data = Data::find($id);
        return view('client.lihat-profile', [
            'data' => $data
        ]);
    }

    public function daftar_anak()
    {
        $user = session('data_login');
        $users = Login::find($user->id);
        $data = Data::find($users->data_id);
        $anak = Data::where('data_tipe', 'ANAK')->get();
        return view('client.daftar-anak', [
            'data' => $data,
            'users' => $users,
            'anak' => $anak,
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
        $user = session('data_login');
        $users = Login::find($user->id);
        $data = Data::find($users->data_id);
        $balita = Data::where('data_tipe', 'BALITA')->get();
        return view('client.daftar-balita', [
            'data' => $data,
            'users' => $users,
            'balita' => $balita,
        ]);
    }
}
