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

// * Agenda *
Route::get('/agenda', 'AgendaController@index')->name('agenda');
Route::get('/agenda/create', 'AgendaController@create')->name('agenda.create');
Route::get('/agenda/add-member', 'AgendaController@addmember')->name('agenda.add-member');
Route::get('/agenda/{id}', 'AgendaController@show')->name('agenda.show');

// Mobil
Route::get('/data-mobil', 'CarController@index')->name('car');
Route::get('/data-mobil/create', 'CarController@create')->name('car.create');
Route::post('/data-mobil/store_car', 'CarController@store')->name('car.store');
Route::get('/data-mobil/{id}', 'CarController@show')->name('car.show');
Route::post('/data-mobil/{id}/update', 'CarController@update')->name('car.update');
Route::get('/data-mobil/{id}/edit', 'CarController@edit')->name('car.edit');
Route::get('/data-mobil/{id}/delete', 'CarController@delete')->name('car.delete');

// Kategori
Route::get('/data-kategori', 'CategoryController@index')->name('category');
Route::get('/data-kategori/create', 'CategoryController@create')->name('category.create');
Route::post('/data-kategori/store', 'CategoryController@store')->name('category.store');
Route::get('/data-kategori/{id}', 'CategoryController@show')->name('category.show');
Route::post('/data-kategori/{id}/update', 'CategoryController@update')->name('category.update');
Route::get('/data-kategori/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::get('/data-kategori/{id}/delete', 'CategoryController@delete')->name('category.delete');


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
Route::get('/data-lokasi', 'LocationController@index')->name('location');
Route::get('/data-lokasi/create', 'LocationController@create')->name('location.create');
Route::post('/data-lokasi/store', 'LocationController@store')->name('location.store');
Route::get('/data-lokasi/{id}', 'LocationController@show')->name('location.show');
Route::post('/data-lokasi/{id}/update', 'LocationController@update')->name('location.update');
Route::get('/data-lokasi/{id}/edit', 'LocationController@edit')->name('location.edit');
Route::get('/data-lokasi/{id}/delete', 'LocationController@delete')->name('location.delete');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/laporan-warga', 'CaseEntryController@index')->name('case_entry');
Route::get('/laporan-warga/create', 'CaseEntryController@create')->name('case_entry.create');
Route::post('/laporan-warga/store', 'CaseEntryController@store')->name('case_entry.store');
Route::get('/laporan-warga/{id}', 'CaseEntryController@show')->name('case_entry.show');
Route::post('/laporan-warga/{id}/update', 'CaseEntryController@update')->name('case_entry.update');
Route::get('/laporan-warga/{id}/edit', 'CaseEntryController@edit')->name('case_entry.edit');
Route::get('/laporan-warga/{id}/delete', 'CaseEntryController@delete')->name('case_entry.delete');

Route::get('/laporan-patroli', 'PatrolReportController@index')->name('patrol_report');
Route::get('/laporan-patroli/{id}', 'PatrolReportController@show')->name('patrol_report.show');

Route::get('/laporan-polisi', 'CaseReportController@index')->name('case_report');
Route::get('/laporan-polisi/{id}', 'CaseReportController@show')->name('case_report.show');

Route::get('/history', 'HistoryController@index')->name('history');