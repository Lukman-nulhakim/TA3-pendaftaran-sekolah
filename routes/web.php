<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.jumbotron');
});


Route::group(['middleware' => ['auth','admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::resource('sekolah', 'SekolahController');
        Route::get('/siswa','SiswaController@index')->name('siswa.index');
        Route::get('/siswa/{siswa}','SiswaController@show')->name('siswa.show');
        Route::patch('/siswa/{siswa}','SiswaController@update')->name('siswa.update');
        Route::delete('/siswa/{siswa}','SiswaController@destroy')->name('siswa.destroy');
        Route::resource('rekomendasi', 'RekomendasiController');
    });
});

// ini Route Konsep Repository
Route::resource('kecamatans', 'Admin\\KecamatanController')->middleware('admin');
Route::resource('kotas', 'Admin\\KotaController')->middleware('admin');

Auth::routes();

Route::get('/home', 'SiswaController@create')->name('home');
Route::post('/siswa/store','SiswaController@store')->name('siswa.store');
Route::get('/dashboard', 'HomeController@dashboard');
