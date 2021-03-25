<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/////////////////////category actions///////////////////////////////////
Route::get('getAllCat', 'CategoryController@index');
Route::post('addNewCategory', 'CategoryController@store');
Route::post('updateCategory', 'CategoryController@update');
Route::get('deleteCategory/{id}', 'CategoryController@destroy');


////////////////product actions.////////////////////////
Route::post('addNewProduct', 'ProductController@store');
Route::post('updateProduct', 'ProductController@update');
Route::get('deleteProduct/{id}', 'ProductController@destroy');


////////////////variant actions.////////////////////////
Route::post('addNewVariant', 'VariantController@store');
Route::post('updateVariant', 'VariantController@update');
Route::get('deleteVariant/{id}', 'VariantController@destroy');
