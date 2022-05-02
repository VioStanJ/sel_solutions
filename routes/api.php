<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware'=>'auth:api'],function () {

    Route::apiResource('/plans',App\Http\Controllers\PlanController::class);

    Route::apiResource('/specialisations',App\Http\Controllers\SpecialisationController::class);

    Route::post('specialisations/add',[App\Http\Controllers\SpecialisationController::class,'add']);
    Route::post('specialisations/remove',[App\Http\Controllers\SpecialisationController::class,'remove']);
});
