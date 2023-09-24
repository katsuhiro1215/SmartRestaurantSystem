<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\OwnerProfileController;
use App\Http\Controllers\Owner\AdminController;
use App\Http\Controllers\Owner\AdminProfileController;
use App\Http\Controllers\Owner\ShopController;

Route::middleware('auth:owners', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('owner.dashboard');
    })->name('dashboard');
    // Owner
    Route::controller(OwnerController::class)->prefix('owner')->group(function () {
        Route::get('/edit', 'edit')->name('owner.edit');
        Route::patch('/', 'update')->name('owner.update');
        Route::delete('/', 'destroy')->name('owner.destroy');
    });
    // Owner Profile
    Route::controller(OwnerProfileController::class)->prefix('profile')->group(function () {
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
    });
    // Admin
    Route::resource('/admin', AdminController::class);
    Route::controller(AdminController::class)->prefix('expiredAdmin')->group(function () {
        Route::get('/',  'expiredIndex')->name('admin.expired.index');
        Route::get('/{admin}', 'expiredRestore')->name('admin.expired.restore');
        Route::delete('/{admin}', 'expiredDestroy')->name('admin.expired.destroy');
    });
    // Admin Profile
    Route::controller(AdminProfileController::class)->prefix('adminProfile')->group(function () {
        Route::get('/profile/{admin}/create', 'create')->name('adminProfile.create');
        Route::post('/profile', 'store')->name('adminProfile.store');
        Route::get('/profile/{admin}/{adminProfile}/edit', 'edit')->name('adminProfile.edit');
        Route::put('/profile/{adminProfile}', 'update')->name('adminProfile.update');
    });
    // Shop
    Route::controller(ShopController::class)->prefix('shop')->group(function () {
        Route::get('/', 'index')->name('shop.index');
        Route::get('/{admin}/create', 'create')->name('shop.create');
        Route::post('/', 'store')->name('shop.store');
        Route::get('/{shop}', 'show')->name('shop.show');
        Route::get('/{shop}/edit', 'edit')->name('shop.edit');
        Route::put('/{shop}', 'update')->name('shop.update');
        Route::delete('/{shop}', 'destroy')->name('shop.destroy');
    });
});

require __DIR__ . '/owner_auth.php';
