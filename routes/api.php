<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\LotteryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->get('/api/test-auth-api', function () {
//     // Your protected route logic
// });


//Testing Auth API
Route::middleware('auth:sanctum')->get('/test-auth-api', function () {
    // Your protected route logic
    return 'API Access Successful';

});


////////////Not secure way////////////

// Category routes 
Route::resource('categories', CategoryController::class);

// Subcategory routes
Route::resource('subcategories', SubcategoryController::class);

////////////Not secure way////////////



////////////API AUTH////////////

// Category routes 
Route::middleware('auth:sanctum')->resource('auth-categories', CategoryController::class);

// Subcategory routes
Route::middleware('auth:sanctum')->resource('auth-subcategories', SubcategoryController::class);

////////////API AUTH////////////



Route::get('/generate-lottery-numbers', 'App\Http\Controllers\LotteryController@generate');
