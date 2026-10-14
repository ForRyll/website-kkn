<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilKelompokController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Admin\ProgramKerjaAdminController;
use App\Http\Controllers\Admin\BeritaAdminController;
use App\Http\Controllers\Admin\GaleriAdminController;
use App\Http\Controllers\Admin\UmkmAdminController;
use App\Http\Controllers\Admin\AnggotaAdminController;
use App\Http\Controllers\Admin\DokumenAdminController;
use Illuminate\Support\Facades\Route;

// Halaman utama & statis
Route::get('/', function () { return view('beranda'); });
Route::get('/profil-desa', function () { return view('profil-desa'); });
Route::get('/lokasi', function () { return view('lokasi'); });
Route::get('/qrcode', function () { return view('qrcode'); });

// Halaman publik dari database
Route::get('/profil-kelompok', [ProfilKelompokController::class, 'index']);
Route::get('/program-kerja', [ProgramKerjaController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/umkm', [UmkmController::class, 'index']);
Route::get('/dokumen', [DokumenController::class, 'index']);

// Dashboard Breeze
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin CRUD
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('program-kerja', ProgramKerjaAdminController::class);
    Route::resource('berita', BeritaAdminController::class);
    Route::post('berita/{id}/update', [BeritaAdminController::class, 'updateById']);
    Route::resource('galeri', GaleriAdminController::class);
    Route::resource('umkm', UmkmAdminController::class);
Route::resource('anggota', AnggotaAdminController::class)->parameters([
    'anggota' => 'anggota'
]);
    Route::resource('dokumen', DokumenAdminController::class)->only(['index', 'create', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
