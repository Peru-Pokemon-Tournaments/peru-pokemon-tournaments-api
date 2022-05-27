<?php

use App\Http\Controllers\Auth\AdminLoginUserController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| No-Auth Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for auth.
| It can be accessed by any user because does not have auth.
|
*/

Route::post('/register', RegisterUserController::class);
Route::post('/login', LoginUserController::class);
Route::post('/admin/login', AdminLoginUserController::class);
