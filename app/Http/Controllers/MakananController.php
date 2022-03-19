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

class MakananController extends Controller
{
    public function data_makanan()
    {
        $users = session('data_login');
        $makanan = Makanan::all();
        return view('dashboard.data-makanan', [
            'users' => $users,
            'makanan' => $makanan,
        ]);
    }

    public function hapus_data_makanan(Request $request, $id)
    {
        $makanan_id = $id;
        $findmakanan = Makanan::findOrFail($makanan_id);
        $findmakanan->forceDelete();
        return redirect()->route('admin-data-makanan')->with('status', 'Data Makanan telah dihapus!');
    }

    public function update_data_makanan(Request $request, $id)
    {
        $makanan_id = $id;
        $makanan = Makanan::find($makanan_id);
        if ($makanan == null) {
            return redirect()->route('data-makanan')->with('status', 'Data yang anda ingin ubah tidak dapat ditemukan. ');
        } else {
            $gambar_cek = $request->file('makanan_gambar');
            if (!$gambar_cek) {
                $gambar_ori = $makanan->makanan_gambar;
                $gambar = $gambar_ori;
            } else {
                $ext = $request->file('makanan_gambar')->getClientOriginalExtension();
                $randomNamaGambar = strtolower(Str::random(10)) . "." .$ext;
                $gambar_ori = $request->file('makanan_gambar')->move(public_path('default-img/foto'), $randomNamaGambar);
                $gambar = $randomNamaGambar;
            }

            $save_update_data = $makanan->update([
                'makanan_gambar'            => $gambar,
                'makanan_nama'              => $request->makanan_nama,
                'makanan_kalori'            => intval($request->makanan_nama),
                'makanan_karbohidrat'       => floatval($request->makanan_nama),
                'makanan_lemak'             => floatval($request->makanan_nama),
                'makanan_protein'           => intval($request->makanan_nama),
                'updated_at'                => now()
            ]);
            return redirect()->route('admin-data-makanan')->with('status', 'Data Makanan dengan nama "' . $makanan->makanan_nama . '" Telah berhasil diubah!');
        }
    }
}
