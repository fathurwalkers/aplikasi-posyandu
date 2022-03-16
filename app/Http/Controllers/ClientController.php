<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Login;
use App\Models\Data;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function daftar_makanan()
    {
        return view('client.daftar-makanan');
    }

    public function daftar_anak()
    {
        return view('client.daftar-anak');
    }
}
