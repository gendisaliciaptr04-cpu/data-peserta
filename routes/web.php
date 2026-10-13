<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserPesertaController;
use App\Models\Peserta;
use App\Models\Skema;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard Admin
Route::get('/dashboard', function () {
    $jumlahPeserta = Peserta::count();
    $jumlahSkema = Skema::count();

    return view('dashboard', compact('jumlahPeserta', 'jumlahSkema'));
})->middleware(['auth', 'role:admin'])->name('dashboard');

// Dashboard User dengan fitur pencarian
Route::get('/user-dashboard', function (Request $request) {
    $search = $request->input('search');

    $pesertas = Peserta::with('skema')
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nomor_peserta', 'like', '%' . $search . '%');
            });
        })
        ->get();

    return view('user-dashboard', compact('pesertas', 'search'));
})->middleware(['auth', 'role:user'])->name('user.dashboard');

// Detail dan edit peserta oleh User
Route::get('/user-peserta/{pesertum}', [UserPesertaController::class, 'show'])
    ->middleware(['auth', 'role:user'])
    ->name('user.peserta.show');

Route::get('/user-peserta/{pesertum}/edit', [UserPesertaController::class, 'edit'])
    ->middleware(['auth', 'role:user'])
    ->name('user.peserta.edit');

Route::put('/user-peserta/{pesertum}', [UserPesertaController::class, 'update'])
    ->middleware(['auth', 'role:user'])
    ->name('user.peserta.update');

// Edit profil User
Route::post('/user-profile/update', [UserProfileController::class, 'update'])
    ->middleware(['auth', 'role:user'])
    ->name('user.profile.update');

// Data Skema khusus Admin
Route::resource('skema', SkemaController::class)
    ->middleware(['auth', 'role:admin']);

// Data Peserta khusus Admin
Route::resource('peserta', PesertaController::class)
    ->middleware(['auth', 'role:admin']);