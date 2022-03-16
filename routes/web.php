<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return redirect()->route('login-admin');
});

// Client Auth
Route::get('/login-client', [BackController::class, 'login_client'])->name('login-client');
Route::get('/register-client', [BackController::class, 'register_client'])->name('register-client');

// Administrator Auth
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');
Route::get('/logout', [BackController::class, 'logout'])->name('logout');

// Authentication
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');

Route::group(['prefix' => '/client', 'middleware' => 'cekloginclient'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client-home');
    Route::get('/daftar-makanan', [ClientController::class, 'daftar_makanan'])->name('daftar-makanan');
    Route::get('/daftar-anak', [ClientController::class, 'daftar_anak'])->name('daftar-anak');
});

Route::group(['prefix' => '/dashboard', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-home');
});
