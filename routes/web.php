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

Route::get('/', function () {
    return view('home');
});
Route::get('/about-us', function (){
    return view('customers.aboutUs');
});

//    ->middleware('test');
Route::get('/contact-us', '\App\Http\Controllers\ContactFormController@create')->name('/contact.create');
Route::post('/contact-us', '\App\Http\Controllers\ContactFormController@store')->name('/contact.store');

Route::view('Test', 'Test.test');
//Route::get('/customers', '\App\Http\Controllers\Customers\CustomersController@index');
//Route::get('/customers/create', '\App\Http\Controllers\Customers\CustomersController@create');
//Route::get('customers/{customer}','\App\Http\Controllers\Customers\CustomersController@show');
//Route::get('customers/{customer}/edit','\App\Http\Controllers\Customers\CustomersController@edit');
//Route::patch('customers/{customer}','\App\Http\Controllers\Customers\CustomersController@update');
//Route::delete('customers/{customer}','\App\Http\Controllers\Customers\CustomersController@destroy');
//Route::post('/customers', '\App\Http\Controllers\Customers\CustomersController@store');

Route::resource('customers', '\App\Http\Controllers\Customers\CustomersController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
