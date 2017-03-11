<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


 Route::get('/', function () {
    return view('auth/login');
});

Route::get('catalog', 'CatalogController@getIndex');
Route::get('catalog/show/{id}', 'CatalogController@getShow');
Route::get('catalog/returnMovie/{id}', 'CatalogController@returnMovie');
Route::get('catalog/rentedMovie/{id}', 'CatalogController@rentedMovie');
Route::put('catalog/editMovie', 'CatalogController@editMovie');
Route::get('catalog/erase/{id}', 'CatalogController@erase');
Route::get('catalog/create', 'CatalogController@getCreate');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
Route::post('catalog/addMovie', 'CatalogController@addMovie');
Auth::routes();
Route::get('/home', 'HomeController@index');
