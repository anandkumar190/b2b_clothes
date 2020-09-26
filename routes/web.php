<?php

use Illuminate\Support\Facades\Route;

// Admin Routes Start here

// Admin Routes ends here

// Seller Routes Starts here

Route::post('/checkDuplicate','HomeController@checkDuplicate');
Route::get('/login','HomeController@seller_login')->name('login');
Route::get('/register','HomeController@seller_register')->name('register');
Route::post('/findState','HomeController@findState')->name('findState');
Route::post('/findCity','HomeController@findCity')->name('findCity');
Route::post('/findPhoneCode','HomeController@findPhoneCode')->name('findPhoneCode');
Route::post('/seller_auth_register','HomeController@register_seller')->name('seller_auth_register');
Route::post('/seller_auth_login','HomeController@login_seller')->name('seller_auth_login');
Route::post('/logout','HomeController@logout')->name('logout');
// Seller Routes Ends here

Route::group(['middleware'=>['Seller']],function(){
    Route::get('dashboard','SellerController@dashboard')->name('seller_dashboard');
    Route::get('/seller_data/{id}','SellerController@seller_data');
    Route::get('/seller_profile','SellerController@profile');
    Route::resource('/product','ProductController');
    Route::get('/get_product_data','ProductController@get_product_data')->name('get_product_data');
    Route::post('/findSubcategory','SellerController@findSubcategory')->name('findSubcategory');
    Route::post('calculateAmount','SellerController@calculateAmount')->name('calculateAmount');
    Route::get('/blocked','SellerController@blocked')->name('blocked');
    Route::post('update_profile/{id}','SellerController@update_profile');
    Route::get('/change_password/{id}','SellerController@change_password');
    Route::post('/update_password/{id}','SellerController@update_password');
    Route::group(['middleware'=>['Admin']],function()
    {
        Route::get('/admin_index','AdminController@adminIndex')->name('admin_index');
        Route::resource('/category','CategoryController');
        Route::get('/get_category_data','CategoryController@get_category_data')->name('get_category_data');
        Route::resource('/subcategory','SubCategoryController');
        Route::get('/get_subcategory_data','SubCategoryController@get_subcategory_data')->name('get_subcategory_data');
        Route::get('/seller_listing','AdminController@seller_listing')->name('seller_listing');
        Route::get('/get_seller_listing','SellerController@get_seller_listing')->name('get_seller_listing');
        Route::post('/update_seller/{id}','SellerController@update_seller')->name('approve_seller');
        Route::resource('/weave','WeaveController');
        Route::get('/get_weave_data','WeaveController@get_weave_data')->name('get_weave_data');
        Route::resource('/tradename','TradeNameController');
        Route::get('/get_tradename_data','TradeNameController@get_tradename_data')->name('get_tradename_data');
        Route::resource('/finish','FinishController');
        Route::get('/get_finish_data','FinishController@get_finish_data')->name('get_finish_data');
        Route::resource('/color','ColorController');
        Route::get('/get_color_data','ColorController@get_color_data')->name('get_color_data');
        Route::resource('/blendContent','BlendContentController');
        Route::get('/get_blendContent_data','BlendContentController@get_blendContent_data')->name('get_blendContent_data');
        Route::resource('/price','PriceController');
        Route::get('/get_price_data','PriceController@get_price_data')->name('get_price_data');
        Route::resource('/certificate','CertificateController');
        Route::get('/get_certificate_data','CertificateController@get_certificate_data')->name('get_certificate_data');
        Route::post('/block_seller/{id}','AdminController@block_seller')->name('block_seller');
        Route::resource('/wrapCount','WrapCountController');
        Route::get('/get_wrap_data','WrapCountController@get_wrap_data')->name('get_wrap_data');
        Route::resource('/weftCount','WeftCountController');
        Route::get('/get_weft_data','WeftCountController@get_weft_data')->name('get_weft_data');
        Route::resource('/quantity','QuantityController');
        Route::get('/get_quantity_data','QuantityController@get_quantity_data')->name('get_quantity_data');
    });
});
