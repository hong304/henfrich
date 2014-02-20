<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('prefix' => Request::segment(1)), function()
{
    // =========== Auth routes ============
    Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
    Route::post('login', 'AuthController@postLogin');

    Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@getLogout']);

    Route::get('register', ['as'=>'register', 'uses'=>'AuthController@getRegister']);
    Route::post('register','AuthController@postRegister');

    Route::controller('password', 'RemindersController');

    Route::get('product_list/{type}', ['as'=>'product_list', 'uses'=>'ProductController@getProductList']);
    Route::post('product_filter', 'ProductController@postProductFilter');
    Route::get('product_detail/{id}', ['as'=>'product_detail', 'uses'=>'ProductController@getProductDetail']);

    Route::post('add_to_cart','CartController@postAddToCart');
    Route::get('cart',['as'=>'cart','uses'=>'CartController@getCart']);
    Route::get('cart_remove/{id}',['as'=>'cart_remove','uses'=>'CartController@getCartRemove']);

    Route::get('checkout',['as'=>'checkout','uses'=>'CheckoutController@getCheckout']);
});