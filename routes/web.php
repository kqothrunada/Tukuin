<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', 'ItemController@index');

Route::get('/register', function(){
    return view('register');
});
Route::post('/register', 'AuthController@register');

Route::get('/login', function(){
    return view('login');
});
Route::post('/login', 'AuthController@login');

Route::group(['middleware'=>'check.seller'], 
    function() {
        Route::get('/addnewitem', 'ItemController@addItem');
        Route::get('/edit', 'ItemController@doEditItem');
        Route::get('/edit/{id}', 'ItemController@edit');
        Route::get('/delete/{id}', 'ItemController@deleteItem');
        Route::post('/additem', 'ItemController@doAddItem');
        Route::get('/destroy/{id}', 'ItemController@destroyItem');
        Route::post('/doedititem', 'ItemController@doEditItem');
        Route::get('/transactions', 'TransactionController@show');
        Route::get('/transaction', 'TransactionController@showdetail');
        Route::get('/transactiondetail/{id}', 'TransactionController@showdetail');
    }
);

Route::group(['middleware'=>'check.member'], function() {
    Route::get('/cart', 'CartController@index');
    Route::post('/addcart', 'CartController@addToCart');
    Route::post('/update', 'CartController@update');
    Route::get('/deletecart/{id}', 'CartController@deleteCart');
    Route::post('/checkout', 'TransactionController@checkout');
    Route::get('/transaction', 'TransactionController@showdetail');
    Route::get('/transactiondetail/{id}', 'TransactionController@showdetail');
    Route::get('/history', 'TransactionController@showhistory');
});

Route::get('/itemdetail/{id}', 'ItemController@itemDetail');
Route::get('/item/search', 'ItemController@search');
Route::get('/logout', 'AuthController@logout');