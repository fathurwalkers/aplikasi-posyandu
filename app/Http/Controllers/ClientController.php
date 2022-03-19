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
    public function index()
    {
        return view('client.index');
    }

    public function menu_makanan()
    {
        return view('client.menu-makanan');
    }

    public function daftar_anak()
    {
        return view('client.daftar-anak');
    }

    public function daftar_balita()
    {
        return view('client.daftar-balita');
    }
}
