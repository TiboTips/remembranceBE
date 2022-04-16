<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CemeteryController;
use App\Http\Controllers\DeceasedController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cemeteries', [CemeteryController::class, 'getAllCemeteries']);
Route::get('deceased', [DeceasedController::class, 'getAllDeceased']);
Route::get('deceased/filtered', [DeceasedController::class, 'getFilteredDeceased']);
Route::get('deceased/{deceased}', [DeceasedController::class, 'getSpecificDeceased']);
