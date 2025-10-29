<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Customer Routes
Route::get('/', [CustomerController::class,'index'])->name('customer.index');

Route::get('/showView/{id}', [CustomerController::class,'showView'])->name('customer.showView');

Route::get('/storeView', [CustomerController::class,'storeView'])->name('customer.storeView');
Route::post('/store', [CustomerController::class,'store'])->name('customer.store');

Route::get('/updateView/{id}', [CustomerController::class,'updateView'])->name('customer.updateView');
Route::put('/update/{id}', [CustomerController::class,'update'])->name('customer.update');

Route::delete('/delete/{id}', [CustomerController::class,'delete'])->name('customer.delete');