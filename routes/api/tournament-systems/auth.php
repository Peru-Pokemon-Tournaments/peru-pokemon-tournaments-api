<?php

use App\Http\Controllers\TournamentSystem\FetchTournamentSystemsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Tournament Systems Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tournament system resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/tournament-systems')->group(function () {
    Route::get('/', FetchTournamentSystemsController::class);
});
