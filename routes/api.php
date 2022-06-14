<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/products',[App\Http\Controllers\ProductsController::class,'index']);
Route::post('/add_products',[App\Http\Controllers\ProductsController::class,'add']);
Route::get('edit_products/{id}',[App\Http\Controllers\ProductsController::class,'edit']);
Route::put('update_products/{id}',[App\Http\Controllers\ProductsController::class,'update']);
Route::delete('deleteproducts/{id}',[App\Http\Controllers\ProductsController::class,'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
