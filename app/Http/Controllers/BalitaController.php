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

class BalitaController extends Controller
{
    public function data_balita()
    {
        $users = session('data_login');
        $data = Data::where('data_tipe', 'BALITA')->get();
        return view('dashboard.data-balita', [
            'users' => $users,
            'data' => $data,
        ]);
    }

    public function hapus_data_balita(Request $request, $id)
    {
        $data_id = $id;
        $finddata = Data::findOrFail($data_id);
        $finddata->forceDelete();
        return redirect()->route('admin-data-balita')->with('status', 'Data telah dihapus!');
    }

    public function update_data_balita(Request $request, $id)
    {
        $data_id = $id;
        $data = Data::find($data_id);
        if ($data == null) {
            return redirect()->route('data-balita')->with('status', 'Data yang anda ingin ubah tidak dapat ditemukan. ');
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
            return redirect()->route('admin-data-balita')->with('status', 'Data dengan nama "' . $data->data_nama_lengkap . '" Telah berhasil diubah!');
        }
    }
}
