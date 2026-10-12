<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Halaman Welcome Utama (Tampilan Publik)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// RUTE KHUSUS TAMU (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// RUTE KHUSUS SETELAH LOGIN (Admin & User)
Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Halaman khusus untuk user biasa
    // Halaman khusus untuk user biasa
// Halaman khusus untuk user biasa
Route::get('/user/dashboard', function () {
    // Alihkan langsung ke dashboard utama yang filenya sudah pasti ada dan terdeteksi
    return view('dashboard'); 
})->name('user.dashboard');



    // Halaman khusus untuk admin utama
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'total_peserta' => \App\Models\Peserta::count(), 
            'total_skema' => \App\Models\Skema::count()
        ]);
    })->name('dashboard');

    // Modul Data Peserta
    Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('/peserta', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('/peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('/peserta/{id}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('/peserta/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');

    // Modul Data Skema
    Route::get('/skema', [SkemaController::class, 'index'])->name('skema.index');
    Route::get('/skema/create', [SkemaController::class, 'create'])->name('skema.create');
    Route::post('/skema', [SkemaController::class, 'store'])->name('skema.store');
    Route::delete('/skema/{id}', [SkemaController::class, 'destroy'])->name('skema.destroy');
});
