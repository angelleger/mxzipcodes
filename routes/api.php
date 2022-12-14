<?php

use App\Http\Controllers\API\ZipcodeController;
use Illuminate\Http\Request;
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

Route::get('/zip-codes/{zipcode}', [ZipcodeController::class, 'index']);

Route::get('/cache', [ZipcodeController::class, 'cache']);

Route::get('/uncache', [ZipcodeController::class, 'uncache']);

Route::get('/test', [ZipcodeController::class, 'testapi']);



