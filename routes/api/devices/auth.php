<?php

use App\Http\Controllers\Device\CreateDeviceController;
use App\Http\Controllers\Device\FetchDevicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Devices Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for device resources.
| It can be accessed only by authenticated users.
|
*/

Route::prefix('/devices')->group(function () {
    Route::get('/', FetchDevicesController::class);
    Route::post('/', CreateDeviceController::class);
});
