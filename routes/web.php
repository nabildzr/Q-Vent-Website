<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
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
    ]);

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

    // Route::get('/', [DashboardController::class, 'index']);
});
