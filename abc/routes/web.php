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



Route::get('/','FrontendController@index');
Route::get('/shop','FrontendController@allproduct');
Route::get('/shop/{slug}','FrontendController@categoryProduct');
Route::get('/product/{slug}','FrontendController@singleproduct');
Route::post('/product/cart','CartController@addtocart')->name('product.cart');
Route::get('/cart/{id}','CartController@cartRemove');
Route::post('/cart/update','CartController@cartUpdate');
Route::get('/checkout','CartController@checkout')->name('product.checkout');
Route::get('/customer/login','FrontendController@cus_login');
Route::post('/customer/save','CustomerController@customerData');
Route::post('/customer/login','CustomerController@customerlogin')->name('customer.login');
Route::post('/customer/msg/save','CustomerController@msg')->name('customer.msg');
Route::post('/chechout/orderProduct','CheckoutController@orderProduct');
Route::get('/about-us','FrontendController@about_us');
Route::get('/gallery','FrontendController@gallery')->name('gallery');
Route::get('/contact','FrontendController@contact')->name('contact');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
// Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index')->name('admin.main');

Route::get('/admin/user','AdminController@user')->name('admin.newuser');
Route::get('/admin/user/list','AdminController@userlist')->name('admin.userlist');
Route::get('/admin/user/profile/{id}','AdminController@profile')->name('admin.user.profile');
Route::get('/admin/user/profile/{id}','AdminController@userprofile');
Route::get('/admin/user/profile/edit/{id}','AdminController@edit');
Route::post('/admin/user/profile/update','AdminController@updateData')->name('admin.user.update');
Route::post('/admin/save','AdminController@addUser')->name('admin.storeUser');
Route::get('/admin/changepassword','AdminController@changePass');
Route::post('/admin/changepass','AdminController@changePassword')->name('admin.chnagePass');


Route::get('/admin/category','CategoryController@index')->name('admin.category');
Route::post('/admin/category/store','CategoryController@storeCategory')->name('admin.category.store');
Route::post('/admin/category/update','CategoryController@updateCategory')->name('admin.category.update');
Route::get('/admin/category/delete/{id}','CategoryController@deleteCategory');

Route::get('/admin/subcategory','SubcategoryController@index')->name('admin.subcategory');
Route::post('/admin/subcategory/store','SubcategoryController@storesubcategory')->name('admin.subcategory.store');
Route::post('/admin/subcategory/update','SubcategoryController@updatesubcategory')->name('admin.subcategory.update');
Route::get('/admin/subcategory/delete/{id}','SubcategoryController@deletesubcategory');



Route::get('/admin/product','ProductController@index')->name('admin.product');
Route::post('/admin/product/add','ProductController@addProduct')->name('admin.addProduct');
Route::get('/admin/product/all','ProductController@productlist')->name('admin.productlist');
Route::get('/admin/product/stock','ProductController@stocklist')->name('admin.stocklist');

Route::get('/admin/subcat/{cat_slug}','ProductController@subcategory');
Route::get('/admin/product/view/{slug}','ProductController@viewProduct');
Route::get('/admin/product/edit/{id}','ProductController@editProduct');
Route::post('/admin/product/update','ProductController@updateProduct');


Route::get('/admin/order/request','OrderController@index');
Route::get('/admin/orderp/view/{id}','OrderController@vieworder');
Route::get('/admin/orderP/accept/{id}','OrderController@confirm');
Route::get('/admin/orderP/delete/{id}','OrderController@orderdelete');
Route::get('/admin/order/confirmlist','OrderController@confirmlist');

Route::get('/admin/customer','CustomerController@index');



// route for manage gallary

Route::get('/admin/gallary', 'GalleryController@index')->name('gallary_view');

Route::post('/admin/gallary/create', 'GalleryController@store')->name('add_new_gallery');
Route::get('/admin/gallary/{id}/update', "GalleryController@edit")->name('edit_gallery');
Route::post('/admin/gallary/{id}/update', "GalleryController@update")->name('edit_gallery');
Route::get('/admin/gallary/{id}/delete', "GalleryController@destroy")->name('delete_gallery');



// route for team members

Route::get('/admin/team', 'TeamController@index')->name('team_view');
Route::post('/admin/team/create', 'TeamController@store')->name('add_new_team_member');
Route::get('/admin/team/{id}/edit', 'TeamController@edit')->name('edit_team_member');
Route::post('/admin/team/{id}/update', 'TeamController@update')->name('update_team_member');
Route::get('/admin/team/{id}/delete', 'TeamController@destroy')->name('delete_team_member');




// route for business_unit
Route::get('/admin/business_unit', 'BusinessUnitController@index')->name('business_unit_show');
Route::post('/admin/business_unit', 'BusinessUnitController@store')->name('business_unit_show');
Route::get('/admin/business_unit/{id}/edit', 'BusinessUnitController@edit')->name('business_unit_edit');
Route::post('/admin/business_unit/{id}/edit', 'BusinessUnitController@update')->name('business_unit_edit');
Route::get('/admin/business_unit/{id}/delete', 'BusinessUnitController@destroy')->name('business_unit_delete');



// route for home slider
Route::get('/admin/home_slider', 'HomeSliderController@index')->name('home_slider_show');
Route::post('/admin/home_slider', 'HomeSliderController@store')->name('home_slider_show');
Route::get('/admin/home_slider/{id}/edit', 'HomeSliderController@edit')->name('home_slider_edit');
Route::post('/admin/home_slider/{id}/update', 'HomeSliderController@update')->name('home_slider_update');
Route::get('/admin/home_slider/{id}/delete', 'HomeSliderController@destroy')->name('home_slider_delete');



// route for client review 
Route::get('/admin/client_review', 'ClientReviewController@index')->name('client_review');
Route::post('/admin/client_review', 'ClientReviewController@store')->name('client_review');
Route::get('/admin/client_review/{id}/edit', 'ClientReviewController@edit')->name('client_review_edit');
Route::post('/admin/client_review/{id}/update', 'ClientReviewController@update')->name('client_review_update');
Route::get('/admin/client_review/{id}/delete', 'ClientReviewController@destroy')->name('client_review_delete');



// route for home page section two 
Route::post('/admin/home_section_two', "HomeSectionTwoController@store")->name('section_two');


});