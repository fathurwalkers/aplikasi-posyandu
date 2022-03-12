<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
