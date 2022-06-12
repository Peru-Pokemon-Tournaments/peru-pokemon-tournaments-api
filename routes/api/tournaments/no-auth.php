<?php

use App\Http\Controllers\Tournament\Competitor\Inscription\GetCompetitorTournamentInscriptionController;
use App\Http\Controllers\Tournament\FetchTournamentsController;
use App\Http\Controllers\Tournament\GetCompleteTournamentController;
use App\Http\Controllers\Tournament\Inscription\GetTournamentCompetitorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| No-Auth Tournaments Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament resources.
| It can be accessed by any user because does not have auth.
|
*/

Route::prefix('tournaments')->group(function () {
    // Route::get('/', GetTournamentsController::class);
    Route::get('/', FetchTournamentsController::class);

    Route::prefix('{tournament}')->group(function () {
        Route::get('/', GetCompleteTournamentController::class);

        Route::prefix('competitors')->group(function () {
            Route::prefix('{competitor}')->group(function () {
                Route::prefix('/inscription')->group(function () {
                    Route::get('/', GetCompetitorTournamentInscriptionController::class);
                });
            });
        });

        Route::prefix('inscriptions')->group(function () {
            Route::get('/', GetTournamentCompetitorsController::class);
        });
    });
});
