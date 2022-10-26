<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:admin');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:admin')
        ->name('dashboard');

    Route::get('/report', [DashboardController::class, 'report'])
        ->middleware('auth:admin')
        ->name('report');

    Route::resource("members", UserController::class)
        ->middleware('auth:admin');

    Route::resource("divisions", DivisionController::class)
        ->middleware('auth:admin');

    Route::resource("faqs", FaqController::class)
        ->middleware('auth:admin');

    Route::resource("payment-methods", PaymentMethodController::class)
        ->middleware('auth:admin');

    Route::resource("settings", SettingController::class)
        ->middleware('auth:admin');

    Route::get('/chat', [UserController::class, 'chat'])
        ->middleware('auth:admin')
        ->name('chat');

    Route::get('/members/{id}/review', [PaymentController::class, 'review'])
        ->middleware('auth:admin')
        ->name('review');

    Route::post('/members/{id}/approve', [PaymentController::class, 'approve'])
        ->middleware('auth:admin')
        ->name('approve');

    Route::post('/members/{id}/reset-password', [AccountController::class, 'resetPassword'])
        ->middleware('auth:admin')
        ->name('members.reset-password');

    /*
    |--------------------------------------------------------------------------
    | Routes Auth Admin
    |--------------------------------------------------------------------------
    */
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:admin')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:admin');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:admin')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:admin');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:admin')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:admin');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('logout');
});
