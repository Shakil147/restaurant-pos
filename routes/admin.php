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
		Route::post('/store-billing', 'PosController@storeBilling')->name('store-billing');
		Route::post('/clear', 'PosController@clear')->name('clear');
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

	
	Route::prefix('/types')->name('types.')->group(function(){
		Route::get('/', 'TypeController@index')->name('index');
		Route::get('/get', 'TypeController@get')->name('get');
		Route::get('/getitem/{id}', 'TypeController@getitem')->name('getitem');
		Route::get('/create', 'TypeController@create')->name('create');
		Route::post('/store', 'TypeController@store')->name('store');
		Route::get('show/{id}', 'TypeController@show')->name('show');
		Route::get('/edit/{id}', 'TypeController@edit')->name('edit');
		Route::post('update/{id}', 'TypeController@update')->name('update');
		Route::post('destroy/{id}', 'TypeController@destroy')->name('destroy');
	});
	
	Route::prefix('/units')->name('units.')->group(function(){
		Route::get('/', 'UnitsController@index')->name('index');
		Route::get('/get', 'UnitsController@get')->name('get');
		Route::get('/getitem/{id}', 'UnitsController@getitem')->name('getitem');
		Route::get('/create', 'UnitsController@create')->name('create');
		Route::post('/store', 'UnitsController@store')->name('store');
		Route::get('show/{id}', 'UnitsController@show')->name('show');
		Route::get('/edit/{id}', 'UnitsController@edit')->name('edit');
		Route::post('update/{id}', 'UnitsController@update')->name('update');
		Route::post('destroy/{id}', 'UnitsController@destroy')->name('destroy');
	});
	
	Route::prefix('/items')->name('items.')->group(function(){
		Route::get('/', 'ItemController@index')->name('index');
		Route::get('/get', 'ItemController@get')->name('get');
		Route::get('/getitem/{id}', 'ItemController@getitem')->name('getitem');
		Route::get('/create', 'ItemController@create')->name('create');
		Route::post('/store', 'ItemController@store')->name('store');
		Route::get('show/{id}', 'ItemController@show')->name('show');
		Route::get('/edit/{id}', 'ItemController@edit')->name('edit');
		Route::post('update/{id}', 'ItemController@update')->name('update');
		Route::post('destroy/{id}', 'ItemController@destroy')->name('destroy');
	});
	
	Route::prefix('/suppliers')->name('suppliers.')->group(function(){
		Route::get('/', 'SupplierController@index')->name('index');
		Route::get('/get', 'SupplierController@get')->name('get');
		Route::get('/getitem/{id}', 'SupplierController@getitem')->name('getitem');
		Route::get('/create', 'SupplierController@create')->name('create');
		Route::post('/store', 'SupplierController@store')->name('store');
		Route::get('show/{id}', 'SupplierController@show')->name('show');
		Route::get('/edit/{id}', 'SupplierController@edit')->name('edit');
		Route::post('update/{id}', 'SupplierController@update')->name('update');
		Route::post('destroy/{id}', 'SupplierController@destroy')->name('destroy');
	});
	
	Route::prefix('/stocks')->name('stocks.')->group(function(){
		Route::get('/', 'PurchaseController@index')->name('index');
		Route::get('/get', 'PurchaseController@get')->name('get');
		Route::get('/getitem/{id}', 'PurchaseController@getitem')->name('getitem');
		Route::get('/create', 'PurchaseController@create')->name('create');
		Route::post('/store', 'PurchaseController@store')->name('store');
		Route::get('show/{id}', 'PurchaseController@show')->name('show');
		Route::get('/edit/{id}', 'PurchaseController@edit')->name('edit');
		Route::post('update/{id}', 'PurchaseController@update')->name('update');
		Route::post('destroy/{id}', 'PurchaseController@destroy')->name('destroy');
	});
	
	Route::prefix('/stafftypes')->name('staff-types.')->group(function(){
		Route::get('/', 'StaffTypeController@index')->name('index');
		Route::get('/get', 'StaffTypeController@get')->name('get');
		Route::get('/getitem/{id}', 'StaffTypeController@getitem')->name('getitem');
		Route::get('/create', 'StaffTypeController@create')->name('create');
		Route::post('/store', 'StaffTypeController@store')->name('store');
		Route::get('show/{id}', 'StaffTypeController@show')->name('show');
		Route::get('/edit/{id}', 'StaffTypeController@edit')->name('edit');
		Route::post('update/{id}', 'StaffTypeController@update')->name('update');
		Route::post('destroy/{id}', 'StaffTypeController@destroy')->name('destroy');
	});
	Route::prefix('/staff')->name('staff.')->group(function(){
		Route::get('/', 'StaffController@index')->name('index');
		Route::get('/get', 'StaffController@get')->name('get');
		Route::get('/getitem/{id}', 'StaffController@getitem')->name('getitem');
		Route::get('/create', 'StaffController@create')->name('create');
		Route::post('/store', 'StaffController@store')->name('store');
		Route::get('show/{id}', 'StaffController@show')->name('show');
		Route::get('/edit/{id}', 'StaffController@edit')->name('edit');
		Route::post('update/{id}', 'StaffController@update')->name('update');
		Route::post('destroy/{id}', 'StaffController@destroy')->name('destroy');
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

	Route::prefix('/admins')->name('admins.')->group(function(){
		Route::get('/', 'AdminController@index')->name('index')->middleware('permission:admins-index');
		Route::get('/get-admins', 'AdminController@getAdmins')->name('get-admins')->middleware('permission:admins-create');
		Route::get('/create', 'AdminController@create')->name('create')->middleware('permission:admins-index');
		Route::post('/store', 'AdminController@store')->name('store')->middleware('permission:admins-create');
		Route::get('show/{id}', 'AdminController@show')->name('show')->middleware('permission:admins-show');
		Route::get('get-role/{id}', 'AdminController@getRole')->name('get-role')->middleware('permission:admins-show');
		Route::get('/edit/{id}', 'AdminController@edit')->name('edit')->middleware('permission:admins-update');
		Route::post('update/{id}', 'AdminController@update')->name('update')->middleware('permission:admins-update');
		Route::post('destroy/{id}', 'AdminController@destroy')->name('destroy')->middleware('permission:admins-destroy');
	});

	Route::prefix('/roles')->name('roles.')->group(function(){
		Route::get('/', 'RoleController@index')->name('index')->middleware('permission:roles-index');
		Route::get('/get-roles', 'RoleController@getRoles')->name('get-roles')->middleware('permission:roles-index');
		Route::get('/create', 'RoleController@create')->name('create')->middleware('permission:roles-create');
		Route::post('/store', 'RoleController@store')->name('store')->middleware('permission:roles-create');
		Route::get('show/{id}', 'RoleController@show')->name('show')->middleware('permission:roles-show');
		Route::get('/edit/{id}', 'RoleController@edit')->name('edit')->middleware('permission:roles-update');
		Route::post('update/{id}', 'RoleController@update')->name('update')->middleware('permission:roles-update');
		Route::post('destroy/{id}', 'RoleController@destroy')->name('destroy')->middleware('permission:roles-destroy');
	});

});