<?php

use Illuminate\Support\Facades\Auth;


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


Auth::routes(['verify' => true]);

Route::get('/', 'FrontEndController@index')->name('home-index');


//Front End
Route::group(['prefix' => '/'], function () {

    Route::any('/login', 'UserLoginController@login')->name('login');


    Route::get('/log-out', 'UserLoginController@signout')->name('log-out');

    Route::get('/Register', 'FrontEndUserController@registerview')->name('Register');

    Route::post('Update/user', 'FrontEndUserController@update_user')->name('update_user');

    Route::post('Update/user/photo', 'FrontEndUserController@update_user_photo')->name('update_user_photo');

    Route::post('/Register', 'FrontEndUserController@storeregistered')->name('userRegister');


    Route::get('/products/{slug}', 'FrontEndController@shop')->name('products');

    Route::any('/product/{slug}', 'FrontEndController@detail')->name('product-detail');

    Route::any('/product/review/{slug}', 'FrontEndController@store')->name('product-review');

    Route::any('view_all_products', 'FrontEndController@viewall')->name('all-products');

    Route::any('all_offers_products', 'FrontEndController@viewalloffers')->name('all-offer-products');

    Route::any('all_featured_products', 'FrontEndController@viewallfeatured')->name('all-featured-products');

    Route::get('blogs', 'FrontEndController@viewblogs')->name('viewblogs');

    Route::any('blogs/blogdetail/{slug}', 'FrontEndController@viewsingleblog')->name('viewsingleblogs');


//Cart Detail Page (ie:add-to-cart)
    Route::match(['get', 'post'], '/add-to-cart', 'FrontEndController@addtocart')->name('add-to-cart');

//Cart-Page Route
    Route::match(['get', 'post'], '/cart', 'FrontEndController@cart')->name('cart');


    Route::get('/cart/delete/{slug}', 'FrontEndController@deletecart');

    //wishist

    Route::get('/wishlist', 'WishListController@index')->name('wishlist');

    Route::get('wishlist/delete/{id}', 'WishListController@delete')->name('wishlistDelete');

    Route::get('/wishlist/{slug}', 'WishListController@add_to_wishist')->name('add-to-wishlist');

    //mail routes

    Route::get('welcomemail', 'mailController@index')->name('subscribed_mail');

    Route::get('unsubscribe', 'mailController@unsubscribe')->name('unsubscribe_mail');


    //Search Routes |v|

    Route::post('search', 'LiveSearch@search')->name('Frontendsearch');


    //Account shipping and all routes

    Route::any('account', 'AddressController@useraccount')->name('account');

    Route::any('checkout', 'AddressController@checkout')->name('checkout');

    Route::post('shipping/create', 'AddressController@store')->name('shipping-address');


    //Contact Us Route

    Route::resource('contact-us','ContactUs');
});


//Admin routes


Route::get('/admin/index', 'adminController@index')->name('admin')->middleware('Admin');

Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {

    Route::resource('/products', 'ProductController');

    Route::resource('/categories', 'CategoryController');

    Route::resource('/users', 'AllUserController');

    Route::resource('/roles', 'RoleControler');

    Route::any('/blog', 'blogsController@offers')->name('offers');

    Route::resource('/blogs', 'blogsController');

    Route::any('/news', 'newsController@index')->name('index');

    Route::any('/add-news', 'newsController@add_news')->name('add-news');

    Route::any('/newsall', 'newsController@news_crud')->name('news-crud');

    Route::get('/review', 'newsController@all_reviews')->name('reviews');

    Route::any('/review-edit/{slug}', 'newsController@update')->name('edit-reviews');

    Route::get('/cart', 'BackEndCartController@index')->name('BackendCart');

    Route::Delete('/delete/{id}', 'BackEndCartController@destroy')->name('BackendCartDelete');

    //Admin search routes below |v|

    Route::post('search', 'searchController@search')->name('Adminsearch');

    Route::get('events/{slug}', 'EventController@show')->name('events.show');

    Route::get('products/{slug}', 'NewsController@show')->name('products.show');

    Route::get('roles/{slug}', 'NewsController@show')->name('roles.show');


    //Backend Search Routes |^|

    Route::get('subscribers', 'adminController@showsubscribers')->name('totalsubscribers');

    //Admin Profile

    Route::get('profile', 'adminController@profile')->name('adminProfile');

    Route::put('profile/{id}', 'adminController@updateprofile')->name('ProfileUpdate');


    //Mail Routes |v|

    Route::get('inbox', 'SendMailController@index')->name('inbox');

    Route::any('compose_email', 'SendMailController@send_mail')->name('create_mail');

    Route::any('message_detail', 'SendMailController@detail_message')->name('detail_mail');


//    Blogs review routes

    Route::get('blog_review', 'backendblogController@index')->name('blog-review');

    Route::DELETE('blog_review/delete/{id}', 'backendblogController@delete')->name('blog-review-delete');


//Order Controler

    Route::resource('/orders', 'ordersController');

//Banner controller

    Route::get('/banner', 'BannerController@index')->name('banner');

//banner create

    Route::any('/banner/create', 'BannerController@createbanner')->name('bannercreate');
    Route::post('/banner/save', 'BannerController@savebanner')->name('bannersave');

//banner update routes

    Route::get('/banner/update/{id}', 'BannerController@updatebanner')->name('banner_edit');

    Route::any('/banner/update/{idd}', 'BannerController@saveupdatedbanner')->name('banner_edit_store');

    //delete banner

    Route::DELETE('/banner/dlt/{id}','BannerController@dltbanner')->name('dltbanner');

//Banner status routes {{
    //index
    Route::get('/banner/status/index', 'BannerController@bannerstatusindex')->name('bannerstatusindex');

    //create

    Route::get('/banner/status/create', 'BannerController@bannerstatuscreate')->name('bannerstatuscreate');
    Route::post('/banner/status/store', 'BannerController@bannerstatussave')->name('bannerstatussave');

    //update

    Route::get('/banner/status/edit/{id}', 'BannerController@bannerstatuseditpage')->name('bannerstatuseditpage');
    Route::any('/banner/status/editsave/{id}', 'BannerController@bannerstatusedit')->name('bannerstatusedit');

    //delete

    Route::DELETE('/banner/delete/{id}', 'BannerController@bannerstatusdelete')->name('deletestatus');

    // }}
});










