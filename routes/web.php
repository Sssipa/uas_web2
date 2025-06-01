<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/beli', [BarangController::class, 'index'])->name('barangs.index');
    
    // Route::get('/jual', [BarangController::class, 'jual'])->name('barangs.jual');
    Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barangs.show');
    Route::post('/barang', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
    Route::get('/jual', [BarangController::class, 'jual'])->name('barangs.jual');
    Route::post('/jual', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/jual/create', [BarangController::class, 'create'])->name('barangs.create');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barangs.update');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
    Route::post('/cart', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('carts.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/manage-items', [BarangController::class, 'manage'])->name('barangs.manage');

    Route::get('/manage-users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/manage-users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

