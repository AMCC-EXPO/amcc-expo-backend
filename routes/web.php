<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WizardController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.register');
});

Route::get('/email1', function () {
    return view('emails.register');
});

Route::get('/email2', function () {
    return view('emails.paid');
});

Route::middleware('auth')->group(function () {

    Route::get('/wizard/profile', [WizardController::class, 'profile'])
        ->name('wizard.profile');

    Route::post('/wizard/profile', [WizardController::class, 'updateProfile'])
        ->name('wizard.update-profile');

    Route::get('/wizard/payment-method', [WizardController::class, 'paymentMethod'])
        ->name('wizard.payment-method');

    Route::post('/wizard/payment-method', [WizardController::class, 'updatePaymentMethod'])
        ->name('wizard.update-payment-method');

    Route::get('/wizard/payment-confirm', [WizardController::class, 'paymentConfirm'])
        ->name('wizard.payment-confirm');

    Route::post('/wizard/payment-confirm', [WizardController::class, 'storePaymentConfirm'])
        ->name('wizard.store-payment-confirm');

    Route::get('/wizard/summary', [WizardController::class, 'summary'])
        ->name('wizard.summary');

    Route::get('/edit-profile', [AccountController::class, 'editProfile'])
        ->name('edit-profile');

    Route::post('/edit-profile', [AccountController::class, 'updateProfile'])
        ->name('update-profile');

    Route::get('/change-password', [AccountController::class, 'changePassword'])
        ->name('change-password');

    Route::post('/update-password', [AccountController::class, 'updatePassword'])
        ->name('update-password');
});

// Route::get('/', function () {
//     return redirect()->route('register');
// });

Route::get('/dashboard', function () {
    $wizard = Auth::user()->wizard;
    return redirect()->route('wizard.' . $wizard);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
