<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
   
    Route::post('/subcategory/store', [CategoryController::class, 'storeSubcategory'])->name('subcategory.store');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}/', [CategoryController::class, 'edit']);
    Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
     Route::get('category/destroy/{id}/', [CategoryController::class, 'destroy']);

     //Product Route
     Route::get('/product', [ProductController::class, 'create'])->name('product');
     Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    

});
