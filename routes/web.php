<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KaryaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\KarirController;
use App\Http\Controllers\Admin\FasilitasController;
use Illuminate\Support\Facades\Route;

// ===== FRONTEND PUBLIC ROUTES =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/alumni', [HomeController::class, 'alumni'])->name('alumni');

// Kegiatan/Berita
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kegiatan/{slug}', [HomeController::class, 'kegiatanDetail'])->name('kegiatan.detail');

// Karya Siswa
Route::get('/karya', [HomeController::class, 'karya'])->name('karya');
Route::get('/karya/{slug}', [HomeController::class, 'karyaDetail'])->name('karya.detail');

// Galeri
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');

// Prestasi
Route::get('/prestasi', [HomeController::class, 'prestasi'])->name('prestasi');

// Karir
Route::get('/karir', [HomeController::class, 'karir'])->name('karir');
Route::get('/karir/{slug}', [HomeController::class, 'karirDetail'])->name('karir.detail');

// Kontak
Route::get('/hubungi-kami', [HomeController::class, 'contact'])->name('contact');
Route::post('/hubungi-kami', [HomeController::class, 'sendContact'])->name('contact.send');

// Pendaftaran (Public Phase 1 & 2)
use App\Http\Controllers\PendaftaranController as PublicPendaftaranController;
Route::post('/pendaftaran/phase1', [PublicPendaftaranController::class, 'storePhase1'])->name('pendaftaran.storePhase1');
Route::get('/pendaftaran/{id}/step2', [PublicPendaftaranController::class, 'step2'])->name('pendaftaran.step2');
Route::put('/pendaftaran/{id}/step2', [PublicPendaftaranController::class, 'updateStep2'])->name('pendaftaran.updateStep2');

// ===== ADMIN ROUTES (Protected) =====
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Existing resources
    Route::resource('carousel', CarouselController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('guru', GuruController::class);
    
    // Pendaftaran (CRUD)
    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::delete('pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
    
    // Kontak (read-only with mark as read)
    Route::get('kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::patch('kontak/{id}/read', [KontakController::class, 'markAsRead'])->name('kontak.markAsRead');
    
    // Newsletter
    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    
    // New resources
    Route::resource('alumni', AlumniController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('karya', KaryaController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('karir', KarirController::class);
    Route::resource('fasilitas', FasilitasController::class);
});

// ===== PROFILE ROUTES =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
