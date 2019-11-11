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
Route::get('/portofolio/create', 'PortofolioController@create');
Route::get('/portofolio/{id}/detailPortofolio', 'PortofolioController@show');
Route::post('/portofolio', 'PortofolioController@store');
Route::get('/portofolio/{id}/edit', 'PortofolioController@edit');
Route::patch('/portofolio/{id}', 'PortofolioController@update');
Route::delete('/portofolio/{id}', 'PortofolioController@destroy');


// detail portofolio
Route::get('/detailPortofolio', 'DetailPortofolioController@index')->name('detailPortofolio');

// product
Route::get('/product', 'productController@index')->name('product');

// client
Route::resource('client', 'ClientController');
// Route::post('client/update', 'ClientController@update')->name('client.update');
// Route::get('client/destroy/{id}', 'ClientController@destroy');

// inbox
Route::resource('/inbox', 'InboxController');

// home
Route::get('/home', 'homeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
