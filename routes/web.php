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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/New-Contact/create', 'ContactInformationController@create')->name('ContactInformation.create');
Route::get('/Contact-Information/view', 'ContactInformationController@index')->name('ContactInformation.show');
Route::post('/New-Contact/save', 'ContactInformationController@store')->name('save_new_Contact');
Route::get('/contact/view/{id}', 'ContactInformationController@show')->name('ContactInformation.singleView');
Route::get('/delete/{id}', 'ContactInformationController@destroy')->name('ContactInformation.destroy');
Route::get('/contact/edit/{id}', 'ContactInformationController@edit')->name('ContactInformation.edit');
Route::post('/update/{id}', 'ContactInformationController@update')->name('ContactInformation.update');

Route::get('/number/delete/{id}', 'PhoneNumberController@destroy')->name('PhoneNumber.destroy');
Route::get('/number/edit/{id}', 'PhoneNumberController@edit')->name('PhoneNumber.edit');
Route::post('/number/update/{id}', 'PhoneNumberController@update')->name('PhoneNumber.update');
Route::get('/number/create/{id}', 'PhoneNumberController@create')->name('PhoneNumber.create');
Route::post('/number/save/{id}', 'PhoneNumberController@store')->name('PhoneNumber.store');

