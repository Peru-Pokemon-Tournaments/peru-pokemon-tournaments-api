<?php

use App\Http\Controllers\GameGeneration\FetchGameGenerationsController;
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
});
