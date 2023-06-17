<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    // Admin dashboard route
    Route::get('/', function () {
        return view('admin.login');
    });

    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
    // Other admin routes...
    Route::group(['middleware' => 'admin.auth'], function () {
        // Admin routes
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout']);
    });
});
