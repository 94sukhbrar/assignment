<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', function () {
    return view('auth.register');
});


Route::post('/register', [AuthController::class, 'register'])->name('register.custom');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);



Route::get('/', [ProductController::class, 'home']);
Route::get('/products', [ProductController::class, 'index']);



//Admin Panel 

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/categories/{id}/update', [CategoryController::class, 'update']);
    Route::get('/categories/{id}/delete', [CategoryController::class, 'delete']);

    Route::get('/products/create', [AdminProductController::class, 'create']);
    Route::post('/products', [AdminProductController::class, 'store']);
    Route::get('/products/{id}', [AdminProductController::class, 'show']);
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit']);
    Route::post('/products/{id}/update', [AdminProductController::class, 'update']);
    Route::get('/products/{id}/delete', [AdminProductController::class, 'delete']);
});

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::post('/admin/products', [AdminProductController::class, 'store']);

Route::get('/cart/add/{id}', [CartController::class, 'add'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::get('/order/place', [OrderController::class, 'place'])->middleware('auth');
Route::get('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
