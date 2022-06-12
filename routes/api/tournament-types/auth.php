<?php

use App\Http\Controllers\TournamentType\FetchTournamentTypesController;
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
});
