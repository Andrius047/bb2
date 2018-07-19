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
//
//Route::get('categories', function() {
//    // If the Content-Type and Accept headers are set to 'application/json',
//    // this will return a JSON structure. This will be cleaned up later.
//    return category::all();
//});
//
//Route::get('categories/{id}', function($id) {
//    return category::find($id);
//});
//
//Route::post('categories', function(Request $request) {
//    return category::create($request->all);
//});
//
//Route::put('categories/{id}', function(Request $request, $id) {
//    $category = category::findOrFail($id);
//    $category->update($request->all());
//
//    return $category;
//});
//
//Route::delete('categories/{id}', function($id) {
//    category::find($id)->delete();
//
//    return 204;
//});

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
Route::get('itemedit/{id}', 'ItemController@edit')->name('item.edit');
Route::post('itemedit', 'ItemController@saveedit')->name('item.saveedit');
Route::post('itemsdelete', 'ItemController@delete')->name('item.delete');
//Route::get('items', 'ItemController@create')->name('item.create');
//Route::get('item', 'ItemController@index')->name('item.index');
//Route::get('item/{id}', 'ItemController@edit')->name('item.edit');
//Route::post('items', 'ItemController@store')->name('item.store');
//Route::put('item/{id}', 'ItemController@update')->name('item.update');
//Route::delete('item/{id}', 'ItemController@delete')->name('item.delete');

Route::get('servicetype', 'ServiceTypeController@create')->name('type.create');
Route::post('servicetype', 'ServiceTypeController@store')->name('type.store');
Route::get('type', 'ServiceTypeController@index')->name('type.index');
Route::post('type', 'ServiceTypeController@delete')->name('type.delete');
Route::post('typeundo', 'ServiceTypeController@undo')->name('type.undo');

Route::get('services', 'ServiceController@create')->name('service.create');
Route::post('services', 'ServiceController@store')->name('service.store');
Route::get('service', 'ServiceController@index')->name('service.index');
Route::post('service', 'ServiceController@delete')->name('service.delete');
Route::get('serviceedit/{id}', 'ServiceController@edit')->name('service.edit');
Route::post('serviceedit', 'ServiceController@saveedit')->name('service.saveedit');
Route::get('serviceeditstate/{id}', 'ServiceController@editstate')->name('service.editstate');
Route::post('serviceeditstate', 'ServiceController@savestate')->name('service.savestate');

Route::get('userservice', 'UserServiceController@index')->name('userservice.userindex');
Route::get('userserviceeditstate/{id}', 'UserServiceController@editstate')->name('userservice.usereditstate');
Route::post('userserviceeditstate', 'UserServiceController@savestate')->name('userservice.usersavestate');

//Route::resource('services', 'API\ServiceAPIController');

Route::get('/', function () {
    return view('welcome');
});
