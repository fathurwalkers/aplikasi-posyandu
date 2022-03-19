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
        dd($data);
        return view('dashboard.data-anak', [
            'users' => $users,
            'data' => $data,
        ]);
    }
}
