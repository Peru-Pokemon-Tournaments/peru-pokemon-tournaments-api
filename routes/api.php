<?php

use App\Http\Controllers\Tournament\CreateCompleteTournamentController;
use App\Http\Controllers\Tournament\GetCompleteTournamentController;
use App\Http\Controllers\Tournament\GetTournamentCompetitorsController;
use App\Http\Controllers\Tournament\GetTournamentsController;
use App\Http\Controllers\TournamentInscription\CreateCompleteTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\DeleteCompetitorTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\DeleteTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\GetCompetitorTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\GetTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\IsCompetitorEnrolledToTournamentController;
use App\Http\Controllers\TournamentInscription\UpdateTournamentInscriptionController;
use App\Http\Controllers\TournamentInscription\UpdateTournamentInscriptionStatusController;
use App\Http\Controllers\User\AdminLoginUserController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\Password\CreatePasswordResetController;
use App\Http\Controllers\User\Password\ResetPasswordController;
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
Route::post('/admin/login', AdminLoginUserController::class);

Route::prefix('/users')->group(function () {

    Route::prefix('/password')->group(function () {

        Route::put('/', ResetPasswordController::class);
        Route::post('/reset', CreatePasswordResetController::class);

    });

});

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

Route::group(['middleware' => ['jwt.verify']], function() {

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
        });

    });

    Route::prefix('inscriptions')->group(function () {
        Route::prefix('{tournamentInscription}')->group(function() {
            Route::get('/', GetTournamentInscriptionController::class);
            Route::delete('/', DeleteTournamentInscriptionController::class);
            Route::patch('/', UpdateTournamentInscriptionController::class);

            Route::put('/status', UpdateTournamentInscriptionStatusController::class);

        });
    });

});
