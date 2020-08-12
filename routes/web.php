<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Rehi's Backend Web Routes Start
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



    Route::group(['prefix' => 'home-page'], function(){

        //show home page
        Route::get('/', 'Backend\Home\HomePageController@index')->name('homepage.show');
    
    
        // banner route start
        Route::post('/banner/create', 'Backend\Home\HomeBannerController@store')->name('homebanner.create');
        Route::get('/banner/edit/{homebanner:slug}', 'Backend\Home\HomeBannerController@edit')->name('homebanner.edit');
        Route::post('/banner/edit/{homebanner:slug}', 'Backend\Home\HomeBannerController@update')->name('homebanner.update');
        Route::post('/banner/delete/{homebanner:slug}', 'Backend\Home\HomeBannerController@destroy')->name('homebanner.delete');

        // display route start
        Route::post('/homedisplay/create', 'Backend\Home\HomeDisplayController@store')->name('homedisplay.create');
        Route::get('/homedisplay/edit/{homedisplay:slug}', 'Backend\Home\HomeDisplayController@edit')->name('homedisplay.edit');
        Route::post('/homedisplay/edit/{homedisplay:slug}', 'Backend\Home\HomeDisplayController@update')->name('homedisplay.update');
        Route::post('/homedisplay/delete/{homedisplay:slug}', 'Backend\Home\HomeDisplayController@destroy')->name('homedisplay.delete');
        // display route end

        // testimonial route start
        Route::post('/testimonial/create', 'Backend\Home\TestimonialController@store')->name('testimonial.create');
        Route::get('/testimonial/edit/{testimonial:id}', 'Backend\Home\TestimonialController@edit')->name('testimonial.edit');
        Route::post('/testimonial/edit/{testimonial:id}', 'Backend\Home\TestimonialController@update')->name('testimonial.update');
        Route::post('/testimonial/delete/{testimonial:id}', 'Backend\Home\TestimonialController@destroy')->name('testimonial.delete');
        // testimonial route end

    });	
    //home page route end

    //about page route start
    Route::group(['prefix' => 'about-page'], function(){

        //show about page
        Route::get('/', 'Backend\About\AboutPageController@index')->name('aboutpage.show');

        // banner route start
        Route::post('/banner/create', 'Backend\About\AboutBannerController@store')->name('aboutbanner.create');
        Route::get('/banner/edit/{aboutbanner:id}', 'Backend\About\AboutBannerController@edit')->name('aboutbanner.edit');
        Route::post('/banner/edit/{aboutbanner:id}', 'Backend\About\AboutBannerController@update')->name('aboutbanner.update');
        Route::post('/banner/delete/{aboutbanner:id}', 'Backend\About\AboutBannerController@destroy')->name('aboutbanner.delete');
        // banner route end

        // abc info route start
        Route::post('/abcinfo/create', 'Backend\About\AbcInfoController@store')->name('abcinfo.create');
        Route::get('/abcinfo/edit/{abcinfo:id}', 'Backend\About\AbcInfoController@edit')->name('abcinfo.edit');
        Route::post('/abcinfo/edit/{abcinfo:id}', 'Backend\About\AbcInfoController@update')->name('abcinfo.update');
        Route::post('/abcinfo/delete/{abcinfo:id}', 'Backend\About\AbcInfoController@destroy')->name('abcinfo.delete');
        // abc info route end

        // client route start
        Route::post('/client/create', 'Backend\About\ClientController@store')->name('client.create');
        Route::get('/client/edit/{client:id}', 'Backend\About\ClientController@edit')->name('client.edit');
        Route::post('/client/edit/{client:id}', 'Backend\About\ClientController@update')->name('client.update');
        Route::post('/client/delete/{client:id}', 'Backend\About\ClientController@destroy')->name('client.delete');
        // client route end

        // team member route start
        Route::post('/team/create', 'Backend\About\TeamMemberController@store')->name('team.create');
        Route::get('/team/edit/{team:id}', 'Backend\About\TeamMemberController@edit')->name('team.edit');
        Route::post('/team/edit/{team:id}', 'Backend\About\TeamMemberController@update')->name('team.update');
        Route::post('/team/delete/{team:id}', 'Backend\About\TeamMemberController@destroy')->name('team.delete');
        // team member route end

        // industry route start
        Route::post('/industry/create', 'Backend\About\IndustryController@store')->name('industry.create');
        Route::get('/industry/edit/{industry:id}', 'Backend\About\IndustryController@edit')->name('industry.edit');
        Route::post('/industry/edit/{industry:id}', 'Backend\About\IndustryController@update')->name('industry.update');
        Route::post('/industry/delete/{industry:id}', 'Backend\About\IndustryController@destroy')->name('industry.delete');
        // industry route end

        // vission mission values route start
        Route::post('/vision/create', 'Backend\About\VisionController@store')->name('vision.create');
        Route::get('/vision/edit/{vision:id}', 'Backend\About\VisionController@edit')->name('vision.edit');
        Route::post('/vision/edit/{vision:id}', 'Backend\About\VisionController@update')->name('vision.update');
        Route::post('/vision/delete/{vision:id}', 'Backend\About\VisionController@destroy')->name('vision.delete');
        // vission mission values route end

        // relation route start
        Route::post('/relation/create', 'Backend\About\RelationController@store')->name('relation.create');
        Route::get('/relation/edit/{relation:id}', 'Backend\About\RelationController@edit')->name('relation.edit');
        Route::post('/relation/edit/{relation:id}', 'Backend\About\RelationController@update')->name('relation.update');
        Route::post('/relation/delete/{relation:id}', 'Backend\About\RelationController@destroy')->name('relation.delete');
        // relation route end

    
    });	
    //about page route end



});
/*
|--------------------------------------------------------------------------
| Rehi's Backend Web Routes end
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
        Route::post('/store', 'ProductController@store')->name('product_store_backend');
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

//contact page route
Route::get('/contact','Frontend\FrontendController@contact')->name('contact');

//gallery page route
Route::get('/gallery','Frontend\FrontendController@gallery')->name('gallery');

// Route::get('/dashboard', 'HomeController@index')->name('dashboard');



Auth::routes();