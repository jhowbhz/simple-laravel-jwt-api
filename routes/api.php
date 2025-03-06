<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UsersController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('profile', [AuthController::class, 'profile'])->middleware('auth:api')->name('profile');

    Route::post('send', [JobsController::class, 'send'])->middleware('auth:api')->name('send');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'jobs'
], function ($router) {
    Route::post('send', [JobsController::class, 'send'])->middleware('auth:api')->name('send');
});

Route::apiResource('users', UsersController::class)->middleware('auth:api');
