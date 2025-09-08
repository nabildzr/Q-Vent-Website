<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\AttendeeController;
use Illuminate\Support\Facades\Route;

// ========== ROUTE UNTUK AUTHENTICATION ==========
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password + OTP
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetCode'])->name('password.sendCode');

Route::get('/verify-code', [AuthController::class, 'showVerifyCodeForm'])->name('password.verify.form');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('password.verify');

Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

// ========== ROUTE UNTUK PESERTA ==========
Route::get('/event/{link}', [EventRegistrationController::class, 'showForm'])->name('registration.form');
Route::post('/event/{link}/submit', [EventRegistrationController::class, 'submit'])->name('registration.submit');

// ========== ROUTE UNTUK ADMIN ==========
Route::prefix('admin')->middleware(['auth', 'can:isSuperOrAdmin'])->group(function () {
    Route::resource('/', DashboardController::class)->names([
        'index' => 'admin.dashboard.index',
    ]);

    Route::resource('/user', UserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ])->middleware('can:isSuperAdmin');

    Route::resource('/event_category', EventCategoryController::class)->names([
        'index' => 'admin.event_category.index',
        'create' => 'admin.event_category.create',
        'store' => 'admin.event_category.store',
        'edit' => 'admin.event_category.edit',
        'update' => 'admin.event_category.update',
        'destroy' => 'admin.event_category.destroy',
    ]);

    Route::resource('/event', EventController::class)->names([
        'index' => 'admin.event.index',
        'create' => 'admin.event.create',
        'store' => 'admin.event.store',
        'show' => 'admin.event.show',
        'edit' => 'admin.event.edit',
        'update' => 'admin.event.update',
        'destroy' => 'admin.event.destroy',
    ]);

    Route::put('/event/registration-link/{id}', [EventController::class, 'updateRegistrationLink'])
        ->name('admin.event.registration-link.update');

    Route::get('/event/{event}/input-registration', [EventRegistrationController::class, 'editInputs'])
        ->name('admin.event.input.edit');
    Route::post('/event/{event}/input-registration', [EventRegistrationController::class, 'updateInputs'])
        ->name('admin.event.input.update');

    Route::get('/event/{event}/attendees', [AttendeeController::class, 'index'])
        ->name('admin.attendee.index');

    Route::resource('/attendee', AttendeeController::class)->names([
        'create' => 'admin.attendee.create',
        'store' => 'admin.attendee.store',
        'show' => 'admin.attendee.show',
        'edit' => 'admin.attendee.edit',
        'update' => 'admin.attendee.update',
        'destroy' => 'admin.attendee.destroy',
    ])->except(['index']);
});
