<?php

use Illuminate\Support\Facades\Route;

// Auth::routes(['register'=>false]);
Route::get('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

});

Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
