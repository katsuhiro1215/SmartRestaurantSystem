<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeeProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\EmployeeShopController;


Route::middleware('auth:admins', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    // Admin
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('/edit', 'edit')->name('admin.edit');
        Route::patch('/', 'update')->name('admin.update');
        Route::delete('/', 'destroy')->name('admin.destroy');
    });
    // Admin Profile
    Route::controller(AdminProfileController::class)->prefix('profile')->group(function () {
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
    });
    // Employee
    Route::resource('/employee', EmployeeController::class);
    Route::controller(EmployeeController::class)->prefix('expiredEmployee')->group(function () {
        Route::get('/',  'expiredIndex')->name('expiredEmployee.index');
        Route::get('/{employee}', 'expiredRestore')->name('expiredEmployee.restore');
        Route::delete('/{employee}', 'expiredDestroy')->name('expiredEmployee.destroy');
    });
    // Employee Profile
    Route::controller(EmployeeProfileController::class)->prefix('employeeProfile')->group(function () {
        Route::get('/profile/{employee}/create', 'create')->name('employeeProfile.create');
        Route::post('/profile', 'store')->name('employeeProfile.store');
        Route::get('/profile/{employee}/{employeeProfile}/edit', 'edit')->name('employeeProfile.edit');
        Route::put('/profile/{employeeProfile}', 'update')->name('employeeProfile.update');
    });
    // User
    Route::resource('/user', UserController::class)->only('index', 'show');
    // Shop
    Route::resource('/shop', ShopController::class);
    Route::controller(ShopController::class)->prefix('expiredShop')->group(function () {
        Route::get('/',  'expiredIndex')->name('expiredShop.index');
        Route::get('/{shop}', 'expiredRestore')->name('expiredShop.restore');
        Route::delete('/{shop}', 'expiredDestroy')->name('expiredShop.destroy');
    });
    // Menu Category
    Route::resource('/menuCategory', MenuCategoryController::class)->except('index');
    Route::controller(MenuCategoryController::class)->prefix('expiredMenuCategory')->group(function () {
        Route::get('/',  'expiredIndex')->name('expiredMenuCategory.index');
        Route::get('/{menuCategory}', 'expiredRestore')->name('expiredMenuCategory.restore');
        Route::delete('/{menuCategory}', 'expiredDestroy')->name('expiredMenuCategory.destroy');
    });
    // Menu
    Route::resource('/menu', MenuController::class);
    Route::controller(MenuController::class)->prefix('expiredMenu')->group(function () {
        Route::get('/',  'expiredIndex')->name('expiredMenu.index');
        Route::get('/{menu}', 'expiredRestore')->name('expiredMenu.restore');
        Route::delete('/{menu}', 'expiredDestroy')->name('expiredMenu.destroy');
    });
    // Assign
    Route::resource('/employeeShop', EmployeeShopController::class)->except('show');
});

require __DIR__ . '/admin_auth.php';
