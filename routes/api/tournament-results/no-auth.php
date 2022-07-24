<?php

use App\Http\Controllers\TournamentResult\GenerateTournamentResultCertificateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| No-Auth Tournament Results Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament results.
| It can be accessed by any user because does not have auth.
|
*/

Route::prefix('/tournament-results')->group(function () {
    Route::prefix('{tournamentResult}')->group(function () {
        Route::get('certificate', GenerateTournamentResultCertificateController::class);
    });
});
