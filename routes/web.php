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

Route::get('/', 'AuthController@root');

Route::post('/testLogin', 'AuthController@login')->name('testLogin');

Route::get('/testTrack', 'TrackController@trackAll');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/maps', 'MapsController@index')->name('maps');
Route::get('/maps', 'MapsController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/agenda', 'AgendaController@index')->name('agenda');

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/laporan', 'LaporanController@index')->name('laporan');

Route::get('/data', 'DataController@index')->name('data');

Route::get('/riwayat', 'RiwayatController@index')->name('riwayat');

Route::get('/test', function () {
    return view('welcome');
});