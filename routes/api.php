<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalesController;

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


Route::post('products/create', [ProductController::class, 'store']);

// Route::get('products/{id}', [ProductController::class, 'show']);






Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);   
    Route::get('products', [ProductController::class, 'index']);
    
    Route::get('items/search/', [ProductController::class, 'search']);
    Route::get('items/show/', [ProductController::class, 'show']);

    Route::get('sales', [SalesController::class, 'index']);
    Route::post('sales', [SalesController::class, 'store']);
    Route::get('sales/show/', [SalesController::class, 'show']);

});

Route::middleware('auth:sanctum')->get('/user', function () {
    // return $request->user();
});
