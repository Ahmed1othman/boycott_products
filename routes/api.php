<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\ProductController;
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

Route::apiResource('products',ProductController::class);
Route::get('search-product', [ProductController::class,'searchProduct']);
Route::apiResource('companies',CompanyController::class);
Route::apiResource('countries',CountryController::class);
Route::apiResource('categories',CategoryController::class);

