<?php

use App\Http\Controllers\User\Password\CreatePasswordResetController;
use App\Http\Controllers\User\Password\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| No-Auth Users Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for user resources.
| It can be accessed by any user because does not have auth.
|
*/

Route::prefix('/users')->group(function () {
    Route::prefix('/password')->group(function () {
        Route::put('/', ResetPasswordController::class);
        Route::post('/reset', CreatePasswordResetController::class);
    });
});
