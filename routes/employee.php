<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeProfileController;
use App\Http\Controllers\Employee\AdminController;
use App\Http\Controllers\Employee\UserController;
use App\Http\Controllers\Employee\ShopController;

Route::middleware('auth:employees', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('employee.dashboard');
    })->name('dashboard');
    // Employee
    Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
        Route::get('/edit', 'edit')->name('employee.edit');
        Route::patch('/', 'update')->name('employee.update');
        Route::delete('/', 'destroy')->name('employee.destroy');
    });
    // Employee Profile
    Route::controller(EmployeeProfileController::class)->prefix('profile')->group(function () {
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
    });
    // Admin
    Route::resource('/admin', AdminController::class)->only('index', 'show');
    // User
    Route::resource('/user', UserController::class)->only('index', 'show');
    // Shop
    Route::resource('/shop', ShopController::class)->only('index', 'show');
});

require __DIR__ . '/employee_auth.php';
