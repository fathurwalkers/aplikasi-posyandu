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

class GenerateController extends Controller
{
    public function generate_data()
    {
        $faker                  = Faker::create('id_ID');
        for ($i=0; $i < 5; $i++) {
            $arr_jenis_kelamin  = ["L", "P"];
            $arr_number  = [1, 2];
            $random_number = Arr::random($arr_number);
            $random_jenis_kelamin = Arr::random($arr_jenis_kelamin);
            switch ($random_jenis_kelamin) {
                case 'L':
                    $data_foto = "male.jpg";
                    $nama_depan = $faker->firstNameMale();
                    $nama_belakang = $faker->lastNameMale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
                case 'P':
                    $data_foto = "female.jpg";
                    $nama_depan = $faker->firstNameFemale();
                    $nama_belakang = $faker->lastNameFemale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
            }
            $data = new Data;
            $save_data = $data->create([
                "data_foto" => $data_foto,
                "data_nama_lengkap" => $nama_lengkap,
                "data_alamat_lengkap" => $faker->address(),
                "data_jenis_kelamin" => $random_jenis_kelamin,
                "data_umur" => $faker->numberBetween(6,48),
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_data->save();

            // LOGIN
            $login_model            = new Login;
            $password               = '12345';
            $hashPassword           = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw              = Str::random(16);
            $token                  = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                  = "customer";
            $login_status           = "verified";
            $login_data = $login_model->create([
                'login_nama'        => $save_data->data_nama_lengkap,
                'login_username'    => 'customer' . $i . strtoupper(Str::random(5)),
                'login_password'    => $hashPassword,
                'login_email'       => $faker->email(),
                'login_telepon'     => $faker->phoneNumber(),
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();
            $login_data->data()->associate($save_data->id);
            $login_data->save();
        }
    }
}
