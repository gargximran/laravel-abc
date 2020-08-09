<?php

use Illuminate\Support\Facades\Route;

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





/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->namespace('Backend')->group(function(){

    //home page route
    Route::get('/', function(){
        return view('backend.pages.home');
    });


});
























/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//index page route
Route::get('/','Frontend\FrontendController@index')->name('index');

//about page route
Route::get('/about','Frontend\FrontendController@about')->name('about');

//shop page route
Route::get('/shop','Frontend\FrontendController@shop')->name('shop');

//product detail page route
//Route::get('/productDetails','Frontend\FrontendController@shop')->name('shop');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
