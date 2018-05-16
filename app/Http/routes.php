<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('category', 'CategoryController@create')->name('category.create');
Route::post('category', 'CategoryController@store')->name('category.store');
Route::get('cat', 'CategoryController@index')->name('category.index');
Route::post('cat', 'CategoryController@delete')->name('category.delete');
Route::post('catundo', 'CategoryController@undo')->name('category.undo');

Route::get('model', 'ModelController@create')->name('model.create');
Route::post('model', 'ModelController@store')->name('model.store');
Route::get('mod', 'ModelController@index')->name('model.index');
Route::post('mod', 'ModelController@delete')->name('model.delete');
Route::post('modundo', 'ModelController@undo')->name('model.undo');

Route::get('register', 'RegisterController@create')->name('user.create');
Route::post('register', 'RegisterController@store')->name('user.store');
Route::get('reg', 'RegisterController@index')->name('user.index');

Route::get('items', 'ItemController@create')->name('item.create');
Route::post('items', 'ItemController@store')->name('item.store');
Route::get('item', 'ItemController@index')->name('item.index');
Route::get('itemedit', 'ItemController@edit')->name('item.edit');
Route::post('itemedit', 'ItemController@saveedit')->name('item.saveedit');

Route::get('/', function () {
    return view('welcome');
});
