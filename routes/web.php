<?php

use Illuminate\Support\Facades\Route;
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





Route::prefix('admin')->group(function(){
    // fav icon route start
    	
    Route::post('/fav/create', 'Backend\FavController@store')->name('fav.create');
    Route::get('/fav', 'Backend\FavController@index')->name('fav');
    
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
});


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



// Route::get('/dashboard', 'HomeController@index')->name('dashboard');



Auth::routes();