<?php

use App\Http\Controllers\TournamentRule\FetchTournamentRulesController;
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
});
