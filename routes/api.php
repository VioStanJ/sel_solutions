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

// Route::post('/login', [AuthController::class,'login']);

Route::post('/login',[AuthController::class,'loginPhone']);
Route::post('/verify/otp',[AuthController::class,'verifyLogin']);

Route::group(['middleware'=>'auth:api'],function () {

    Route::get('/profile',[App\Http\Controllers\AuthController::class,'profile']);

    Route::get('/customer/search/{q}',[App\Http\Controllers\Api\CustomerController::class,'search']);

    Route::post('/worker/review',[App\Http\Controllers\Api\WorkerController::class,'addReview']);

    Route::get('/exam/get',[App\Http\Controllers\Api\ExamController::class,'get']);
    Route::post('/exam/submit',[App\Http\Controllers\Api\ExamController::class,'save']);
    Route::get('/exam/customer/consultation',[App\Http\Controllers\Api\ExamController::class,'getConsults']);
});
