<?php

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

Route::get('/',  [
'uses'  => 'FrountController@index' ,
'as'    => 'index'
]);


Route::get('/product/{id}' ,'FrountController@single' )->name('product.single');



Auth::routes();

                        //  ! Admin Middleware Routing  //

Route::group(['prefix' =>  'admin' , 'middleware' => 'auth' ], function () {

 Route::get('/home', 'HomeController@index')->name('home'); 

 // Todo >>> Routes of admins 
// Products Routess   
Route::resource('product', 'ProductsController');

// Delete Products
Route::get('/product/kill/{id}' , 'ProductsController@destroy' )->name('product.delete');

// Maps
Route::get('/id/maps', function () {
    return View::make("Maps.index");
});

Route::get('/pro/unique', function () {
    return View::make("profile");
});

// Category Controllers 
Route::resource('cat', 'CategoryController');
Route::get('/delete/cat/{id}' , 'CategoryController@destroy')->name('cat.delete');

// CartRoutes
Route::post('/cart/add', 'ShoppingController@index' )->name('cart.add');
Route::get('/cart'  ,  'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}' , 'ShoppingController@delete')->name('cart.delete');
Route::get('/cart/red/{id}/{qty}' , 'ShoppingController@reduce')->name('cart.reduce');
Route::get('/cart/incre/{id}/{qty}' , 'ShoppingController@increment')->name('cart.increment');
Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);
// ! >>>>   Stripe Gateways
Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);
Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);

});



