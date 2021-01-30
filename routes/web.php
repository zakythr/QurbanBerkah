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

Route::get("/", "PagesController@home");
Route::get("/pakan", "PagesController@pakan");
Route::resource("hewan", "HewanController");
Route::get("/angsuran", "PagesController@angsuran");
//Route::get("/pengguna", "PagesController@pengguna");
Route::get("/pengguna/{id}", "TransaksiController@perorang");
Route::post("/hewan/{id}", "TransaksiController@beli");
Route::post("/pengguna/{id}", "TransaksiController@konfirmasi");
Route::get('hewan/cicil/{id}', "CicilanController@index");
Route::post('hewan/cicil/{id}', "CicilanController@cicil");
Route::post('/transaksi/{id}/batal', "TransaksiController@batal");
Route::get("/cicilan/{id}", "cicilanController@lihat");

Route::get('angsuran/cicilan1', "PagesController@cicilan1");
Route::get('angsuran/cicilan2', "PagesController@cicilan2");
Route::get('angsuran/cicilan3', "PagesController@cicilan3");
Route::get('angsuran/cicilan4', "PagesController@cicilan4");
Route::get('angsuran/cicilan5', "PagesController@cicilan5");
Route::get('angsuran/cicilan6', "PagesController@cicilan6");
Route::get("angsuran/cicilan1/{tipehewan}/{id}", "cicilanController@beli");
Route::get("angsuran/cicilan2/{tipehewan}/{id}", "cicilanController@beli");
Route::get("angsuran/cicilan3/{tipehewan}/{id}", "cicilanController@beli");
Route::get("angsuran/cicilan4/{tipehewan}/{id}", "cicilanController@beli");
Route::get("angsuran/cicilan5/{tipehewan}/{id}", "cicilanController@beli");
Route::get("angsuran/cicilan6/{tipehewan}/{id}", "cicilanController@beli");
Route::get("angsuran/cicilan/finishcicilan", "cicilanController@index");
Route::post('/cicilan/{id}/batal', "cicilanController@batal");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
