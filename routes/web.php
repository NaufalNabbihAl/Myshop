<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('login');
    
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Customer
        Route::resource('customer', CustomerController::class);
        Route::delete('customer/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');

        // Category
        Route::resource('category', CategoryController::class);
        Route::get('/admin/category/search', [CategoryController::class, 'search'])->name('category.search');


        // Product
        Route::resource('product', ProductController::class);
        Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.delete');     
});
