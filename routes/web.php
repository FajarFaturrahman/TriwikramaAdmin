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

// Route::get('/', function () {
//     return view('auth/login');
// });


//Admin Route

// portofolio
Route::get('/portofolio', 'PortofolioController@index')->name('portofolio');
Route::get('/portofolio/create', 'PortofolioController@create');
Route::get('/portofolio/{id}/detailPortofolio', 'PortofolioController@show');
Route::post('/portofolio', 'PortofolioController@store');
Route::get('/portofolio/{id}/edit', 'PortofolioController@edit');
Route::patch('/portofolio/{id}', 'PortofolioController@update');
Route::delete('/portofolio/delete/image/{id}', 'PortofolioController@delete_image')->name('delete_image_portofolio');
Route::delete('/portofolio/delete/image2/{id}', 'PortofolioController@delete_image2')->name('delete_image_portofolio2');
Route::delete('/portofolio/{id}', 'PortofolioController@destroy');


// product
Route::resource('product', 'ProductController');
Route::post('product/update', 'ProductController@update')->name('product.update');
Route::delete('product/delete/{id}', 'ProductController@destroyImage')->name('product.delete');

// client
Route::resource('client', 'ClientController');
Route::post('client/update', 'ClientController@update')->name('client.update');
Route::get('/portofolio/{id}/portofolio', 'ClientController@showPortofolio');
// Route::get('client/destroy/{id}', 'ClientController@destroy');

// inbox
Route::resource('/inbox', 'InboxController');
Route::post('inbox/update', 'InboxController@update')->name('inbox.update');
Route::post('/inbox/filter/{status}', 'InboxController@filter')->name('inbox.filter');
// home
Route::get('/home', 'homeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//login
Route::get('login', '\App\Http\Controllers\Auth\LoginController@index')->name('login');

//end of admin route




//sites route

//home
Route::get('/sites-home', 'SitesHomeController@index')->name('sitesHome');

//about
Route::get('/sites-about', 'SitesAboutUsController@index')->name('sitesAbout');

//client
Route::get('/sites-client', 'SitesClientController@index')->name('sitesClient');

//portofolio
Route::get('/sites-portofolio', 'SitesPortofolioController@index')->name('sitesPortofolio');
Route::get('/sites-portofolio/{id}', 'SitesPortofolioController@show');

//product
Route::get('/sites-product', 'SitesProductController@index')->name('sitesProduct');


//contact

Route::get('/sites-product/{id}', 'SitesProductController@show')->name('sitesProduct.show');
Route::get('/sites-contact', 'SitesContactUsController@index')->name('sitesContact');
Route::post('/sites-contact', 'SitesContactUsController@store')->name('sitesContact.store');
