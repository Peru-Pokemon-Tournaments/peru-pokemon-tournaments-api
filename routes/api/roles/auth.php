<?php

use App\Http\Controllers\Role\CreateRoleController;
use App\Http\Controllers\Role\FetchRolesController;
use App\Http\Controllers\Role\GetRoleController;
use App\Http\Controllers\Role\UpdateRoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Roles Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for roles resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('roles')->group(function () {
    Route::get('/', FetchRolesController::class);
    Route::post('/', CreateRoleController::class);

    Route::prefix('{role}')->group(function () {
        Route::get('/', GetRoleController::class);
        Route::patch('/', UpdateRoleController::class);
    });
});
