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
    return view('datasize.index');
});

Route::get('/datasize', 'DatasizeController@index')->name('datasize');

Route::get('/bot', 'BotController@index')->name('bot');
