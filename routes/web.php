<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Models\Peserta;
use App\Models\Skema;

// Halaman utama diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

// Register akun baru
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// Dashboard dan jumlah data
Route::get('/dashboard', function () {
    $jumlahPeserta = Peserta::count();
    $jumlahSkema = Skema::count();

    return view('dashboard', compact(
        'jumlahPeserta',
        'jumlahSkema'
    ));
})->middleware('auth')->name('dashboard');

// CRUD data skema
Route::resource('skema', SkemaController::class)
    ->middleware('auth');

// CRUD data peserta
Route::resource('peserta', PesertaController::class);