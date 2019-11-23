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

// GMAPS with Googlmapper library from Sir Cornford
Route::get('/mapper', 'MapsController@mapper')->name('mapper');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/agenda', 'AgendaController@index')->name('agenda');

Route::get('/tambah-agenda', 'TambahAgendaController@index')->name('tambah-agenda');

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/laporan-polisi', 'LaporanPolisiController@index')->name('laporan-polisi');

Route::get('/laporan-warga', 'LaporanWargaController@index')->name('laporan-warga');

Route::get('/data-kategori', 'CategoryController@index')->name('category');

// Mobil
Route::get('/data-mobil', 'CarController@index')->name('car');
Route::post('/data-mobil/create', 'CarController@create')->name('car.create');

Route::get('/data-polisi', function () {
    return view('data.data-polisi');
});

Route::get('/data-tim', function () {
    return view('data.data-tim');
});

Route::get('/data-lokasi', function () {
    return view('data.data-lokasi');
});

Route::get('/riwayat', 'RiwayatController@index')->name('riwayat');