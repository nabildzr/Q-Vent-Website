<?php

use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('user')->group(function () {
    Route::post('sign-in', [AuthenticationController::class, 'signIn'])->name('signin');
    Route::post('send-code', [AuthenticationController::class, 'sendCode'])->name('send.code');
    Route::post('verify-code', [AuthenticationController::class, 'verifyCode'])->name('verify.code');
    Route::put('recovery-password', [AuthenticationController::class, 'recoveryPassword']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    // event (one)
    Route::prefix('event')->group(function () {
        Route::get('{id}', [EventController::class, 'getEventById']);
    });

    // events (many)
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'getAllEvents']);
        
    });

    // user
    Route::prefix('user')->group(function () {
        Route::get('sign-out', [AuthenticationController::class, 'signOut'])->name('signout');
        Route::get('{id}/events', [EventController::class, 'getUserEvents']);
        Route::get('{id}/events/upcoming', [EventController::class, 'getUserEventsUpcoming']);
        Route::get('{id}/events/done', [EventController::class, 'getUserEventsDone']);
        Route::get('{id}/events/ongoing', [EventController::class, 'getUserEventsOnGoing']);
        Route::get('{id}', [UserController::class, 'getUserById']);
    });
});
