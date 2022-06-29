<?php

use App\Http\Controllers\Device\GetDevicesController;
use App\Http\Controllers\Game\GetGamesController;
use App\Http\Controllers\GameGeneration\GetGameGenerationsController;
use App\Http\Controllers\Role\GetRolesController;
use App\Http\Controllers\TournamentFormat\GetTournamentFormatsController;
use App\Http\Controllers\TournamentRule\GetTournamentRulesController;
use App\Http\Controllers\TournamentSystem\GetTournamentSystemsController;
use App\Http\Controllers\TournamentType\GetTournamentTypesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| No-Auth Options Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for all options.
| It can be accessed by any user because does not have auth.
|
*/

Route::prefix('options')->group(function () {
    Route::get('/devices', GetDevicesController::class);
    Route::get('/games', GetGamesController::class);
    Route::get('/game-generations', GetGameGenerationsController::class);
    Route::get('/roles', GetRolesController::class);
    Route::get('/tournament-formats', GetTournamentFormatsController::class);
    Route::get('/tournament-rules', GetTournamentRulesController::class);
    Route::get('/tournament-systems', GetTournamentSystemsController::class);
    Route::get('/tournament-types', GetTournamentTypesController::class);
});
