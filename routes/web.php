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


Route::get('/','FrontEndController@index')->name('home-index');
Route::get('/products/{slug}','FrontEndController@shop')->name('products');
Route::get('/product/{slug}','FrontEndController@detail')->name('product-detail');

//Route::group(['prefix'=>'/'],function(){
//    Route::any('/single-post','SinglePageController@index')->name('single-post');
//});//

Route::get('/admin/index', 'adminController@index')->name('admin');
Route::get('/search', 'searchController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/products', 'ProductController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/users', 'UsersController');
    Route::resource('/roles', 'RoleControler');
    Route::any('/blog','blogsController@offers')->name('offers');
    Route::resource('/blogs','blogsController');
    Route::any('/news','newsController@index')->name('index');
    Route::any('/add-news','newsController@add_news')->name('add-news');
    Route::any('/newsall','newsController@news_crud')->name('news-crud');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
