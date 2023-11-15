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

Route::get('/', 'App\Http\Controllers\PengaduanController@index')->name('index');

Route::post('register','App\Http\Controllers\PengaduanController@register');

Route::post('login','App\Http\Controllers\PengaduanController@login')->middleware('guest');

Route::get('/logout','App\Http\Controllers\PengaduanController@logout');

Route::middleware('auth:web')->get('/home', 'App\Http\Controllers\PengaduanController@home');

Route::middleware('auth:admin')->get('/adminIndex', 'App\Http\Controllers\PengaduanController@admin');

Route::middleware('auth:admin')->get('/petugasIndex', 'App\Http\Controllers\PengaduanController@petugas');

Route::middleware('auth:web')->get('/pengaduan', 'App\Http\Controllers\PengaduanController@pengaduan');

Route::middleware('auth:web')->get('/riwayat/{id}', 'App\Http\Controllers\PengaduanController@riwayat');

Route::middleware('auth:web')->get('/profil', 'App\Http\Controllers\PengaduanController@profil');

Route::middleware('auth:web')->post('edit-profil/{id}/{username}', 'App\Http\Controllers\PengaduanController@edit_profil');

Route::middleware('auth:admin')->get('/pengaduanA','App\Http\Controllers\PengaduanController@petugasPengaduan');

Route::middleware('auth:admin')->get('/akunA', 'App\Http\Controllers\PengaduanController@akunPetugas');

Route::middleware('auth:admin')->post('/konfirmasi-akun', 'App\Http\Controllers\PengaduanController@konfirmasi_akun');

Route::middleware('auth:admin')->post('memberikan_tanggapan','App\Http\Controllers\PengaduanController@memberikan_tanggapan');

Route::middleware('auth:web')->post('/arsip-laporan/{id}/{nik}','App\Http\Controllers\PengaduanController@arsip_tanggapan');

Route::middleware('auth:web')->get('/arsip/{nik}','App\Http\Controllers\PengaduanController@arsipUser');

Route::middleware('auth:web')->post('kirim-pengaduan','App\Http\Controllers\PengaduanController@kirim_pengaduan');

Route::middleware('auth:admin')->post('/tolak-akun/{nik}','App\Http\Controllers\PengaduanController@tolak_akun');