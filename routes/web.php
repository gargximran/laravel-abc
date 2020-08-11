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
    Route::get('/', 'DashboardController@index')->name('backend_dashboard');

    //category Management
    Route::prefix('category')->group(function(){
        Route::get('/parent', 'CategoryController@indexParent')->name('parent_category_show');
        Route::post('/parent', 'CategoryController@storeParent')->name('parent_category_store');
        Route::post('/parent/{category:id}/update', 'CategoryController@updateParent')->name('parent_category_update');



        Route::get('/child', 'CategoryController@indexChild')->name('child_category_show');
        Route::post('/child', 'CategoryController@storeChild')->name('child_category_store');
        Route::post('/child/{category:id}/update', 'CategoryController@updateChild')->name('child_category_update');
    });



    //product management
    Route::prefix('product')->group(function(){
        Route::get('/', 'ProductController@index')->name('product_show_backend');
        Route::get('/add', 'ProductController@create')->name('product_create_backend');
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

