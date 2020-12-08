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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getProducts', '\App\Http\Controllers\ProductController@getProducts');
Route::get('/getProduct/{id}', '\App\Http\Controllers\ProductController@getProduct');
Route::delete('/deleteProduct/{id}', '\App\Http\Controllers\ProductController@deleteProduct');
Route::put('/updateProduct/{id}', '\App\Http\Controllers\ProductController@updateProduct');
Route::post('/createProduct', '\App\Http\Controllers\ProductController@createProduct');
