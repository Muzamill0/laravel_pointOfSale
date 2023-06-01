<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllProductController;




Route::get('/', function () {
    return view('auth.login');
})->name('index');

// dashboard routes

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// login Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login_view')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users',  'index')->name('users');
    Route::get('/user/create',  'create')->name('create.user');
    Route::post('/user/create',  'store');
    Route::get('/user/{user}/edit',  'edit')->name('edit.user');
    Route::post('/user/{user}/edit',  'update');
    Route::post('/user/{user}/delete',  'destroy')->name('delete.user');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index')->name('categories');
    Route::get('add/category', 'create')->name('category.create');
    Route::post('add/category', 'store');
    Route::get('edit/{category}/category', 'edit')->name('category.edit');
    Route::post('edit/{category}/category', 'update');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('category/{category}/products', 'index')->name('category.products');
    Route::get('add/{category}/product', 'create')->name('category.product.create');
    Route::post('add/{category}/product', 'store');
    Route::get('show/category/{supplier}/product', 'show')->name('category.product.show');
    Route::get('edit/{supplier}/products', 'edit')->name('category.product.edit');
    Route::post('edit/{supplier}/products', 'update');
});

Route::controller(AllProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('add/product', 'create')->name('product.create');
    Route::post('add/product', 'store');
    Route::get('show/{supplier}/product', 'show')->name('product.show');
    Route::get('edit/{supplier}/product', 'edit')->name('product.edit');
    Route::post('edit/{supplier}/product', 'update');
});

Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchases', 'index')->name('purchases');
    Route::get('show/{purchase}/purchase', 'show')->name('purchase.show');
    Route::get('delete/{purchase}/purchase', 'destroy')->name('purchase.delete');
});

Route::controller(SalesController::class)->group(function () {
    Route::get('customers/products', 'index')->name('customers.products');
    Route::get('add/customer/{supplier}/product', 'create')->name('customer.product.create');
    Route::post('add/customer/{supplier}/product', 'store');
    Route::get('show/customer/{sale}/product', 'show')->name('customer.product.show');
    Route::get('edit/customer/{supplier}/product', 'edit')->name('customer.product.edit');
    Route::post('edit/customer/{supplier}/product', 'update');
    Route::get('delete/{sale}/product', 'destroy')->name('customer.product.delete');
});


