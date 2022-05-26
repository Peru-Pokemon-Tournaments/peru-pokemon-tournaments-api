<?php

use App\Http\Controllers\Game\GetGamesController;
use App\Http\Controllers\Role\GetRolesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| No-Auth Options Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for all options.
| It can be accessed by any user because does not have auth.
|
*/

Route::prefix('options')->group(function () {
    Route::get('/roles', GetRolesController::class);
    Route::get('/games', GetGamesController::class);
});
