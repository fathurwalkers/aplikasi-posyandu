<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function daftar_makanan()
    {
        return view('dashboard.data-makanan');
    }
}
