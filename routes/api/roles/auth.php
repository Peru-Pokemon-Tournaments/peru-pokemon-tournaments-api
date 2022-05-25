<?php

use App\Http\Controllers\Role\GetRolesController;
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
    Route::get('/', GetRolesController::class);
});
