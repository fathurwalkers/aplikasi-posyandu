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

class AnakController extends Controller
{
    public function data_anak()
    {
        $users = session('data_login');
        $data = Data::where('data_tipe', 'ANAK')->get();
        return view('dashboard.data-anak', [
            'users' => $users,
            'data' => $data,
        ]);
    }

    public function hapus_data_anak(Request $request, $id)
    {
        $data_id = $id;
        $finddata = Data::findOrFail($data_id);
        $finddata->forceDelete();
        return redirect()->route('admin-data-anak')->with('status', 'Data telah dihapus!');
    }

    public function update_data_anak(Request $request, $id)
    {
        $data_id = $id;
        $data = Data::find($data_id);
        if ($data == null) {
            return redirect()->route('data-anak')->with('status', 'Data yang anda ingin ubah tidak dapat ditemukan. ');
        } else {
            $save_update_data = $data->update([
                "data_foto"             => $request->data_foto,
                "data_nama_lengkap"     => $request->data_nama_lengkap,
                "data_nama_orang_tua"   => $request->data_nama_orang_tua,
                "data_alamat_lengkap"   => $request->data_alamat_lengkap,
                "data_jenis_kelamin"    => $request->data_jenis_kelamin,
                "data_tipe"             => $request->data_tipe,
                "data_umur"             => intval($request->data_umur),
                "updated_at"            => now()
            ]);
            return redirect()->route('admin-data-anak')->with('status', 'Data dengan nama "' . $data->data_nama_lengkap . '" Telah berhasil diubah!');
        }
    }
}
