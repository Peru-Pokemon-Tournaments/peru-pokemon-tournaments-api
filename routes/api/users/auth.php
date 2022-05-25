<?php

use App\Http\Controllers\User\FetchUsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Users Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for user resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/users')->group(function () {
    Route::get('/', FetchUsersController::class);
});
