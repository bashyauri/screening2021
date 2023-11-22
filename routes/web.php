<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrintForm;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\RemitaController;
use App\Http\Livewire\acceptanceBilling;
use App\Http\Livewire\Auth\EditUser;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Correction;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\Payment;
use App\Http\Livewire\ProcessPayment;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/edit/user', EditUser::class)->name('edit-user');
    //Route::get('printForm', PrintForm::class)->name('printForm');

    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/payment', Payment::class)->name('payment');
    Route::get('/correction', Correction::class)->name('correction');
    Route::get('/acceptance', acceptanceBilling::class)->name('acceptance');

    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/laravel-user-profile', UserProfile::class)->name('laravel-user-profile');

    Route::post('/processPayment', ProcessPayment::class)->name('processPayment');
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');

    // Laravel 8
    Route::get('print', [PrintForm::class, 'printForm'])->name('print');
    Route::get('offer', [PrintForm::class, 'printOffer'])->name('offer');
    Route::post('process', [RemitaController::class, 'confirmPayment'])->name('process');
    Route::post('invoice', [RemitaController::class, 'generateInvoice'])->name('invoice');
    Route::get('invoice', [RemitaController::class, 'generateInvoice'])->name('invoice');
    Route::get('process', [RemitaController::class, 'confirmPayment'])->name('process');

    Route::get('transaction', [RemitaController::class, 'remitaTransactionDetails'])->name('transaction');
    Route::get('/download/{id}', [RemitaController::class, 'pdfDownload'])
        ->name('download.pdfDownload');

    Route::get('status/{orderID}/', [RemitaController::class, 'getStatus'])->name('status');
    Route::post('profile', [UserProfile::class, 'redirectToGateway'])->name('pay');
    Route::post('pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    Route::get('qr-code', [QRCodeController::class, 'index'])->name('QRCode.index');
    Route::get('/generate-qrcode', [QrCodeController::class, 'index']);

    //Acceptance

    // Route::post('invoice', [acceptanceBilling::class, 'generateInvoice'])->name('invoice');

    //Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
