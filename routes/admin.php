<?php

use Illuminate\Support\Facades\Route;

// Auth::routes(['register'=>false]);
Route::get('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    Route::resource('plans', App\Http\Controllers\Admin\PlanController::class);
    Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class);
    Route::get('/customers/manage/{id}',[App\Http\Controllers\Admin\CustomerController::class,'manage'])->name('customers.manage');

    Route::get('/icons',function() { return view('icons'); })->name('icons');
    Route::get('/tables',function() { return view('tables'); })->name('tables');
});

Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
