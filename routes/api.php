<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ResidentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('residents', [ResidentController::class,'residents']);
Route::get('families', [ResidentController::class,'families']);
Route::get('births', [ResidentController::class,'births']);
Route::get('deaths', [ResidentController::class,'deaths']);
Route::get('moves', [ResidentController::class,'moves']);
Route::get('comes', [ResidentController::class,'comes']);