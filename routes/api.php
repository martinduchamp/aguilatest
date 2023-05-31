<?php

use App\Http\Controllers\Api\OriginDestinationController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\TrailerController;
use App\Http\Controllers\Api\ValidityConceptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('trailers', TrailerController::class);
Route::apiResource('owners', OwnerController::class);
Route::apiResource('routes', RouteController::class);
Route::apiResource('validity_concepts', ValidityConceptController::class);
Route::apiResource('origin_destinations', OriginDestinationController::class);
