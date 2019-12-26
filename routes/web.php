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

Auth::routes();
//Admin Route

// portofolio
Route::get('/admin-portofolio', 'PortofolioController@index')->name('admin-portofolio');
Route::get('/admin-portofolio/create', 'PortofolioController@create');
Route::get('/admin-portofolio/{id}/detailPortofolio', 'PortofolioController@show');
Route::post('/admin-portofolio', 'PortofolioController@store');
Route::get('/admin-portofolio/{id}/edit', 'PortofolioController@edit');
Route::patch('/admin-portofolio/{id}', 'PortofolioController@update');
Route::delete('/admin-portofolio/delete/image/{id}', 'PortofolioController@delete_image')->name('delete_image_portofolio');
Route::delete('/admin-portofolio/delete/image2/{id}', 'PortofolioController@delete_image2')->name('delete_image_portofolio2');
Route::delete('/admin-portofolio/delete/tipe/{id}', 'PortofolioController@delete_tipe')->name('delete_tipe_portofolio');
Route::delete('admin-portofolio/{id}', 'PortofolioController@destroy');


// product
Route::resource('admin-product', 'ProductController');
Route::post('admin-product/update', 'ProductController@update')->name('admin-product.update');
Route::delete('admin-product/delete/{id}', 'ProductController@destroyImage')->name('admin-product.delete');

// client
Route::resource('admin-client', 'ClientController');
Route::post('admin-client/update', 'ClientController@update')->name('admin-client.update');
Route::get('/admin-portofolio/{id}/portofolio', 'ClientController@showPortofolio');
// Route::get('client/destroy/{id}', 'ClientController@destroy');

// inbox
Route::resource('/admin-inbox', 'InboxController');
Route::post('admin-inbox/update', 'InboxController@update')->name('admin-inbox.update');
Route::post('/admin-inbox/filter/{status}', 'InboxController@filter')->name('admin-inbox.filter');
// home
Route::get('/admin-home', 'homeController@index')->name('admin-home');

Route::get('/admin-home', 'HomeController@index')->name('admin-home');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//login


//end of admin route




//sites route

//home
Route::get('/home', 'SitesHomeController@index')->name('home');

//about
Route::get('/about', 'SitesAboutUsController@index')->name('about');

//client
Route::get('/client', 'SitesClientController@index')->name('client');
Route::get('load-more-data','SitesClientController@more_data');

//portofolio
Route::get('/portofolio', 'SitesPortofolioController@index')->name('portofolio');
Route::get('/portofolio/{id}', 'SitesPortofolioController@show');
Route::get('load-more-data-port','SitesPortofolioController@more_data');
Route::post('/portofolio/filter/{status}', 'SitesPortofolioController@filter')->name('portofolio.filter');

//product
Route::get('/product', 'SitesProductController@index')->name('product');

// Contact
Route::get('/contact', 'SitesContactUsController@index')->name('contact');
Route::post('/contact', 'SitesContactUsController@store')->name('contact.store');
