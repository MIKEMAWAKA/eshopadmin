<?php

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

// Route::get('/', function () {
//     return view('welcome');IndexController
// });

Route::get('/',  [App\Http\Controllers\IndexController::class,'index'])->name('hom');
Route::get('productList', [App\Http\Controllers\IndexController::class,'productList'])->name('productList');
Route::get('/checkout/{id}', [App\Http\Controllers\IndexController::class,'productcheckout'])->name('checkout');



Route::post('/ordered', [App\Http\Controllers\IndexController::class,'insert'])->name('ordered');

Route::post('productList/seach', [App\Http\Controllers\IndexController::class,'showProducts'])->name('product.search');

Route::get('/productList/{name}/{subcategory_id}', [App\Http\Controllers\IndexController::class,'productListcate'])->name('productListcate.show');

Route::get('/show/{id}/{subcategory_id}', [App\Http\Controllers\IndexController::class, 'indexshow'])->name('produs.show');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Auth::routes();

Route::resource('Admin',App\Http\Controllers\AdminController::class);


Route::group(['middleware' => 'auth'], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('tags', App\Http\Controllers\TagController::class);


Route::resource('banners', App\Http\Controllers\BannerController::class);

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('subCategories', App\Http\Controllers\SubCategoryController::class);

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('productImages', App\Http\Controllers\ProductImageController::class);

});


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('orders', App\Http\Controllers\OrderController::class);
