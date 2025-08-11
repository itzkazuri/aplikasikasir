<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\AdminDashboardController;

use App\Http\Controllers\Admin\BarangController;

use App\Http\Controllers\Admin\UserController;

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
});
