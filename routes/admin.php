<?php

use Illuminate\Support\Facades\Route;

// Auth::routes(['register'=>false]);
Route::get('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');

Route::get('/scan/worker/{code}',[App\Http\Controllers\Admin\WorkerController::class,'get'])->name('scan.worker');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){

    //Territory
    ROute::get('/get/departement',[App\Http\Controllers\TerritoryController::class,'getDepartement'])->name('get.departement');
    ROute::get('/get/arrondissement/{departement}',[App\Http\Controllers\TerritoryController::class,'getArrondissementByDepartement'])->name('get.arrondissement');
    ROute::get('/get/commune/{arrondissement}',[App\Http\Controllers\TerritoryController::class,'getCommuneByArrondissement'])->name('get.communes');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    Route::resource('plans', App\Http\Controllers\Admin\PlanController::class);
    Route::post('/plans/customer',[App\Http\Controllers\Admin\PlanController::class,'addCustomerPlan'])->name('add.customer.plan');

    Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class);
    Route::get('/customers/manage/{id}',[App\Http\Controllers\Admin\CustomerController::class,'manage'])->name('customers.manage');
    Route::post('/customers/add/adress',[App\Http\Controllers\Admin\CustomerController::class,'addAdress'])->name('customers.add.adress');

    Route::resource('workers', App\Http\Controllers\Admin\WorkerController::class);
    Route::get('/workers/manage/{id}', [App\Http\Controllers\Admin\WorkerController::class,'show'])->name('workers.manage');
    Route::get('/workers/reactivation/{id}', [App\Http\Controllers\Admin\WorkerController::class,'reactivation'])->name('workers.reactivation');
    Route::get('/workers/delete/{id}', [App\Http\Controllers\Admin\WorkerController::class,'delete'])->name('workers.delete');

    Route::resource('exams', App\Http\Controllers\Admin\ExamController::class);
    Route::resource('forms', App\Http\Controllers\Admin\HistoryController::class);

    Route::get('/icons',function() { return view('icons'); })->name('icons');
    Route::get('/tables',function() { return view('tables'); })->name('tables');
});

Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
