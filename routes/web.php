<?php

// Menggunakan fitur Route dari Laravel
use Illuminate\Support\Facades\Route;

// Menggunakan controller untuk login, skema, dan peserta
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Menggunakan model untuk menghitung jumlah data di dashboard
use App\Models\Peserta;
use App\Models\Skema;


// Route halaman utama
// Saat membuka "/", user diarahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});


// Menampilkan halaman login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');


// Memproses data login yang dikirim dari form
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');


// Memproses logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


// Menampilkan dashboard
// middleware('auth') digunakan agar hanya user yang sudah login
// yang dapat mengakses dashboard
Route::get('/dashboard', function () {

    // Menghitung jumlah seluruh peserta
    $jumlahPeserta = Peserta::count();

    // Menghitung jumlah seluruh skema
    $jumlahSkema = Skema::count();

    // Mengirim jumlah data ke halaman dashboard
    return view('dashboard', compact(
        'jumlahPeserta',
        'jumlahSkema'
    ));

})->middleware('auth')->name('dashboard');


// Membuat route CRUD untuk data skema
// Route::resource otomatis membuat route index, create, store,
// show, edit, update, dan destroy
Route::resource('skema', SkemaController::class);


// Membuat route CRUD untuk data peserta
Route::resource('peserta', PesertaController::class);