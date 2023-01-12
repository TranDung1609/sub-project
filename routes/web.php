<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helo', function () {
    return view('helo');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkUser'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified', 'checkUser'])->prefix('user')->group(function () {
    Route::get('add-user', [UserController::class, 'add_user'])->name('user.add');
    Route::get('list-user', [UserController::class, 'list_user'])->name('user.list');
    Route::post('save-user', [UserController::class, 'insert'])->name('user.save');
    Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('delete-user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::post('update-user/{id}', [UserController::class, 'update'])->name('user.update');
});
Route::middleware(['auth', 'verified', 'checkUser'])->prefix('category')->group(function () {
    Route::get('add-category', [CategoryController::class, 'add_category'])->name('category.add');
    Route::get('list-category', [CategoryController::class, 'list_category'])->name('category.list');
    Route::post('save-category', [CategoryController::class, 'insert'])->name('category.save');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
});
Route::middleware(['auth', 'verified', 'checkUser'])->prefix('product')->group(function () {
    Route::get('add-product', [ProductController::class, 'add_product'])->name('product.add');
    Route::get('list-product', [ProductController::class, 'list_product'])->name('product.list');
    Route::post('save-product', [ProductController::class, 'insert'])->name('product.save');
    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('update-product/{id}', [ProductController::class, 'update'])->name('product.update');
});
require __DIR__.'/auth.php';
