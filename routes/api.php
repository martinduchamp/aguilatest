<?php

use App\Http\Controllers\Api\AgreementController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\FeeController;
use App\Http\Controllers\Api\FenceController;
use App\Http\Controllers\Api\OperatorController;
use App\Http\Controllers\Api\OriginDestinationController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\TrailerController;
use App\Http\Controllers\Api\ValidityConceptController;
use App\Http\Controllers\Api\VehicleController;
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
Route::apiResource('customers', CustomerController::class);
Route::apiResource('customer_emails', EmailController::class);
Route::apiResource('fences', FenceController::class);
Route::apiResource('operators', OperatorController::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('fees', FeeController::class);
Route::apiResource('agreements', AgreementController::class);
