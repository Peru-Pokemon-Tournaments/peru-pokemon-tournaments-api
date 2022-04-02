<?php

use App\Http\Controllers\Tournament\CreateCompleteTournamentController;
use App\Http\Controllers\Tournament\GetCompleteTournamentController;
use App\Http\Controllers\Tournament\GetTournamentsController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegisterUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', RegisterUserController::class);
Route::post('/login', LoginUserController::class);

Route::prefix('tournaments')->group(function () {

    Route::prefix('{tournament}')->group(function () {
        Route::get('/', GetCompleteTournamentController::class);
    });

    Route::get('/', GetTournamentsController::class);
    Route::post('/', CreateCompleteTournamentController::class);
});
