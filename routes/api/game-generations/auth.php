<?php

use App\Http\Controllers\GameGeneration\CreateGameGenerationController;
use App\Http\Controllers\GameGeneration\FetchGameGenerationsController;
use App\Http\Controllers\GameGeneration\GetGameGenerationController;
use App\Http\Controllers\GameGeneration\UpdateGameGenerationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Game Generations Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for game generation resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/game-generations')->group(function () {
    Route::get('/', FetchGameGenerationsController::class);
    Route::post('/', CreateGameGenerationController::class);

    Route::prefix('{gameGeneration}')->group(function () {
        Route::get('/', GetGameGenerationController::class);
        Route::patch('/', UpdateGameGenerationController::class);
    });
});
