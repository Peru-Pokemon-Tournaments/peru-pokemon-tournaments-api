<?php

use App\Http\Controllers\Tournament\Competitor\Inscription\DeleteCompetitorTournamentInscriptionController;
use App\Http\Controllers\Tournament\Competitor\IsCompetitorEnrolledToTournamentController;
use App\Http\Controllers\Tournament\CreateCompleteTournamentController;
use App\Http\Controllers\Tournament\Inscription\CreateCompleteTournamentInscriptionController;
use App\Http\Controllers\Tournament\TournamentResult\CreateTournamentResultController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Tournaments Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('tournaments')->group(function () {
    Route::post('/', CreateCompleteTournamentController::class);

    Route::prefix('{tournament}')->group(function () {
        Route::prefix('competitors')->group(function () {
            Route::prefix('{competitor}')->group(function () {
                Route::get('/is-enrolled', IsCompetitorEnrolledToTournamentController::class);
                Route::prefix('/inscription')->group(function () {
                    Route::delete('/', DeleteCompetitorTournamentInscriptionController::class);
                });
            });
        });

        Route::prefix('inscriptions')->group(function () {
            Route::post('/', CreateCompleteTournamentInscriptionController::class);
        });

        Route::prefix('/results')->group(function () {
            Route::post('/', CreateTournamentResultController::class);
        });
    });
});
