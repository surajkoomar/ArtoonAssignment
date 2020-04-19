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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home')->middleware('userTypeCheck');
	Route::get('/adminHome', 'admin\AdminController@index')->name('adminHome');
	Route::get('/getAllUser', 'admin\AdminController@getAllUser');
	Route::get('/addUser', 'admin\AdminController@addUser');
	Route::get('/editUser/{user_id}', 'admin\AdminController@editUser');
	Route::post('/saveUser', 'admin\AdminController@saveUser');
	Route::post('/updateUser', 'admin\AdminController@updateUser');
	Route::post('/deleteUser', 'admin\AdminController@deleteUser');
	Route::get('/dropZoneFile', 'admin\DropZoneController@index');
	Route::post('/saveFile', 'admin\DropZoneController@saveFile');
	Route::get('/invoice', 'InvoiceController@index');
	Route::post('/saveInvoice', 'InvoiceController@saveInvoice');
	Route::get('/invoicePDF', 'admin\InvoicePDFController@index');
	Route::get('/viewInvoicePDF/{invoice_id}', 'admin\InvoicePDFController@viewPDF');

});
