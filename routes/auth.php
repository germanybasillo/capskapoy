<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BedAssignController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BedSelected;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomSelected;
use App\Http\Controllers\TenantprofileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    
    Route::resource('/tenantprofiles', TenantprofileController::class);
    Route::post('/tenantprofile/store', [TenantprofileController::class, 'store'])->name('tenantprofile.store');
    Route::put('/tenantprofiles/{id}', [TenantProfileController::class, 'update'])->name('tenantprofiles.update');

    Route::resource('/rooms', RoomController::class);
    Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');

    Route::resource('/beds', BedController::class);
    Route::post('/bed/store', [BedController::class, 'store'])->name('bed.store');

    Route::resource('/selecteds', RoomSelected::class);
    Route::post('/selected/store', [RoomSelected::class, 'store'])->name('selected.store');
    Route::put('/selecteds/{id}', [RoomSelected::class, 'update'])->name('selecteds.update');

    Route::resource('/selectbeds', BedSelected::class);
    Route::post('/selectbed/store', [BedSelected::class, 'store'])->name('selectbed.store');
    Route::put('/selectbeds/{id}', [BedSelected::class, 'update'])->name('selectbeds.update');

    Route::resource('/bedassigns', BedAssignController::class);
    Route::post('/bedassign/store', [BedAssignController::class, 'store'])->name('bedassign.store');
    Route::put('/bedassigns/{id}', [BedAssignController::class, 'update'])->name('bedassigns.update');
});
