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

Route::get('/tambah-agenda', 'TambahAgendaController@index')->name('tambah-agenda');

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/laporan-polisi', 'LaporanPolisiController@index')->name('laporan-polisi');

Route::get('/laporan-warga', 'LaporanWargaController@index')->name('laporan-warga');

Route::get('/data-polisi', 'DataController@index')->name('data');

Route::get('/data-polisi', function () {
    return view('data.data-polisi');
});

Route::get('/data-mobil', function () {
    return view('data.data-mobil');
});

Route::get('/data-tim', function () {
    return view('data.data-tim');
});

Route::get('/data-lokasi', function () {
    return view('data.data-lokasi');
});

Route::get('/data-kategori', function () {
    return view('data.data-kategori');
});

Route::get('/riwayat', 'RiwayatController@index')->name('riwayat');

Route::get('/test', function () {
    return view('welcome');
});