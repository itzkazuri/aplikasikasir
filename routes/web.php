<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'welcome']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\AdminDashboardController;

use App\Http\Controllers\Admin\BarangController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Petugas\PetugasController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Barang Routes
    Route::get('/admin/barang', [BarangController::class, 'index'])->name('admin.barang');
    Route::get('/admin/barang/create', function () {
        return view('admin.bartam');
    })->name('admin.barang.create');
    Route::post('/admin/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::delete('/admin/barang/{barang}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');
    Route::get('/admin/barang/{barang}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::put('/admin/barang/{barang}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::get('/admin/barang/search', [BarangController::class, 'search'])->name('admin.barang.search');

    // User Routes
    Route::resource('admin/users', UserController::class)->names('admin.users');
    Route::get('/admin/users/search', [UserController::class, 'search'])->name('admin.users.search');

    // Transaksi Routes
    Route::resource('admin/transaksi', TransaksiController::class)->only(['index', 'destroy', 'create', 'store', 'show', 'edit', 'update'])->names('admin.transaksi');
    Route::get('/admin/transaksi/search', [TransaksiController::class, 'search'])->name('admin.transaksi.search');

    // Laporan Routes
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/admin/laporan/monthly', [LaporanController::class, 'generateMonthly'])->name('admin.laporan.monthly');
    Route::get('/admin/laporan/annual', [LaporanController::class, 'generateAnnual'])->name('admin.laporan.annual');
});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard');
    Route::get('/petugas/barang', [PetugasController::class, 'barangIndex'])->name('petugas.barang.index');
    Route::get('/petugas/barang/search', [PetugasController::class, 'barangSearch'])->name('petugas.barang.search');
    Route::get('/petugas/transaksi/create', [PetugasController::class, 'transaksiCreate'])->name('petugas.transaksi.create');
    Route::post('/petugas/transaksi', [PetugasController::class, 'transaksiStore'])->name('petugas.transaksi.store');
});

Route::get('/aboutus', [PageController::class, 'about']);

Route::get('/kenapa-kami', [PageController::class, 'whyUs']);