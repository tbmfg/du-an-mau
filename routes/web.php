<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/categories/{id}', [HomeController::class, 'categories']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/products/{id}', [HomeController::class, 'detailProduct']);

Route::get('signin', [AuthController::class, 'index'])->name('signin');
Route::post('signin', [AuthController::class, 'signin'])->name('signin.submit');

Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('signup', [AuthController::class, 'signupSubmit'])->name('signup.submit');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
    ]);
});
