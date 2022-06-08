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

    public function hitung_berat_tinggi_badan()
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
            $hasil = Hasilpemeriksaan::where('data_id', $data->id)->first();
            return view('client.hitung-berat-tinggi-badan', [
                'data' => $data,
                'user' => $login,
                'bulan' => $bulan,
                'hasil' => $hasil,
            ]);
        }
    }

    public function post_hitung_berat_tinggi_badan(Request $request)
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
            $cm = $request->cm;
            $kg = $request->kg;
        }
    }

    public function hitung_tinggi_badan()
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
            $hasil = Hasilpemeriksaan::where('data_id', $data->id)->first();
            return view('client.hitung-tinggi-badan', [
                'data' => $data,
                'user' => $login,
                'bulan' => $bulan,
                'hasil' => $hasil,
            ]);
        }
    }

    public function post_hitung_tinggi_badan(Request $request)
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
            $cm = $request->cm;
            if ($bulan <= 11 ) {
                $median = 74.5;
                $hitungan_awal = $cm - $median;
                $hasil = $hitungan_awal;
                switch ($hasil) {
                    case $hasil <= 67.6:
                        $keterangan = "HASIL -3 SD";
                        $hitungan = $median - 67.6;
                        $zscore_berat = $hitungan;
                        break;
                    case $hasil >= 67.6 && $hasil <= 69.9:
                        $keterangan = "HASIL -2 SD";
                        $hitungan = $median - 69.9;
                        $zscore_berat = $hitungan;
                        break;
                    case $hasil >= 69.9 && $hasil <= 72.2:
                        $keterangan = "HASIL -1 SD";
                        $hitungan = $median - 72.2;
                        $zscore_berat = $hitungan;
                        break;
                    case $hasil >= 72.2 && $hasil <= 74.5:
                        $keterangan = "HASIL 1 SD";
                        $hitungan = $median - 74.5;
                        $zscore_berat = $hitungan;
                        break;
                    case $hasil >= 74.5 && $hasil <= 76.9:
                        $keterangan = "HASIL 1+ SD";
                        $hitungan = $median - 76.9;
                        $zscore_berat = $hitungan;
                        break;
                    case $hasil >= 76.9 && $hasil <= 79.2:
                        $keterangan = "HASIL 2+ SD";
                        $hitungan = $median - 79.2;
                        $zscore_berat = $hitungan;
                        break;
                    case $hasil >= 79.2:
                        $keterangan = "HASIL 3+ SD";
                        $hitungan = $median - 79.2;
                        $zscore_berat = $hitungan;
                        break;
                }
                // dd($hasil);
                $hasil_pemeriksaan = Hasilpemeriksaan::where('data_id', $data->id)->first();
                $update_hasil = $hasil_pemeriksaan->update([
                    'hasil_tinggi'           => $cm,
                    'hasil_zscore_tinggi'     => $hasil,
                    'updated_at'            => now()
                ]);
                return redirect()->route('hitung-tinggi-badan')->with('status', 'Perhitungan TB/U Telah berhasil.');
            } elseif ($bulan >= 12 && $bulan <= 60) {
                $median = 88.8;
                $hitungan = $cm - $median;
                $hasil = intval($hitungan);
            } else {
                return redirect()->route('client-home')->with('status', 'Maaf, umur peserta ini tidak masuk dalam kategori pelayanan BB/U.');
            }
        }
    }


    // =========================================================

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
            $hasil = Hasilpemeriksaan::where('data_id', $data->id)->first();
            return view('client.hitung-berat-badan', [
                'data' => $data,
                'user' => $login,
                'bulan' => $bulan,
                'hasil' => $hasil,
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
                $hitungan = $kg - $median;
                $hasil = intval($hitungan);
            } elseif ($bulan >= 12 && $bulan <= 60) {
                $median = 12.5;
                $hitungan = $kg - $median;
                $hasil = intval($hitungan);
            } else {
                return redirect()->route('client-home')->with('status', 'Maaf, umur peserta ini tidak masuk dalam kategori pelayanan BB/U.');
            }
            switch ($hasil) {
                case $hasil <= -3.0:
                    $keterangan = "HASIL -3 SD";
                    $zscore_berat = $hitungan;
                    break;
                case $hasil >= -3.0 && $hasil <= -2.0:
                    $keterangan = "HASIL -2 SD";
                    $zscore_berat = $hitungan;
                    break;
                case $hasil >= -2.0 && $hasil <= -1.0:
                    $keterangan = "HASIL -1 SD";
                    $zscore_berat = $hitungan;
                    break;
                case $hasil >= -1.0 && $hasil <= 1.0:
                    $keterangan = "HASIL 1 SD";
                    $zscore_berat = $hitungan;
                    break;
                case $hasil >= 1.0 && $hasil <= 2.0:
                    $keterangan = "HASIL 1+ SD";
                    $zscore_berat = $hitungan;
                    break;
                case $hasil >= 2.0 && $hasil <= 3.0:
                    $keterangan = "HASIL 2+ SD";
                    $zscore_berat = $hitungan;
                    break;
                case $hasil >= 3.0:
                    $keterangan = "HASIL 3+ SD";
                    $zscore_berat = $hitungan;
                    break;
            }
            $hasil_pemeriksaan = Hasilpemeriksaan::where('data_id', $data->id)->first();
            $update_hasil = $hasil_pemeriksaan->update([
                'hasil_berat'           => $kg,
                'hasil_zscore_berat'     => $hitungan,
                'updated_at'            => now()
            ]);
            return redirect()->route('hitung-berat-badan')->with('status', 'Perhitungan BB/U Telah berhasil.');
        }
    }
}
