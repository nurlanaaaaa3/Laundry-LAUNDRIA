<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PelangganAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Pelanggan\ProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\LaporanController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// ======= admin =======
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/logout', fn() => redirect('/admin/login'));

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('pelanggan', PelangganController::class)
            ->names('admin.pelanggan')
            ->except(['show']);

        Route::resource('layanan', LayananController::class)
            ->names('admin.layanan')
            ->except(['show']);

        Route::resource('transaksi', TransaksiController::class)
            ->names('admin.transaksi')
            ->except(['show']);

        Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
        Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('admin.laporan.export-excel');
        Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('admin.laporan.export-pdf');

        Route::get('/statistik', [\App\Http\Controllers\Admin\StatistikController::class, 'index'])->name('admin.statistik');

        // Stok & Mesin
        Route::get('/stok', [\App\Http\Controllers\Admin\StokController::class, 'index'])->name('admin.stok.index');
        Route::post('/stok', [\App\Http\Controllers\Admin\StokController::class, 'storeStok'])->name('admin.stok.store');
        Route::put('/stok/{stok}', [\App\Http\Controllers\Admin\StokController::class, 'updateStok'])->name('admin.stok.update');
        Route::delete('/stok/{stok}', [\App\Http\Controllers\Admin\StokController::class, 'destroyStok'])->name('admin.stok.destroy');
        Route::post('/stok/{stok}/masuk', [\App\Http\Controllers\Admin\StokController::class, 'masuk'])->name('admin.stok.masuk');
        Route::post('/stok/{stok}/keluar', [\App\Http\Controllers\Admin\StokController::class, 'keluar'])->name('admin.stok.keluar');
        Route::post('/mesin', [\App\Http\Controllers\Admin\StokController::class, 'storeMesin'])->name('admin.mesin.store');
        Route::put('/mesin/{mesin}', [\App\Http\Controllers\Admin\StokController::class, 'updateMesin'])->name('admin.mesin.update');
        Route::delete('/mesin/{mesin}', [\App\Http\Controllers\Admin\StokController::class, 'destroyMesin'])->name('admin.mesin.destroy');

        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    });
});

// ========= pelanggan ==========
Route::get('/register', [PelangganAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PelangganAuthController::class, 'register'])->name('register.submit');

Route::get('/login', [PelangganAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PelangganAuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [PelangganAuthController::class, 'logout'])->name('logout');
Route::get('/logout', fn() => redirect('/login'));

Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/user/dashboard', [BookingController::class, 'dashboard'])->name('pelanggan.dashboard');
    Route::get('/user/lacak', [BookingController::class, 'lacakForm'])->name('pelanggan.lacak.form');
    Route::get('/user/lacak/{kode}', [BookingController::class, 'lacak'])->name('pelanggan.lacak');
    Route::get('/user/konfirmasi/{kode}', [BookingController::class, 'konfirmasi'])->name('pelanggan.konfirmasi');
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('pelanggan.profile');
    Route::put('/user/profile', [ProfileController::class, 'update'])->name('pelanggan.profile.update');
});