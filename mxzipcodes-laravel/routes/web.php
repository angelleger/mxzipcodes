<?php

use App\Http\Controllers\ZipcodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::controller(ZipcodeController::class)->group(function () {
    Route::get('zipcodes', 'index');
    Route::post('zipcodes-import', 'import')->name('zipcodes.import');
});
