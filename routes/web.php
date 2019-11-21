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

// Laravel Welcome Page
// Route::get('/', function () {
//     return view('welcome');
// });

// API Welcome Page
Route::get('/', 'AuthController@root');

// Load Login Page
Route::get('/login', function () {
    return view('admin.login');
})->name('login');

// Post user_employee_id and user_password to get JWT
Route::post('/testLogin', 'AuthController@login')->name('testLogin');

// Pure GMAPS with JS & AJAX but only have one marker for every user and marker clusterer
Route::get('/maps', 'MapsController@index')->name('maps');

// Pure GMAPS with JS & AJAX. Probably will be using Marker for every user
Route::get('/maps-marker', 'MapsController@maps_marker')->name('maps-marker');

// Pure GMAPS with JS & AJAX. Probably will be using Marker for every user but onlu recent location
Route::get('/maps-marker0', 'MapsController@maps_marker0')->name('maps-marker0');

// GMAPS with Googlmapper library from Sir Cornford
Route::get('/mapper', 'MapsController@mapper')->name('mapper');

// Just example, not gonna use this for now
// Route::get('/testTrack', 'TrackController@trackAll');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/agenda', 'AgendaController@index')->name('agenda');

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/laporan', 'LaporanController@index')->name('laporan');

Route::get('/data', 'DataController@index')->name('data');

Route::get('/riwayat', 'RiwayatController@index')->name('riwayat');