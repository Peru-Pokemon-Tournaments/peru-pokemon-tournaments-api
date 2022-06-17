<?php

use App\Http\Controllers\Game\CreateGameController;
use App\Http\Controllers\Game\FetchGamesController;
use App\Http\Controllers\Game\UpdateGameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Games Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for game resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/games')->group(function () {
    Route::get('/', FetchGamesController::class);
    Route::post('/', CreateGameController::class);

    Route::prefix('{game}')->group(function () {
        Route::patch('/', UpdateGameController::class);
    });
});
