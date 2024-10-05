<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Warga routes
Route::prefix('warga')->group(function () {
    Route::get('dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard');
    Route::get('buat-aduan', [WargaController::class, 'buatAduan'])->name('warga.buat-aduan');
    Route::post('buat-aduan', [WargaController::class, 'storeAduan'])->name('warga.store-aduan');
    Route::get('status-aduan', [WargaController::class, 'statusAduan'])->name('warga.status-aduan');
    Route::get('profil', [WargaController::class, 'showProfil'])->name('warga.profil');
    Route::put('profil/update', [WargaController::class, 'updateProfil'])->name('warga.profil.update');
    
    // Rute untuk aduan
    Route::get('aduan/{id}', [AduanController::class, 'show'])->name('warga.aduan.show');
    Route::post('aduan/{id}/respon', [AduanController::class, 'storeResponse'])->name('warga.aduan.respon');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('daftar-aduan', [AdminController::class, 'daftarAduan'])->name('admin.daftar-aduan');
    Route::get('tanggapi-aduan/{id}', [AdminController::class, 'tanggapiAduan'])->name('admin.tanggapi-aduan');
    Route::post('tanggapi-aduan/{id}', [AdminController::class, 'storeTanggapan']);
});

// Laporan routes
Route::get('/laporan', function () {
    return view('laporan-sederhana');
});

// Route tambahan (jika diperlukan)
Route::get('/a', function () {
    return view('a');
});

Route::get('/tanggapi', function () {
    return view('tanggapi');
});

// Authentication routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
