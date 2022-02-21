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

Route::get('domains/import','DomainController@import')->name('domains.import');
Route::post('domains/import','DomainController@importExcel')->name('domains.importexcel');


Route::resource('clients', 'ClientController');


Route::resource('domains', 'DomainController');


Route::resource('tlds', 'TldController');
//Route::post('/import','ImportController@importExcel');