<?php

use App\Http\Controllers\TournamentRule\CreateTournamentRuleController;
use App\Http\Controllers\TournamentRule\FetchTournamentRulesController;
use App\Http\Controllers\TournamentRule\GetTournamentRuleController;
use App\Http\Controllers\TournamentRule\UpdateTournamentRuleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Tournament Rules Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament rule resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/tournament-rules')->group(function () {
    Route::get('/', FetchTournamentRulesController::class);
    Route::post('/', CreateTournamentRuleController::class);

    Route::prefix('{tournamentRule}')->group(function () {
        Route::get('/', GetTournamentRuleController::class);
        Route::patch('/', UpdateTournamentRuleController::class);
    });
});
