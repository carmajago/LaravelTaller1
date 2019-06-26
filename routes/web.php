<?php

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

Route::get('/products','ProductController@index')->name('products.index');
Route::get('/products/create','ProductController@create')->name('products.create');
Route::post('/products','ProductController@store')->name('products.store');
Route::get('/products/{id}','ProductController@show')->name('products.show');
Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
Route::patch('/products/update/{id}','ProductController@update')->name('products.update');
Route::delete('/products/{id}','ProductController@destroy')->name('products.destroy');

Route::get('login', 'Auth\LoginController@showLoginForm')
       ->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/messages','MessageController@index')->name('messages.index');
Route::get('/messages/create','MessageController@create')->name('messages.create');
Route::get('/catalog','CatalogController@index')->name('catalog.index');