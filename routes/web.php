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
    return view('layout.computer-layout'); //metodo get direttamente supportato dal html
});

Route::resource('com', "ComputerController"); //metodo delete lavora con delete che  non è direttamente supportato dal html, dobbiamo per forza passare per il form di laravel
