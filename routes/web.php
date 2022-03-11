<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', [BackController::class, 'login_admin'])->name('login-admin');
Route::get('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/client'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client-home');
    Route::get('/login', [BackController::class, 'login_client'])->name('login-client');
    Route::get('/register', [BackController::class, 'register_client'])->name('register-client');
});

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-home');
});
