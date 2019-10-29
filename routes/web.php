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

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('/agenda', function () {
    return view('admin.agenda');
});

Route::get('/maps', 'MapsController@index')->name('maps');