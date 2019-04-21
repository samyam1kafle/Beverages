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
    return view('FrontEnd/index');
});

Route::get('/admin/index','adminController@index' );

Route::group(['prefix'=>'admin'],function (){
    Route::resource('/products','ProductController');
    Route::resource('/categories','CategoryController');
    Route::resource('/users','UsersController');
    Route::resource('/roles','RoleControler');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
