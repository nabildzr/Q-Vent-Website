<?php

use App\Http\Controllers\api\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('user')->group(function () {
    Route::post('sign-in', [AuthenticationController::class, 'signIn'])->name('signin');
    Route::post('send-code', [AuthenticationController::class, 'sendCode'])->name('send.code');
    Route::post('verify-code', [AuthenticationController::class, 'verifyCode'])->name('verify.code');
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('sign-out', [AuthenticationController::class, 'signOut'])->name('signout');
    });
});
