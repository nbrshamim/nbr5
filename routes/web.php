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
    return view('welcome');
});


// Route::get('product-lis', 'ProductController@list')->name('product.list');
// Route::post('product-import', 'ProductController@productsImport')->name('product.import');
// Route::get('product-export/{type}', 'ProductController@productsExport')->name('product.export');

Route::get('form', 'ImportController@showForm')->name('form');
Route::post('import', 'ImportController@dataImport')->name('data.import');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'Auth\AdminLoginController@showLoginForm')->name('admin');
Route::get('admin/registration', 'Auth\AdminLoginController@registration')->name('admin.registration');
Route::post('admin/register', 'Auth\AdminLoginController@store')->name('register');
