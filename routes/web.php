<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, Laravel!';
});

Route::get('/halo/{nama}', function ($nama) {
    return 'Halo, ' . $nama . '!';
});

Route::get('/coba', function () {
    return view('coba');
});

// Hanya untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Hanya untuk yang sudah login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('alat', AlatController::class);

    Route::resource('peminjaman', PeminjamanController::class)
        ->only(['index', 'create', 'store']);
    Route::patch('peminjaman/{peminjaman}/kembali', [PeminjamanController::class, 'kembalikan'])
        ->name('peminjaman.kembali');
    Route::resource('buku', BukuController::class);
});