<?php

use App\Category;
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'HomeController@products')->name('products');
Route::get('/products/product_variant/{id}', 'HomeController@productVariant')->name('product_variants');
Route::get('/products/product_variant/add_variant/{id}', 'HomeController@addProductVariant')->name('product_variants');
Route::get('/categories', 'HomeController@category')->name('categories');
Route::get('/variants', 'HomeController@variants')->name('variants');


Route::get('/add_category', function () {
    return view('new_category');
});




Route::get('/add_product', 'HomeController@add_product')->name('add_product');


///////////////////////modify actions////////////////

Route::get('/modifyCategory/{id}', 'HomeController@modifyCategory')->name('modifyCategory');
Route::get('/products/modifyProduct/{id}', 'HomeController@modifyProduct')->name('modifyProduct');
Route::get('/products/product_variant/modifyVariant/{id}', 'HomeController@modifyVariant')->name('modifyVariant');

// Route::get('/add_products', 'CategoryController@create')->name('add_products');
