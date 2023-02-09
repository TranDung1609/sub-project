<?php

use App\Http\Controllers\Api\ListApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get-user', [AuthController::class, 'getUserInfo']);
    Route::patch('edit-profile-user', [AuthController::class, 'editProfile']);
    Route::post('/payment', [PaymentController::class, 'payment']);
    Route::get('/list-order', [PaymentController::class, 'history']);
    Route::get('/order/{id}', [PaymentController::class, 'order_details']);
});
Route::middleware('api')->group(function () {
    Route::get('/get-category', [ListApiController::class, 'getCategory']);
    Route::get('/get-product', [ListApiController::class, 'listProduct']);
    Route::get('/search', [ListApiController::class, 'search']);
    Route::get('/category-product/{id}', [ListApiController::class, 'ProductCategory']);
    Route::get('/product/{id}', [ListApiController::class, 'getProduct']);
    Route::get('/product-category/{id}', [ListApiController::class, 'CategoryProduct']);
    Route::get('/filter', [ListApiController::class, 'scopeFilter']);
    
});
