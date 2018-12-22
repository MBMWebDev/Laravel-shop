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
/*****Home page******/
Route::get('/', function () {
    return view('shop.index');
});



/*****user profile******/
Route::group(['middleware' => ['web','auth']], function () {
  /*****user checkout******/
  Route::get('/cart/checkout/','ProductController@getCommande');
  Route::post('/orders/validate','ProductController@postCommande');
Route::get('/profile','ProductController@mesCommandes');
});



/*****Products Front******/
Route::get('/smartphones','ProductController@index_smartphones');
Route::get('/dslr','ProductController@index_dslr');
Route::get('/pc-laptops','ProductController@index_pclaptops');
Route::get('/products/details/{id}','ProductController@show');
Route::get('/products/search','ProductController@search');



/*****shopping cart******/
Route::get('/cart','ProductController@getCart');
Route::get('/products/add-to-cart/{id}','ProductController@getAddToCart');
Route::get('/cart/delete/{id}','ProductController@getRemoveItem');
Route::get('/cart/reduce/{id}','ProductController@getReduceByOne');
Route::get('/cart/add/{id}','ProductController@getAddByOne');
Route::get('/cart/clear/','ProductController@viderPanier');



Auth::routes();
/*****Admin******/
Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
//route groupe for admin
Route::group(['middleware' => ['web','auth:admin']], function () {
  Route::get('/products','ProductController@products_admin');
  Route::get('/add','ProductController@add');
  Route::post('/store','ProductController@store');
  Route::get('/products/delete/{id}','ProductController@destroy');
  Route::get('/products/edit/{id}','ProductController@edit');
  Route::post('/products/update/{id}','ProductController@update');

});
});
