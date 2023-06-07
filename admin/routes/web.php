<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('recommended', [AdminController::class, 'allRecommended'])->name('recommended');
Route::get('pdf', [AdminController::class, 'generatePDF'])->name('pdf');
Route::get('applicants', [AdminController::class, 'allApplicants'])->name('applicants');
//Route::get('students', [AdminController::class, 'allStudents'])->name('students');
Route::post('applicants/recommend/{id}', [AdminController::class, 'recommendApplicants'])->name('recommend');
Route::get('shortlisted', [AdminController::class, 'allShortlisted'])->name('shortlist');
Route::get('applicants/drop/{id}', [AdminController::class, 'dropApplicants'])->name('drop');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
