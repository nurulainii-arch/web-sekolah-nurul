<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;

// Controller Admin
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SchoolSettingController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\ArtikelKategoriController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\SeragamController;
use App\Http\Controllers\Admin\PrestasiController;

// Controller Public
use App\Http\Controllers\PublicJurusanController;
use App\Http\Controllers\PublicEkskulController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PublicEkstrakurikulerController;
use App\Http\Controllers\PublicTeacherController;
use App\Http\Controllers\PublicPrestasiController;
use App\Http\Controllers\Admin\PengumumanController as PengumumanAdminController;
use App\Http\Controllers\Admin\AgendaController as AgendaAdminController;

/*
|--------------------------------------------------------------------------
| Web Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/guru', [HomeController::class, 'guru'])->name('guru');
Route::get('/jurusan', [PublicJurusanController::class, 'index'])->name('jurusan');
Route::get('/ekstrakurikuler', [PublicEkstrakurikulerController::class, 'index'])->name('ekskul');
Route::get('/prestasi', [PublicPrestasiController::class, 'index'])->name('prestasi');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita.index');
Route::get('/berita/{artikel:slug}', [HomeController::class, 'beritaDetail'])->name('berita.show');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/galeri', [ProfilController::class, 'galeri'])->name('profil.galeri');
Route::get('/profil/akreditasi', [ProfilController::class, 'akreditasi'])->name('profil.akreditasi');


// Sub-Kategori Guru
Route::get('/guru/mapel', [PublicTeacherController::class, 'mapel'])->name('guru.mapel');
Route::get('/guru/tu', [PublicTeacherController::class, 'tu'])->name('guru.tu');
Route::get('/guru/{singkatan}', [PublicTeacherController::class, 'show'])->name('guru.show');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SchoolSettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SchoolSettingController::class, 'update'])->name('settings.update');

    Route::resource('teachers', TeacherController::class);
    Route::resource('jurusans', JurusanController::class); 
    Route::resource('pengumuman', PengumumanAdminController::class);
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
    Route::resource('galleries', GaleriController::class);
    Route::resource('kontak', KontakController::class)->only(['index', 'show', 'destroy']);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('agenda', AgendaAdminController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('seragam', SeragamController::class);
    Route::resource('prestasi', PrestasiController::class);

    Route::get('/quote', [QuoteController::class, 'edit'])->name('quote.edit');
    Route::put('/quote', [QuoteController::class, 'update'])->name('quote.update');

    Route::get('/artikel-kategori', [ArtikelKategoriController::class, 'index'])->name('artikel-kategori.index');
    Route::get('/artikel-kategori/create', [ArtikelKategoriController::class, 'create'])->name('artikel-kategori.create');
    Route::post('/artikel-kategori', [ArtikelKategoriController::class, 'store'])->name('artikel-kategori.store');
    Route::get('/artikel-kategori/{id}/edit', [ArtikelKategoriController::class, 'edit'])->name('artikel-kategori.edit');
    Route::put('/artikel-kategori/{id}', [ArtikelKategoriController::class, 'update'])->name('artikel-kategori.update');
    Route::delete('/artikel-kategori/{id}', [ArtikelKategoriController::class, 'destroy'])->name('artikel-kategori.destroy');
    Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi.index');
    Route::put('/struktur-organisasi', [StrukturOrganisasiController::class, 'update'])->name('struktur-organisasi.update');
});