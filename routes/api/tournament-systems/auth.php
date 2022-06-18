<?php

use App\Http\Controllers\TournamentSystem\CreateTournamentSystemController;
use App\Http\Controllers\TournamentSystem\FetchTournamentSystemsController;
use App\Http\Controllers\TournamentSystem\UpdateTournamentSystemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Tournament Systems Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament system resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/tournament-systems')->group(function () {
    Route::get('/', FetchTournamentSystemsController::class);
    Route::post('/', CreateTournamentSystemController::class);

    Route::prefix('{tournamentSystem}')->group(function () {
        Route::patch('/', UpdateTournamentSystemController::class);
    });
});
