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

Route::get('/', function () {
    return view('auth/login');
});

// portofolio
Route::get('/portofolio', 'PortofolioController@index')->name('portofolio');

// add portofolio
Route::get('/addPortofolio', 'AddPortofolioController@index')->name('addPortofolio');

// detail portofolio
Route::get('/detailPortofolio', 'DetailPortofolioController@index')->name('detailPortofolio');

// product
Route::get('/product', 'productController@index')->name('product');

// client
Route::resource('client', 'ClientController');


// inbox
Route::get('/inbox', 'InboxController@index')->name('inbox');

// home
Route::get('/home', 'homeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
