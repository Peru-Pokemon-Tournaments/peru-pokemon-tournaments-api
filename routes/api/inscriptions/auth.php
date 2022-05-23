<?php

use App\Http\Controllers\TournamentInscription\DeleteTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\GetTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\UpdateTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\UpdateTournamentInscriptionStatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Inscriptions Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for inscription resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('inscriptions')->group(function () {
    Route::prefix('{tournamentInscription}')->group(function() {
        Route::get('/', GetTournamentInscriptionController::class);
        Route::delete('/', DeleteTournamentInscriptionController::class);
        Route::patch('/', UpdateTournamentInscriptionController::class);

        Route::put('/status', UpdateTournamentInscriptionStatusController::class);

    });
});
