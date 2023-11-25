<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LookupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/',function (){
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/lookup/{model}', [LookupController::class,'getLookupData']); // model must be like gender-type or country
Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::resource('countries',ProductController::class);
Route::resource('companies',ProductController::class);
