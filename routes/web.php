<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenerateController;

Route::get('/', function () {
    return redirect()->route('login-admin');
});

// LOGOUT Route
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

// Client Auth
Route::get('/login', [BackController::class, 'login_client'])->name('login-client');
Route::get('/register', [BackController::class, 'register_client'])->name('register-client');

// Administrator Auth
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');

// Authentication
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');

Route::group(['prefix' => '/client', 'middleware' => 'cekloginclient'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client-home');

    // Makanan Route
    Route::get('/daftar-makanan', [ClientController::class, 'daftar_makanan'])->name('client-daftar-makanan');

    // Anak Route
    Route::get('/daftar-anak', [ClientController::class, 'daftar_anak'])->name('client-daftar-anak');

    // Balita Route
    Route::get('/daftar-balita', [ClientController::class, 'daftar_balita'])->name('client-daftar-balita');
});

Route::group(['prefix' => '/dashboard', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-home');

    // Makanan Route
    Route::get('/daftar-makanan', [MakananController::class, 'daftar_makanan'])->name('admin-daftar-makanan');

    // Anak Route
    Route::get('/daftar-anak', [AnakController::class, 'daftar_anak'])->name('admin-daftar-anak');

    // Balita Route
    Route::get('/daftar-balita', [BalitaController::class, 'daftar_balita'])->name('admin-daftar-balita');
});

Route::group(['prefix' => '/generate'], function () {
    Route::get('/generate-data', [GenerateController::class, 'generate_data'])->name('generate-data');
    Route::get('/generate-makanan', [GenerateController::class, 'generate_makanan'])->name('generate-makanan');
    Route::get('/generate-hasil-pemeriksaan', [GenerateController::class, 'generate_hasil_pemeriksaan'])->name('generate-hasil-pemeriksaan');
    Route::get('/chained-generate', [GenerateController::class, 'chained_generate'])->name('chained-generate');
});
