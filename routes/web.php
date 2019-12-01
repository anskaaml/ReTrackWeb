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

// ** Belum Dirapiin **
// Mobil
Route::get('/data-mobil', 'CarController@index')->name('car');
Route::get('/data-mobil/{id}', 'CarController@show')->name('car.show');
Route::get('/data-mobil/create', 'CarController@create')->name('car.create');

Route::get('/crud-mobil', function () {
    return view('data.createOrUpdate-mobil');
});
Route::get('/detail-mobil', function () {
    return view('data.detail-mobil');
});

// Kategori
Route::get('/data-kategori', 'CategoryController@index')->name('category');
Route::get('/data-kategori/{id}', 'CategoryController@show')->name('category.show');

Route::get('/crud-kategori', function () {
    return view('data.createOrUpdate-kategori');
});
Route::get('/detail-kategori', function () {
    return view('data.detail-kategori');
});


// * Role *
// Show All
Route::get('/data-role', 'RoleController@index')->name('role');
// Load Create Form
Route::get('/data-role/create', 'RoleController@create')->name('role.create');
// Post To API
Route::post('/data-role/store', 'RoleController@store')->name('role.store');
// Show Data
Route::get('/data-role/{id}', 'RoleController@show')->name('role.show');
// Load Update Form
Route::post('/data-role/{id}/update', 'RoleController@update')->name('role.update');
// Put To API
Route::get('/data-role/{id}/edit', 'RoleController@edit')->name('role.edit');
// Delete Data
Route::get('/data-role/{id}/delete', 'RoleController@delete')->name('role.delete');
// * Role *

// Lokasi
Route::get('/data-lokasi', function () {
    return view('data.data-lokasi');
});
Route::get('/crud-lokasi', function () {
    return view('data.createOrUpdate-lokasi');
});Route::get('/detail-lokasi', function () {
    return view('data.detail-lokasi');
});

// Tim
Route::get('/data-tim', function () {
    return view('data.data-tim');
});
Route::get('/crud-tim', function () {
    return view('data.createOrUpdate-tim');
});
Route::get('/detail-tim', function () {
    return view('data.detail-tim');
});

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

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/laporan-polisi', 'LaporanPolisiController@index')->name('laporan-polisi');
Route::get('/laporan-warga', 'LaporanWargaController@index')->name('laporan-warga');

Route::get('/history', 'HistoryController@index')->name('history');

