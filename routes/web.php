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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tr/detalhar/{id}', 'TrController@detalhar')->name('tr.detalhar');
Route::get('/compras/detalhar/{id}', 'CompraController@detalhar')->name('compras.detalhar');

Route::resource('/superintendencia', 'SuperintendenciaController');
Route::resource('/setor', 'SetorController');
Route::resource('/tr', 'TrController');
Route::resource('/compras', 'CompraController');
