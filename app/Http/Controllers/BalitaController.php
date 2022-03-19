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
        dd($data);
        return view('dashboard.data-balita', [
            'users' => $users,
            'data' => $data,
        ]);
    }
}
