<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Web')->group(function(){



});
Route::get('/', 'HomeController@index')->name('index');

Auth::routes(['register' => false,'verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/call',function(){
    //Artisan::call('migrate');
     // echo '<br>migrated';
    try {
      
      //Artisan::call('migrate');
      //echo '<br>migrated';
    } catch (Exception $e) {
      Response::make($e->getMessage(), 500);
    }
});