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

Route::get('/New-Contacts', 'ContactInformationController@create')->name('ContactInformation.create');

Route::get('/show-all-contacts', 'ContactInformationController@show')->name('ContactInformation.show');
Route::post('/Save-New-Contacts', 'ContactInformationController@store')->name('save_new_Contact');
Route::get('/contacts/single-view/{id}', 'ContactInformationController@singleView')->name('ContactInformation.singleView');
Route::get('/add-number/{id}', 'PhoneNumberController@create')->name('PhoneNumber.create');
Route::post('/number/save/{id}', 'PhoneNumberController@store')->name('PhoneNumber.store');
