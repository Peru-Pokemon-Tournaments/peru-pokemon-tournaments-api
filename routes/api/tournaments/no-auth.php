<?php

use App\Http\Controllers\Tournament\GetCompleteTournamentController;
use App\Http\Controllers\Tournament\GetTournamentCompetitorsController;
use App\Http\Controllers\Tournament\GetTournamentsController;
use App\Http\Controllers\TournamentInscription\GetCompetitorTournamentInscriptionController;
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

    Route::get('/', GetTournamentsController::class);

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
