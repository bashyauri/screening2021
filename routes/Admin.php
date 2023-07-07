<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    // Admin dashboard route
    Route::get('/', function () {
        return redirect('admin.dashboard');
    });

    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
    // Other admin routes...
    Route::group(['middleware' => 'admin.auth'], function () {
        // Admin routes
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/get-admin-details', [AdminController::class, 'getAdminDetails']);
        Route::post('/update-admin-details', [AdminController::class, 'updateAdminDetails']);
        Route::get('/get-admin-password', [AdminController::class, 'getAdminPassword']);
        Route::post('/update-admin-password', [AdminController::class, 'updateAdminPassword']);
        Route::get('/get-applicants', [AdminController::class, 'getApplicants']);
        Route::post('/recommend', [ApplicantController::class, 'recommend'])->name('recommend');
        Route::get('/recommended-applicants', [ApplicantController::class, 'getRecommendedApplicants'])->name('admin.recommended-applicants');
        Route::post('/drop-applicants', [ApplicantController::class, 'dropRecommendedApplicants'])->name('admin.drop-applicants');
        Route::post('/shortlist-applicants', [ApplicantController::class, 'shortlistApplicants']);
        Route::get('/convert-to-docx', [ReportController::class, 'exportToDocx']);
        Route::get('/search-course-applicants', [ApplicantController::class, 'searchCourseApplicants']);
        Route::get('/search-recommended-applicants-course', [ApplicantController::class, 'searchRecommendedApplicantsCourse']);
        Route::get('/search-recommended-by-department', [ApplicantController::class, 'searchRecommendedApplicantsDepartment']);



        Route::get('/logout', [AdminLogoutController::class, 'logout']);
    });
});