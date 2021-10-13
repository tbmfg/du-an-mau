<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/categories/{id}', [HomeController::class, 'productsCategory']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/products/{id}', [HomeController::class, 'detailProduct']);
Route::post('/products/{id}/comment', [HomeController::class, 'saveComment']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/feedback', [HomeController::class, 'feedback']);

Route::get('/signin', [AuthController::class, 'index'])->name('signin');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin.submit');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupSubmit'])->name('signup.submit');

Route::post('/signout', [AuthController::class, 'signOut']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::get('/change-password', [AuthController::class, 'changePassword'])->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'users' => UserController::class,
        'comments' => CommentController::class,
    ]);
    Route::post('/categories/{id}/update', [CategoryController::class, 'update']);
    Route::post('/products/{id}/update', [ProductController::class, 'update']);
    Route::post('/users/{id}/update', [UserController::class, 'update']);
    Route::get('/comments/{id}/list', [CommentController::class, 'list']);
});
