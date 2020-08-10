<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');





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

// fav icon route start
Route::get('/fav', 'Backend\FavController@index')->name('fav');
Route::post('/fav/create', 'Backend\FavController@store')->name('fav.create');
Route::get('/fav/edit/{fav:slug}', 'Backend\FavController@edit')->name('fav.edit');
Route::post('/fav/edit/{fav:slug}', 'Backend\FavController@update')->name('fav.update');
Route::post('/fav/delete/{fav:slug}', 'Backend\FavController@destroy')->name('fav.delete');
// fav icon route end

// logo route start
Route::get('/logo', 'Backend\LogoController@index')->name('logo');
Route::post('/logo/create', 'Backend\LogoController@store')->name('logo.create');
Route::get('/logo/edit/{logo:slug}', 'Backend\LogoController@edit')->name('logo.edit');
Route::post('/logo/edit/{logo:slug}', 'Backend\LogoController@update')->name('logo.update');
Route::post('/logo/delete/{logo:slug}', 'Backend\LogoController@destroy')->name('logo.delete');
// logo route end


Route::group(['prefix' => 'ManageHomePage'], function(){

    //show home page
    Route::get('/', 'Backend\HomePageController@index')->name('homepage.show');

    // banner route start
    Route::get('/banner', 'Backend\HomeBannerController@index')->name('homebanner');
    Route::post('/banner/create', 'Backend\HomeBannerController@store')->name('homebanner.create');
    Route::get('/banner/edit/{homebanner:slug}', 'Backend\HomeBannerController@edit')->name('homebanner.edit');
    Route::post('/banner/edit/{homebanner:slug}', 'Backend\HomeBannerController@update')->name('homebanner.update');
    Route::post('/banner/delete/{homebanner:slug}', 'Backend\HomeBannerController@destroy')->name('homebanner.delete');
    // banner route end

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



