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

use Illuminate\Support\Facades\Route;

/*
 *PagesController section
 */
Route::get('/','PagesController@getIndex');
Route::get('/404','PagesController@get404');
Route::get('/blog','PagesController@getBlog');
Route::get('/blog_single','PagesController@getBlog_Single');
Route::get('/cart','PagesController@getCart');
Route::get('/checkout','PagesController@getCheckout');
Route::get('/contact','PagesController@getContact');
Route::get('/login','PagesController@getLogin');
Route::get('/product_details','PagesController@getProduct_Details');
Route::get('/send_mail','PagesController@getSend_Mail');
Route::get('/shop','PagesController@getShop');
