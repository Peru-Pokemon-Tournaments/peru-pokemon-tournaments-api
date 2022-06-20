<?php

use App\Http\Controllers\People\CreatePersonController;
use App\Http\Controllers\People\FetchPeopleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth People Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for person resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/people')->group(function () {
    Route::get('/', FetchPeopleController::class);
    Route::post('/', CreatePersonController::class);
});
