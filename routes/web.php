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

// * Auth *
// Load Login Page
Route::get('/login', 'AuthController@loginPage')->name('login');
// Post user_employee_id and user_password to get JWT
Route::post('/testLogin', 'AuthController@login')->name('testLogin');
// Log out
Route::get('/logout', 'AuthController@logout')->name('logout');
// * Auth *

// * Live Tracking *
Route::get('/maps', 'MapsController@index')->name('maps');
Route::get('/maps-one', 'MapsController@mapsOne')->name('maps-one');
// * Live Tracking *

// * Polisi *
// Show All
Route::get('/data-polisi', 'PoliceController@index')->name('police');
// Load Create Form
Route::get('/data-polisi/create', 'PoliceController@create')->name('police.create');
// Post To API
Route::post('/data-polisi/store', 'PoliceController@store')->name('police.store');
// Show Data
Route::get('/data-polisi/{id}', 'PoliceController@show')->name('police.show');
// Load Update Form
Route::post('/data-polisi/{id}/update', 'PoliceController@update')->name('police.update');
// Put To API
Route::get('/data-polisi/{id}/edit', 'PoliceController@edit')->name('police.edit');
// Delete Data
Route::get('/data-polisi/{id}/delete', 'PoliceController@delete')->name('police.delete');
// * Polisi *

// * Mobil *
Route::get('/data-mobil', 'CarController@index')->name('car');
Route::get('/data-mobil/create', 'CarController@create')->name('car.create');
Route::post('/data-mobil/store_car', 'CarController@store')->name('car.store');
Route::get('/data-mobil/{id}', 'CarController@show')->name('car.show');
Route::post('/data-polisi/{id}/update', 'CarController@update')->name('car.update');
Route::get('/data-polisi/{id}/edit', 'CarController@edit')->name('car.edit');
Route::get('/data-polisi/{id}/delete', 'CarController@delete')->name('car.delete');

// Kategori
Route::get('/data-kategori', 'CategoryController@index')->name('category');
Route::get('/data-kategori/create', 'CategoryController@create')->name('category.create');
Route::post('/data-kategori/store', 'CategoryController@store')->name('category.store');
Route::get('/data-kategori/{id}', 'CategoryController@show')->name('category.show');
Route::post('/data-kategori/{id}/update', 'CategoryController@update')->name('category.update');
Route::get('/data-kategori/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::get('/data-kategori/{id}/delete', 'CategoryController@delete')->name('category.delete');

// Lokasi
Route::get('/data-lokasi', 'LocationController@index')->name('location');
Route::get('/data-lokasi/create', 'LocationController@create')->name('location.create');
Route::post('/data-lokasi/store', 'LocationController@store')->name('location.store');
Route::get('/data-lokasi/{id}', 'LocationController@show')->name('location.show');
Route::post('/data-lokasi/{id}/update', 'LocationController@update')->name('location.update');
Route::get('/data-lokasi/{id}/edit', 'LocationController@edit')->name('location.edit');
Route::get('/data-lokasi/{id}/delete', 'LocationController@delete')->name('location.delete');

// Tim
Route::get('/data-tim', 'TeamController@index')->name('team');
Route::get('/data-tim/create', 'TeamController@create')->name('team.create');
Route::post('/data-tim/store', 'TeamController@store')->name('team.store');
Route::get('/data-tim/{id}', 'TeamController@show')->name('team.show');
Route::post('/data-tim/{id}/update', 'TeamController@update')->name('team.update');
Route::get('/data-tim/{id}/edit', 'TeamController@edit')->name('team.edit');
Route::get('/data-tim/{id}/delete', 'TeamController@delete')->name('team.delete');


Route::get('/home', 'HomeController@index')->name('home');

// Agenda
Route::get('/agenda', 'AgendaController@index')->name('agenda');
Route::get('/agenda/add', 'AgendaController@add')->name('agenda.add');

Route::get('/add-agenda', function () {
    return view('agenda.add-agenda');
});
Route::get('/detail-agenda', function () {
    return view('agenda.detail-agenda');
});
Route::get('/add-member', function () {
    return view('agenda.add-member');
});

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/laporan-polisi', 'LaporanPolisiController@index')->name('laporan-polisi');
Route::get('/laporan-warga', 'LaporanWargaController@index')->name('laporan-warga');

Route::get('/history', 'HistoryController@index')->name('history');

