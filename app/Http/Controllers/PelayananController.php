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

class PelayananController extends Controller
{
    public function hitung_bulan($id)
    {
        $testdata = Data::find($id);
        $date1 = strtotime($testdata->data_tanggal_lahir);
        $date2 = strtotime(now());
        $totalbulan = 0;
        while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2) {
            $totalbulan++;
        }
        return $totalbulan;
    }

    public function hitung_berat_badan()
    {
        $session_user = session('data_login');
        $login = Login::find($session_user->id);
        $data = Data::find($login->data_id);
        if ($login == null) {
            return redirect()->route('client-home')->with('status', 'Maaf, anda tidak meliki ke halaman ini');
        }
        if ($data == null) {
            return redirect()->route('client-home')->with('status', 'Maaf, anda tidak meliki ke halaman ini.');
        } else {
            $bulan = $this->hitung_bulan($data->id);
            return view('client.hitung-berat-badan', [
                'data' => $data,
                'user' => $login,
                'bulan' => $bulan,
            ]);
        }
    }

    public function post_hitung_berat_badan(Request $request)
    {
        $session_user = session('data_login');
        $login = Login::find($session_user->id);
        $data = Data::find($login->data_id);
        if ($login == null) {
            return redirect()->route('client-home')->with('status', 'Maaf, anda tidak meliki ke halaman ini');
        }
        if ($data == null) {
            return redirect()->route('client-home')->with('status', 'Maaf, anda tidak meliki ke halaman ini.');
        } else {
            $bulan = $this->hitung_bulan($data->id);
            $kg = $request->kg;
            if ($bulan <= 11 ) {
                $median = 9.4;
            } elseif ($bulan >= 12 && $bulan <= 26) {

            } else {
                return redirect()->route('client-home')->with('status', 'Maaf, umur peserta ini tidak masuk dalam kategori pelayanan BB/U.');
            }
        }
    }
}
