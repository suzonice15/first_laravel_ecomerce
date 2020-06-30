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
Route::get('/', 'HomeController@index');
Route::get('/category/{id}', 'HomeController@category');
Route::get('ajax_category', 'HomeController@ajax_category');
Route::get('/product/{id}', 'HomeController@product');
Route::get('/search_engine', 'HomeController@search_engine');
Route::get('/search', 'HomeController@search');
Route::get('/hot_home_product', 'HomeController@hot_home_product');
Route::get('/home_page_category_ajax', 'HomeController@home_page_category_ajax');
Route::get('/add-to-cart', 'AjaxController@add_to_cart');
Route::get('/related/product', 'AjaxController@relatedProduct');
Route::get('/hotdeal/product', 'AjaxController@hotdealProduct');


/*            cart           */
Route::get('/thank-you', 'CheckOutController@thankYou');
Route::get('/cart', 'CheckOutController@cart');
Route::get('/plus_cart_item', 'CheckOutController@plus_cart_item');
Route::get('/minus_cart_item', 'CheckOutController@minus_cart_item');
Route::get('/remove_cart_item', 'CheckOutController@remove_cart_item');
Route::get('/add-to-wishlist', 'CheckOutController@add_to_wishlist');
Route::get('/wishlist', 'CheckOutController@wishlist');
Route::get('/remove-to-wishlist', 'CheckOutController@remove_wish_list');
Route::get('/checkout', 'CheckOutController@checkout');
Route::post('/chechout', 'CheckOutController@checkoutStore');

Route::get('/admin', 'admin\AdminController@login');
Route::post('/login_check', 'admin\AdminController@loginCheck');
Route::get('/dashboard', 'admin\DashboardController@index');


/****=============== admin section    =====================  ******/

Route::get('admin/users', 'admin\AdminController@index');
Route::get('admin/user/create', 'admin\AdminController@create');
Route::post('admin/user/store', 'admin\AdminController@store');
Route::post('admin/user/update/{id}', 'admin\AdminController@update');
Route::get('admin/user/{id}', 'admin\AdminController@edit');
Route::get('/admin/user/delete/{id}', 'admin\AdminController@delete');
Route::get('logout', 'admin\AdminController@logout');

/****=============== category section    =====================  ******/
Route::get('admin/categories', 'admin\CategoryController@index');
Route::post('category-urlcheck', 'admin\CategoryController@urlCheck');
Route::get('admin/category/create', 'admin\CategoryController@create');
Route::post('admin/category/store', 'admin\CategoryController@store');
Route::post('admin/category/update/{id}', 'admin\CategoryController@update');
Route::get('admin/category/{id}', 'admin\CategoryController@edit');
Route::get('/admin/category/delete/{id}', 'admin\CategoryController@delete');
Route::get('category/pagination/fetch_data', 'admin\CategoryController@fetch_data');


/****=============== home page setting section    =====================  ******/
Route::get('admin/homepage/setting', 'admin\SettingController@homePageSetting');
Route::post('admin/homepage/setting', 'admin\SettingController@homePageSetting');

Route::get('admin/default/setting', 'admin\SettingController@defaultSetting');
Route::post('admin/default/setting', 'admin\SettingController@defaultSetting');
Route::get('admin/social/setting', 'admin\SettingController@socialSetting');
Route::post('admin/social/setting', 'admin\SettingController@socialSetting');



/****=============== product section    =====================  ******/
Route::get('admin/products', 'admin\ProductController@index');
Route::post('product-urlcheck', 'admin\ProductController@urlCheck')->name('product.urlcheck');
Route::post('product-foldercheck', 'admin\ProductController@foldercheck')->name('product.foldercheck');
Route::get('admin/product/create', 'admin\ProductController@create');
Route::post('admin/product/store', 'admin\ProductController@store');
Route::post('admin/product/update/{id}', 'admin\ProductController@update');
Route::get('/admin/product/{id}', 'admin\ProductController@edit');
Route::get('/admin/product/delete/{id}', 'admin\ProductController@destroy');
Route::get('products/pagination', 'admin\ProductController@pagination');


/****=============== Order section    =====================  ******/
Route::get('admin/orders', 'admin\OrderController@index');
Route::get('admin/order/create', 'admin\OrderController@create');
Route::post('admin/order/store', 'admin\OrderController@store');
Route::post('admin/order/update/{id}', 'admin\OrderController@update');
Route::get('admin/order/{id}', 'admin\OrderController@edit');
Route::get('/admin/order/delete/{id}', 'admin\OrderController@destroy');
Route::get('order/pagination', 'admin\OrderController@pagination');
Route::post('order/product/selection/change', 'admin\AjaxOrderControlller@productSelectionChange')->name('productSelectionChange');
Route::post('order/product/selection', 'admin\AjaxOrderControlller@productSelection')->name('productSelection');


/****=============== media section    =====================  ******/
Route::get('admin/media', 'admin\MediaController@index');
Route::get('admin/media/create', 'admin\MediaController@create');
Route::post('admin/media/store', 'admin\MediaController@store');
Route::get('/admin/media/delete/{id}', 'admin\MediaController@destroy');
Route::get('media/pagination', 'admin\MediaController@pagination');
Route::get('media/pagination/fetch_data', 'admin\MediaController@pagination');

/****=============== courier section    =====================  ******/
Route::get('admin/couriers', 'admin\CourierController@index');
 Route::get('admin/courier/create', 'admin\CourierController@create');
Route::post('admin/courier/store', 'admin\CourierController@store');
Route::post('admin/courier/update/{id}', 'admin\CourierController@update');
Route::get('admin/courier/{id}', 'admin\CourierController@edit');
Route::get('/admin/courier/delete/{id}', 'admin\CourierController@delete');


/****=============== media section    =====================  ******/
Route::get('admin/sliders', 'admin\SliderController@index');
Route::get('admin/slider/create', 'admin\SliderController@create');
Route::post('admin/slider/store', 'admin\SliderController@store');
Route::post('admin/slider/update/{id}', 'admin\SliderController@update');
Route::get('admin/slider/{id}', 'admin\SliderController@edit');
Route::get('/admin/slider/delete/{id}', 'admin\SliderController@destroy');
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});


