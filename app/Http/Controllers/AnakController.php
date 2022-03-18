<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Login;
use App\Models\Data;

class AnakController extends Controller
{
    public function daftar_anak()
    {
        return view('dashboard.data-anak');
    }
}
