<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::resource('/', DashboardController::class)->names([
        'index' => 'admin.dashboard.index',
    ]);

    // Route::get('/', [DashboardController::class, 'index']);
});