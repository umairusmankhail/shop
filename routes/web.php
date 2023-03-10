<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DataTableAjaxCRUDController;
use App\Http\Controllers\ProductImportController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    
    // category route


   Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/categoryedit', [CategoryController::class, 'edit'])->name('category.edit');
   
    Route::put('/categorsies/{id}', [CategoryController::class,'updatecategory']);
    Route::post('/categories/{id}', [CategoryController::class,'update'])->name('categories.update');

    Route::delete('/categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');


    // Subcategory Route
    Route::delete('subcategory/{id}', [CategoryController::class, 'deletesubcategory'])->name('subcategory-destroy');
    Route::get('/editsubcategory', [CategoryController::class, 'editsubcategory'])->name('editsubcategory');
   
    Route::get('category-edit/{id}',[CategoryController::class,'editcategory'])->name('edit-category');
    Route::get('subcategory-edit/{id}',[CategoryController::class,'subcategoryedit'])->name('subcategory-edit');
    
    Route::put('/subcategory-update{id}',[CategoryController::class,'subcategoryupdate'])->name('subcategory-update');
    
    Route::post('/subcategory/store', [CategoryController::class, 'storeSubcategory'])->name('subcategory.store');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    
 
     //Product Route
     


Route::get('product', [ProductController::class, 'create'])->name('product');
Route::get('get-subcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('get-subcategories');

Route::get('/product-index',[ProductController::class,'index'])->name('product-index');
Route::get('/datatables/data', [ProductController::class, 'getDataForDatatables'])->name('product.data');

     Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
     // Display edit form
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update product and images
Route::put('/products/{id}', [ProductController::class,'update'])->name('product.update');
Route::delete('/products/{id}', [ProductController::class,'destroy'])->name('products.destroy');

Route::get('/import', [ProductImportController::class, 'showImportForm'])->name('import.form');
Route::post('/import', [ProductImportController::class, 'import'])->name('import.products');

Route::post('/products/delete-selected', [ProductController::class, 'deleteSelected'])->name('products.deleteSelected');

     




});
