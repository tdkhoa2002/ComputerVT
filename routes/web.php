<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Bill\BillController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\CategorieshomepageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'user', 'middleware' => ['auth', 'role:user,admin']], function() {
    Route::get('/products/{product}', [ProductController::class,'show'])->name('product.show');
    Route::get('/categories/{category}', [CategoryController::class,'show'])->name('category.show');
    Route::get('/categories_homepage/{categories_homepage}', [CategorieshomepageController::class,'show'])->name('categories_homepage.show');
    Route::resource('/user', UserController::class)->names('user');
    Route::post('/image-url', [ProductController::class, 'uploadImage']);
    
    Route::resource('/cart', CartController::class)->names('cart');

    Route::resource('/order', OrderController::class)->names('order');
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'role: admin']], function() {
    Route::resource('/products', ProductController::class)->except('show')->names('product');
    Route::resource('/categories', CategoryController::class)->except('show')->names('category');
    Route::resource('/categories_homepage', CategorieshomepageController::class)->except('show')->names('categories_homepage');

    Route::get('/products/{product}/move-set-category', [ProductController::class, 'moveSetCategory'])->name('product.moveSetCategory');

    Route::post('/products/{product}/set-category', [ProductController::class, 'setCategory'])->name('product.setCategory');

    Route::delete('/products/{product}/{category}/del-category', [ProductController::class, 'deleteCategory'])->name('product.deleteCategory');

    Route::get('/products/{product}/set-hot', [ProductController::class, 'setHot'])->name('product.hot');

    Route::get('/categories_homepage/{categories_homepage}', [CategorieshomepageController::class, 'listProductsInCategory'])->name('categories_homepage.listproducts');

    Route::get('/user/{user}/block', [UserController::class, 'block'])->name('user.block');

    Route::get('/order/{order}', [OrderController::class, 'showOrder'])->name('order.showOrder');
});

Route::get('/list-products', [CategoryController::class, 'getProducts']);
Route::get('/categories-homepage', [CategorieshomepageController::class, 'getCategories'])->name('getCategories');
Route::get('logout', [LoginController::class,'logout']);
