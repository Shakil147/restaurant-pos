<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashbord', 'HomeController@index')->name('dashbord');
Route::get('/', 'HomeController@index');
	
	Route::prefix('/categories')->name('categories.')->group(function(){
		Route::get('/', 'CategoryController@index')->name('index');
		Route::get('/get', 'CategoryController@get')->name('get');
		Route::get('/create', 'CategoryController@create')->name('create');
		Route::post('/store', 'CategoryController@store')->name('store');
		Route::get('show/{id}', 'CategoryController@show')->name('show');
		Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
		Route::post('update/{id}', 'CategoryController@update')->name('update');
		Route::post('destroy/{id}', 'CategoryController@destroy')->name('destroy');
	});
	Route::prefix('/subcategories')->name('subcategories.')->group(function(){
		Route::get('/', 'SubCategoryController@index')->name('index');
		Route::get('/create', 'SubCategoryController@create')->name('create');
		Route::post('/store', 'SubCategoryController@store')->name('store');
		Route::get('show/{id}', 'SubCategoryController@show')->name('show');
		Route::get('/{id}/edit', 'SubCategoryController@edit')->name('edit');
		Route::post('update/{id}', 'SubCategoryController@update')->name('update');
		Route::post('destroy/{id}', 'SubCategoryController@destroy')->name('destroy');
	});
	Route::prefix('/products')->name('products.')->group(function(){
		Route::get('/', 'ProductController@index')->name('index');
		Route::get('/get', 'ProductController@get')->name('get');
		Route::get('/getitem/{id}', 'ProductController@getitem')->name('getitem');
		Route::get('/create', 'ProductController@create')->name('create');
		Route::post('/store', 'ProductController@store')->name('store');
		Route::get('show/{id}', 'ProductController@show')->name('show');
		Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
		Route::post('update/{id}', 'ProductController@update')->name('update');
		Route::post('destroy/{id}', 'ProductController@destroy')->name('destroy');
	});
	Route::prefix('/pos')->name('pos.')->group(function(){
		Route::get('/', 'PosController@index')->name('index');
		Route::get('/list', 'PosController@index')->name('list');
		Route::get('/get', 'PosController@get')->name('get');
		Route::get('/search-product', 'PosController@searchProduct')->name('search-product');
		Route::get('/create', 'PosController@create')->name('create');
		Route::post('/store', 'PosController@store')->name('store');
		Route::get('show/{id}', 'PosController@show')->name('show');
		Route::get('/{id}/edit', 'PosController@edit')->name('edit');
		Route::post('update/{id}', 'PosController@update')->name('update');
		Route::post('destroy/{id}', 'PosController@destroy')->name('destroy');
		Route::get('/print/{id?}', 'PosController@print')->name('print');
		Route::get('/grandtotal', 'PosController@grand_total')->name('grandtotal');
		Route::get('/discount', 'PosController@discount')->name('discount');
		Route::get('/total', 'PosController@total')->name('total');
	});

	Route::prefix('/cart')->name('cart.')->group(function(){
		Route::post('/store', 'CartController@store')->name('store');
		Route::get('/get', 'CartController@get')->name('get');
		Route::get('/getitem/{id}', 'CartController@getitem')->name('getitem');
		Route::post('update', 'CartController@update')->name('update');
		Route::post('destroy', 'CartController@destroy')->name('destroy');
	});
	Route::prefix('/orders')->name('orders.')->group(function(){
		Route::get('/', 'OrderController@index')->name('index');
		Route::get('/get', 'OrderController@get')->name('get');
		Route::get('/show/{id}', 'OrderController@show')->name('show');
		Route::get('/getitem/{id}', 'OrderController@getitem')->name('getitem');
	});
	
	Route::prefix('/web-infos')->name('web.')->group(function(){
		Route::get('/', 'WebInfoController@index')->name('index');
		Route::post('update', 'WebInfoController@update')->name('update');
	});
	Route::prefix('/profile')->name('profile.')->group(function(){
		Route::get('/', 'AccountController@index')->name('index');
		Route::get('/edit', 'AccountController@edit')->name('edit');
		Route::post('update', 'AccountController@update')->name('update');
		Route::post('change-password', 'AccountController@change_password')->name('change-password');
	});
});