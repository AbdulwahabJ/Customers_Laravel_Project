<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'dashboard','as'=>'dashboard.','middleware'=>['auth','checkLogin']],function(){

    Route::get('/', function () {
        return view('dashboard.layouts.home');
    })->name('dashboard');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::get('/customers/{id}/delete', [CustomerController::class, 'delete'])->name('customers.delete');


    // Route::get('/customers/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('/update', function () {
        return view('customer.update');
    })->name('update');

});


Route::get('/', function () {
    return view('auth\login');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
