<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\PelayananController;

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

Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    // ====================================================================================================
    // CLIENT - USER
    Route::get('/', [ClientController::class, 'index'])->name('client-home');

    Route::get('/pengisian-data', [BackController::class, 'pengisian_data'])->name('pengisian-data');
    Route::post('/post-pengisian-data', [BackController::class, 'post_pengisian_data'])->name('post-pengisian-data');

    Route::get('/hitung-berat-badan', [PelayananController::class, 'hitung_berat_badan'])->name('hitung-berat-badan');
    Route::post('/post-hitung-berat-badan', [PelayananController::class, 'post_hitung_berat_badan'])->name('post-hitung-berat-badan');

    Route::get('/status-gizi', [PelayananController::class, 'status_gizi'])->name('status-gizi');

    Route::get('/menu-grafik', [PelayananController::class, 'menu_grafik'])->name('menu-grafik');
    Route::get('/grafik-berat', [PelayananController::class, 'grafik_berat'])->name('grafik-berat');
    Route::get('/grafik-tinggi', [PelayananController::class, 'grafik_tinggi'])->name('grafik-tinggi');
    Route::get('/grafik-berat-tinggi', [PelayananController::class, 'grafik_berat_tinggi'])->name('grafik-berat-tinggi');

    Route::get('/hitung-tinggi-badan', [PelayananController::class, 'hitung_tinggi_badan'])->name('hitung-tinggi-badan');
    Route::post('/post-hitung-tinggi-badan', [PelayananController::class, 'post_hitung_tinggi_badan'])->name('post-hitung-tinggi-badan');

    Route::get('/hitung-berat-tinggi-badan', [PelayananController::class, 'hitung_berat_tinggi_badan'])->name('hitung-berat-tinggi-badan');
    Route::post('/post-hitung-berat-tinggi-badan', [PelayananController::class, 'post_hitung_berat_tinggi_badan'])->name('post-hitung-berat-tinggi-badan');

    Route::get('/menu-admin', [ClientController::class, 'menu_admin'])->name('menu-admin');
    Route::get('/profile', [ClientController::class, 'profile'])->name('client-profile');

    // Makanan Route
    Route::get('/menu-makanan', [ClientController::class, 'menu_makanan'])->name('client-menu-makanan');
    Route::get('/daftar-makanan', [ClientController::class, 'daftar_makanan'])->name('client-daftar-makanan');
    Route::get('/info-gizi', [ClientController::class, 'info_gizi'])->name('client-info-gizi');
    Route::get('/menu-hitung-gizi', [ClientController::class, 'menu_hitung_gizi'])->name('client-menu-hitung-gizi');

    // Anak Route
    Route::get('/daftar-anak', [ClientController::class, 'daftar_anak'])->name('client-daftar-anak');
    Route::get('/daftar-balita', [ClientController::class, 'daftar_balita'])->name('client-daftar-balita');
    Route::post('/update-data/{id}', [ClientController::class, 'update_data'])->name('client-update-data');
    Route::get('/tambah-data', [ClientController::class, 'tambah_data'])->name('client-tambah-data');
    Route::post('/tambah-data/post', [ClientController::class, 'post_tambah_data'])->name('post-tambah-data');

    // Balita Route
    // ====================================================================================================


    // ====================================================================================================
    // ADMINISTRATOR

    // MANAGE MAKANAN
    Route::post('/tambah-data-makanan', [MakananController::class, 'tambah_data_makanan'])->name('admin-tambah-data-makanan');
    Route::post('/update-data-makanan/{id}', [MakananController::class, 'update_data_makanan'])->name('admin-update-data-makanan');
    Route::post('/hapus-data-makanan/{id}', [MakananController::class, 'hapus_data_makanan'])->name('admin-hapus-data-makanan');

    // MANAGE ANAK
    Route::post('/tambah-data-anak', [AnakController::class, 'tambah_data_anak'])->name('admin-tambah-data-anak');
    Route::post('/update-data-anak/{id}', [AnakController::class, 'update_data_anak'])->name('admin-update-data-anak');
    Route::post('/hapus-data-anak/{id}', [AnakController::class, 'hapus_data_anak'])->name('admin-hapus-data-anak');

    // MANAGE BALITA
    Route::post('/tambah-data-balita', [BalitaController::class, 'tambah_data_balita'])->name('admin-tambah-data-balita');
    Route::post('/update-data-balita/{id}', [BalitaController::class, 'update_data_balita'])->name('admin-update-data-balita');
    Route::post('/hapus-data-balita/{id}', [BalitaController::class, 'hapus_data_balita'])->name('admin-hapus-data-balita');

    Route::get('/lihat-data/{id}', [ClientController::class, 'lihat_profile'])->name('lihat-profile');
    // ====================================================================================================
});

Route::group(['prefix' => '/dashboard', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-home');

    // Makanan Route
    Route::get('/daftar-makanan', [MakananController::class, 'data_makanan'])->name('admin-data-makanan');

    // Anak Route
    Route::get('/data-anak', [AnakController::class, 'data_anak'])->name('admin-data-anak');

    // Balita Route
    Route::get('/data-balita', [BalitaController::class, 'data_balita'])->name('admin-data-balita');
});

Route::group(['prefix' => '/generate'], function () {
    Route::get('/generate-data', [GenerateController::class, 'generate_data'])->name('generate-data');
    Route::get('/generate-makanan', [GenerateController::class, 'generate_makanan'])->name('generate-makanan');
    Route::get('/generate-hasil-pemeriksaan', [GenerateController::class, 'generate_hasil_pemeriksaan'])->name('generate-hasil-pemeriksaan');
    Route::get('/chained-generate', [GenerateController::class, 'chained_generate'])->name('chained-generate');
});
