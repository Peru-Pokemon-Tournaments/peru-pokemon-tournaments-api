<?php

use App\Http\Controllers\TournamentType\CreateTournamentTypeController;
use App\Http\Controllers\TournamentType\FetchTournamentTypesController;
use App\Http\Controllers\TournamentType\UpdateTournamentTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Tournament Types Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament type resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/tournament-types')->group(function () {
    Route::get('/', FetchTournamentTypesController::class);
    Route::post('/', CreateTournamentTypeController::class);

    Route::prefix('{tournamentType}')->group(function () {
        Route::patch('/', UpdateTournamentTypeController::class);
    });
});
