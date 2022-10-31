<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('dashboard')->middleware('auth');

Route::post('/updateuserpassword', 'App\Actions\Fortify\UpdateUserPassword@update')->name('users.update_password')->middleware('auth');
Route::post('/updateuser', 'App\Actions\Fortify\UpdateUserProfilInformation@update')->name('users.update')->middleware('auth');

Route::get('/clients', 'App\Http\Controllers\ClientController@index')->name('clients.index')->middleware('auth');
Route::get('/clients/new', 'App\Http\Controllers\ClientController@create')->name('clients.create')->middleware('auth');
Route::get('/clients/{id}/edit', 'App\Http\Controllers\ClientController@edit')->name('clients.edit')->middleware('auth');
Route::get('/clients/{id}/repairs', 'App\Http\Controllers\ClientController@list')->name('clients.repairs')->middleware('auth');
Route::get('/clients/{id}/pending', 'App\Http\Controllers\ClientController@listOfPending')->name('clients.pending')->middleware('auth');
Route::post('/clients/store', 'App\Http\Controllers\CLientController@store')->name('clients.store')->middleware('auth');
Route::post('/clients/update', 'App\Http\Controllers\ClientController@update')->name('clients.updating')->middleware('auth');
Route::post('/clients/destroy', 'App\Http\Controllers\ClientController@destroy')->name('clients.destroy')->middleware('auth');
Route::get('/clients/{id}/pending/invoices', 'App\Http\Controllers\ClientController@listOfInvoice')->name('clients.listinvoices')->middleware('auth');

Route::get('/repairs', 'App\Http\Controllers\RepairController@index')->name('repairs.index')->middleware('auth');
Route::get('/repairsclosed', 'App\Http\Controllers\RepairController@closed')->name('repairs.closed')->middleware('auth');
Route::get('/repairs/new', 'App\Http\Controllers\repairController@create')->name('repairs.create')->middleware('auth');
Route::get('/repair/{id}/invoice', 'App\Http\Controllers\repairController@showProforma')->name('repairs.invoice')->middleware('auth');
Route::get('/repairs/{id}/receipt', 'App\Http\Controllers\repairController@showReceipt')->name('repairs.receipt')->middleware('auth');
Route::post('/repairs/store', 'App\Http\Controllers\RepairController@store')->name('repairs.store')->middleware('auth');
Route::get('/repairs/{id}/edit', 'App\Http\Controllers\RepairController@edit')->name('repairs.edit')->middleware('auth');
Route::post('/repairs/update', 'App\Http\Controllers\RepairController@update')->name('repairs.update')->middleware('auth');
Route::get('/repairs/{id}/payment', 'App\Http\Controllers\RepairController@payment')->name('repairs.payment')->middleware('auth');
Route::post('/repairs/pay', 'App\Http\Controllers\RepairController@pay')->name('repairs.pay')->middleware('auth');
Route::get('/repairs/old', 'App\Http\Controllers\RepairController@sixMonths')->name('repairs.old')->middleware('auth');
Route::post('/repairs/destroy', 'App\Http\Controllers\RepairController@destroy')->name('repairs.destroy')->middleware('auth');

Route::get('/transactions', 'App\Http\Controllers\TransactionController@index')->name('transactions.index')->middleware('auth');
Route::get('/transactions/new', 'App\Http\Controllers\TransactionController@create')->name('transactions.create')->middleware('auth');
Route::get('/transactions/{id}/edit', 'App\Http\Controllers\TransactionController@edit')->name('transactions.edit')->middleware('auth');
Route::post('/transactions/destroy', 'App\Http\Controllers\TransactionController@destroy')->name('transactions.destroy')->middleware('auth');
Route::post('/transactions/update', 'App\Http\Controllers\TransactionController@update')->name('transactions.update')->middleware('auth');
Route::post('/transactions/store', 'App\Http\Controllers\TransactionController@store')->name('transactions.store')->middleware('auth');

Route::get('/wreckers', 'App\Http\Controllers\WreckerController@index')->name('wreckers.index')->middleware('auth');
Route::get('/wreckers/new', 'App\Http\Controllers\WreckerController@create')->name('wreckers.create')->middleware('auth');
Route::get('/wreckers/{id}/edit', 'App\Http\Controllers\WreckerController@edit')->name('wreckers.edit')->middleware('auth');
Route::post('/wreckers/destroy', 'App\Http\Controllers\WreckerController@destroy')->name('wreckers.destroy')->middleware('auth');
Route::post('/wreckers/store', 'App\Http\Controllers\WreckerController@store')->name('wreckers.store')->middleware('auth');
Route::post('/wreckers/update', 'App\Http\Controllers\WreckerController@update')->name('wreckers.update')->middleware('auth');

Route::get('/peopletypes', 'App\Http\Controllers\PeopletypeController@index')->name('peopletypes.index')->middleware('auth');
Route::get('/peopletypes/new', 'App\Http\Controllers\PeopletypeController@create')->name('peopletypes.create')->middleware('auth');
Route::get('/peopletypes/{id}/edit', 'App\Http\Controllers\PeopletypeController@edit')->name('peopletypes.edit')->middleware('auth');
Route::post('/peopletypes/destroy', 'App\Http\Controllers\PeopletypeController@destroy')->name('peopletypes.destroy')->middleware('auth');
Route::post('/peopletypes/store', 'App\Http\Controllers\PeopletypeController@store')->name('peopletypes.store')->middleware('auth');
Route::post('/peopletypes/update', 'App\Http\Controllers\PeopletypeController@update')->name('peopletypes.update')->middleware('auth');

Route::get('/pricegettings', 'App\Http\Controllers\PricegettingController@index')->name('pricegettings.index')->middleware('auth');
Route::get('/pricegettings/new', 'App\Http\Controllers\PricegettingController@create')->name('pricegettings.create')->middleware('auth');
Route::post('/pricegettings/store', 'App\Http\Controllers\PricegettingController@store')->name('pricegettings.store')->middleware('auth');
Route::get('/pricegettings/{id}/edit', 'App\Http\Controllers\PricegettingController@edit')->name('pricegettings.edit')->middleware('auth');
Route::post('/pricegettings/update', 'App\Http\Controllers\PricegettingController@update')->name('pricegettings.update')->middleware('auth');
Route::post('/pricegettings/destroy', 'App\Http\Controllers\PricegettingController@destroy')->name('pricegettings.destroy')->middleware('auth');

Route::get('/pricepenalities', 'App\Http\Controllers\PricePenalityController@index')->name('pricepenalities.index')->middleware('auth');
Route::get('/pricepenalities/new', 'App\Http\Controllers\PricePenalityController@create')->name('pricepenalities.create')->middleware('auth');
Route::post('/pricepenalities/destroy', 'App\Http\Controllers\PricePenalityController@destroy')->name('pricepenalities.destroy')->middleware('auth');
Route::get('/pricepenalities/{id}/edit', 'App\Http\Controllers\PricePenalityController@edit')->name('pricepenalities.edit')->middleware('auth');
Route::post('/pricepenalities/store', 'App\Http\Controllers\PricePenalityController@store')->name('pricepenalities.store')->middleware('auth');
Route::post('/pricepenalities/update', 'App\Http\Controllers\PricePenalityController@update')->name('pricepenalities.update')->middleware('auth');

Route::get('/complaints', 'App\Http\Controllers\ComplaintController@index')->name('complaints.index')->middleware('auth');
Route::get('/complaints/new', 'App\Http\Controllers\ComplaintController@create')->name('complaints.create')->middleware('auth');
Route::post('/complaints/store', 'App\Http\Controllers\ComplaintController@store')->name('complaints.store')->middleware('auth');
Route::get('/complaints/{id}/edit', 'App\http\Controllers\ComplaintController@edit')->name('complaints.edit')->middleware('auth');
Route::post('/complaints/update', 'App\http\Controllers\ComplaintController@update')->name('complaints.update')->middleware('auth');
Route::post('/complaints/destroy', 'App\http\Controllers\ComplaintController@destroy')->name('complaints.destroy')->middleware('auth');

Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index')->middleware('auth');
Route::get('/users/new', 'App\Http\Controllers\UserController@create')->name('users.create')->middleware('auth');
Route::get('/users/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('users.edit')->middleware('auth');
Route::post('/users/destroy', 'App\Http\Controllers\UserController@destroy')->name('users.destroy')->middleware('auth');
Route::post('/users/update', 'App\Http\Controllers\UserController@update')->name('users.update')->middleware('auth');
Route::post('users/store', 'App\Http\Controllers\UserController@store')->name('users.store')->middleware('auth');

Route::get('/criterias', 'App\Http\Controllers\CriteriaController@index')->name('criterias.index')->middleware('auth');
Route::get('/criterias/new', 'App\Http\Controllers\CriteriaController@create')->name('criterias.create')->middleware('auth');
Route::get('/criterias/{id}/edit', 'App\Http\Controllers\CriteriaController@edit')->name('criterias.edit')->middleware('auth');
Route::post('/criterias/store', 'App\Http\Controllers\CriteriaController@store')->name('criterias.store')->middleware('auth');
Route::post('/criterias/update', 'App\Http\Controllers\CriteriaController@update')->name('criterias.update')->middleware('auth');
Route::post('/criterias/destroy', 'App\Http\Controllers\CriteriaController@destroy')->name('criterias.destroy')->middleware('auth');

