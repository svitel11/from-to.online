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
    return view('home.index');
})->name('home');

Route::get('/privacy_policy', function() {
    return view('info.policy');
})->name('privacy_policy');

Route::get('/datastorageconverter', 'DatasizeController@index')->name('datastorage');

Route::get('/imageconverter', 'ImageController@index')->name('image');

Route::get('/bot', 'BotController@index')->name('bot');
Route::get('/bot/test', 'BotController@test')->name('test');
Route::get('/bot/balance', 'BotController@balance')->name('balance');

Route::get('/cryptoconverter', 'CryptoController@index')->name('crypto');

Route::get('/massconverter', 'MassController@index')->name('mass');
