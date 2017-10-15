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
Route::get('/product_details/{product}','PagesController@getProduct_Details');
Route::get('/send_mail','PagesController@getSend_Mail');
Route::get('/shop','PagesController@getShop');

/*
 * AdminController section
 *
 */
Route::prefix('/admin')->group(function (){
    Route::GET('/','\App\Http\Controllers\AdminController@index')->name('admin.home');
    Route::GET('/login','\App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::POST('/login','\App\Http\Controllers\Admin\LoginController@login');
Route::POST('/password/email','\App\Http\Controllers\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('/password/reset','\App\Http\Controllers\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('/password/reset','\App\Http\Controllers\Admin\ResetPasswordController@reset');
Route::GET('/password/reset/{token}','\App\Http\Controllers\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('/register','\App\Http\Controllers\Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::POST('/register','\App\Http\Controllers\Admin\RegisterController@register');
});

/*
 *CategoryController section
 */
Route::resource('/admin/category','CategoryController');
/*
 *SubCategoryController section
 */
Route::resource('/admin/subCategory','SubCategoryController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
 *ProductController section
 */
Route::resource('/admin/product','ProductController');
/*
 *BrandController section
 */
Route::resource('/admin/brand','BrandController');
/*
 *CartController section
 */
Route::get('/addToCart','CartController@index');
Route::get('/addToCart/{id}','CartController@addItem');