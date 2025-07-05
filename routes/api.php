<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::post('auth/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::get('validate-token', [AuthController::class, 'validateToken']);
        Route::post('refresh-token', [AuthController::class, 'refreshToken']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('logout-all', [AuthController::class, 'logoutAll']);
        Route::post('registration', [AuthController::class, 'registration']);
    });

    Route::apiResources([
        'users' => UsersController::class
    ]);

});
