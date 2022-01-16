<?php

use Illuminate\Support\Facades\Route;

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
//tes
//Route::get('perusahaan/isi_tab_2','PerusahaanController@isi_tab_2')->name('perusahaan.isi_tab_2');

Route::get('/', function () {
    return view('welcome');
});
Route::resource('obrik','ObrikController');
Route::post('obrik/isi_tab_1','ObrikController@isi_tab_1')->name('obrik.isi_tab_1');
Route::post('obrik/isi_tab_2','ObrikController@isi_tab_2')->name('obrik.isi_tab_2');
Route::post('obrik/isi_tab_3','ObrikController@isi_tab_3')->name('obrik.isi_tab_3');
Route::post('obrik/isi_tab_4','ObrikController@isi_tab_4')->name('obrik.isi_tab_4');
Route::post('obrik/isi_tab_5','ObrikController@isi_tab_5')->name('obrik.isi_tab_5');
Route::post('obrik/isi_tab_6','ObrikController@isi_tab_6')->name('obrik.isi_tab_6');
Route::post('obrik/isi_tab_7','ObrikController@isi_tab_7')->name('obrik.isi_tab_7');
Route::post('obrik/tambahPersonil','ObrikController@tambahPersonil')->name('obrik.tambahPersonil');
Route::post('obrik/siapRealisasiProgram','ObrikController@siapRealisasiProgram')->name('obrik.siapRealisasiProgram');
Route::post('obrik/updateRealisasiProgram','ObrikController@updateRealisasiProgram')->name('obrik.updateRealisasiProgram');
Route::post('obrik/simpanHAketua','ObrikController@simpanHAketua')->name('obrik.simpanHAketua');
Route::post('obrik/simpanHAanggota','ObrikController@simpanHAanggota')->name('obrik.simpanHAanggota');
Route::post('obrik/tambahProgram','ObrikController@tambahProgram')->name('obrik.tambahProgram');
Route::post('obrik/simpanNoKartuPenugasan','ObrikController@simpanNoKartuPenugasan')->name('obrik.simpanNoKartuPenugasan');
Route::post('obrik/tambahSupervisi','ObrikController@tambahSupervisi')->name('obrik.tambahSupervisi');
Route::get('obrik/km1/{id}', 'ObrikController@km1');
Route::get('obrik/km2/{id}', 'ObrikController@km2');
Route::get('obrik/km3/{id}', 'ObrikController@km3');
Route::get('obrik/km4/{id}', 'ObrikController@km4');
//tes
