<?php

use App\Http\Controllers\Api\ListApiController;
use App\Http\Controllers\AuthController;
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

Route::middleware('api')->group(function(){
    Route::post('login',[AuthController::class, 'login']);
    Route::post('register',[AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get-user', [AuthController::class, 'getUserInfo']);
    Route::put('edit-user',[AuthController::class, 'updateProfile']);

    // Route::get('/get-user', [ListApiController::class, 'getUser']); 
});

Route::get('/get-category', [ListApiController::class, 'getCategory']);
Route::get('/get-product', [ListApiController::class, 'listProduct']);
Route::get('/search/{name}', [ListApiController::class, 'search']);
Route::get('/category-product/{id}', [ListApiController::class, 'ProductCategory']);
Route::get('/product/{id}', [ListApiController::class, 'getProduct']);
