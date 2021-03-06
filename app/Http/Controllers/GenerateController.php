<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Hasilpemeriksaan;
use App\Models\Makanan;
use Carbon\Carbon;

class GenerateController extends Controller
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

    public function generate_data()
    {
        $faker                          = Faker::create('id_ID');
        for ($i=0; $i < 20; $i++) {
            // $ttl = $faker->dateTimeBetween('2017-01-01', '2021-10-25');
            $ttl = $randomDate = Carbon::now()->subDays(rand(0, 3524))->format('Y-m-d H:i:s');
            $arr_jenis_kelamin          = ["L", "P"];
            $arr_number                 = [1, 2];
            $random_number              = Arr::random($arr_number);
            $random_jenis_kelamin       = Arr::random($arr_jenis_kelamin);
            switch ($random_jenis_kelamin) {
                case 'L':
                    $data_foto          = "male.jpg";
                    $nama_depan         = $faker->firstNameMale();
                    $nama_belakang      = $faker->lastNameMale();
                    $nama_lengkap       = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
                case 'P':
                    $data_foto          = "female.jpg";
                    $nama_depan         = $faker->firstNameFemale();
                    $nama_belakang      = $faker->lastNameFemale();
                    $nama_lengkap       = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
            }

            $date1 = strtotime($ttl);
            $date2 = strtotime(now());
            $totalbulan = 0;
            while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2) {
                $totalbulan++;
            }

            if ($totalbulan < 38) {
                $tipe                   = "BALITA";
            } else {
                $tipe                   = "ANAK";
            }

            $data = new Data;
            $save_data = $data->create([
                "data_foto"             => $data_foto,
                "data_nama_lengkap"     => $nama_lengkap,
                "data_nama_orang_tua"   => $faker->name(),
                "data_alamat_lengkap"   => $faker->address(),
                "data_jenis_kelamin"    => $random_jenis_kelamin,
                "data_tipe"             => $tipe,
                "data_tanggal_lahir"    => $ttl,
                "created_at"            => now(),
                "updated_at"            => now()
            ]);
            $save_data->save();

            // LOGIN
            $login_model                = new Login;
            $password                   = '12345';
            $hashPassword               = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw                  = Str::random(16);
            $token                      = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                      = "pengguna";
            $login_status               = "verified";
            $login_data = $login_model->create([
                'login_nama'            => $save_data->data_nama_lengkap,
                'login_username'        => strtolower(Str::random(5)),
                'login_password'        => $hashPassword,
                'login_email'           => $faker->email(),
                'login_telepon'         => $faker->phoneNumber(),
                'login_token'           => $token,
                'login_level'           => $level,
                'login_status'          => $login_status,
                'created_at'            => now(),
                'updated_at'            => now()
            ]);
            $login_data->save();
            $login_data->data()->associate($save_data->id);
            $login_data->save();
        }
    }

    public function generate_makanan()
    {
        $faker                          = Faker::create('id_ID');
        for ($i=0; $i < 15; $i++) {
            $makanan_gambar                 = "default-fruit.png";
            $arr_makanan                    = ['Bakso', 'Sayur', 'Buah Naga', 'Alpukat', 'Apel', 'Tomat', 'Ikan', 'Salmon', 'Jengkol', 'Parende', 'Kangkung Tumis', 'Lalapan', 'Kurma', 'Lopis', 'Ayam', 'Ayam Bakar', 'Ayam Tumis', 'Ayam Geprek', 'Ayam Gulai', 'Sate Kambing', 'Sate Sapi', 'Sate Ayam', 'Sate'];
            $random_nama_makanan            = Arr::random($arr_makanan);
            $random_makanan                 = Arr::random($arr_makanan);
            $random_number_double1          = $faker->numberBetween(65,365);
            $random_number_double2          = $faker->numberBetween(65,365);
            $random_digit                   = $faker->numberBetween(1,2);
            $random_float1                  = $faker->randomFloat($random_digit, 1, 10);
            $random_float2                  = $faker->randomFloat($random_digit, 1, 10);
            $makanan                        = new Makanan;
            $save_makanan = $makanan->create([
                'makanan_gambar'        => $makanan_gambar,
                'makanan_nama'          => $random_nama_makanan,
                'makanan_kalori'        => $random_number_double1,
                'makanan_karbohidrat'   => $random_float1,
                'makanan_lemak'         => $random_float2,
                'makanan_protein'       => $random_number_double2,
                'created_at'            => now(),
                'updated_at'            => now()
            ]);
            $save_makanan->save();
        }
    }

    public function generate_hasil_pemeriksaan()
    {
        $faker                          = Faker::create('id_ID');
        $item                           = Data::all()->toArray();
        foreach ($item as $data) {
            // $data                       = Data::all()->toArray();
            // $umur                       = $faker->numberBetween(3,48);
            $umur                       = $this->hitung_bulan($data["id"]);
            $arr_number                 = [1,2];
            $random_data                = Arr::random($data);
            $random_number              = Arr::random($arr_number);
            $random_digit               = $faker->numberBetween(1,2);
            $random_float_berat         = $faker->randomFloat($random_digit, 1, 10);
            $random_float_tinggi        = $faker->randomFloat($random_digit, 1, 10);
            $random_float_berat_tinggi        = $faker->randomFloat($random_digit, 1, 10);
            $hasil_berat                = $random_float_berat * 2;
            $hasil_tinggi               = $random_float_tinggi * 2;
            $hasil_berat_tinggi               = $random_float_berat_tinggi * 2;
            $hasil_pemeriksaan          = new Hasilpemeriksaan;
            $save_hasil_pemeriksaan     = $hasil_pemeriksaan->create([
                'hasil_umur_ukur'       => $umur, // BULAN
                'hasil_tanggal_lahir'   => $data["data_tanggal_lahir"],
                'hasil_berat'           => $random_float_berat,
                'hasil_tinggi'          => $random_float_tinggi,

                'hasil_zscore_berat'     => NULL,
                'hasil_zscore_tinggi'    => NULL,
                'hasil_zscore_berat_tinggi'    => NULL,

                // 'hasil_zscore_berat'     => $hasil_berat,
                // 'hasil_zscore_tinggi'    => $hasil_tinggi,
                // 'hasil_zscore_berat_tinggi'    => $hasil_berat_tinggi,

                'created_at'            => now(),
                'updated_at'            => now()
            ]);
            $save_hasil_pemeriksaan->save();
            $save_hasil_pemeriksaan->data()->associate($data["id"]);
            $save_hasil_pemeriksaan->save();
        }
        // for ($i=0; $i < 35; $i++) {
        //     $data                       = Data::all()->toArray();
        //     $umur                       = $faker->numberBetween(3,48);
        //     $arr_number                 = [1,2];
        //     $random_data                = Arr::random($data);
        //     $random_number              = Arr::random($arr_number);
        //     $random_digit               = $faker->numberBetween(1,2);
        //     $random_float_berat         = $faker->randomFloat($random_digit, 1, 10);
        //     $random_float_tinggi        = $faker->randomFloat($random_digit, 1, 10);
        //     $hasil_berat                = $random_float_berat * 2;
        //     $hasil_tinggi               = $random_float_tinggi * 2;
        //     $hasil_pemeriksaan          = new Hasilpemeriksaan;
        //     $save_hasil_pemeriksaan     = $hasil_pemeriksaan->create([
        //         'hasil_umur_ukur'       => $umur, // BULAN
        //         'hasil_tanggal_lahir'   => $faker->date(),
        //         'hasil_berat'           => $random_float_berat,
        //         'hasil_tinggi'          => $random_float_tinggi,
        //         'hasil_zscore_berat'     => $hasil_berat,
        //         'hasil_zscore_tinggi'    => $hasil_tinggi,
        //         'created_at'            => now(),
        //         'updated_at'            => now()
        //     ]);
        //     $save_hasil_pemeriksaan->save();
        //     $save_hasil_pemeriksaan->data()->associate($random_data["id"]);
        //     $save_hasil_pemeriksaan->save();
        // }
    }

    public function chained_generate()
    {
        $this->generate_data();
        $this->generate_makanan();
        $this->generate_hasil_pemeriksaan();
        return redirect()->route('admin-home')->with('status', 'Berhasil generate Data!');
    }
}
