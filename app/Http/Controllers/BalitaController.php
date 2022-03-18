<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function daftar_balita()
    {
        return view('dashboard.data-balita');
    }
}
