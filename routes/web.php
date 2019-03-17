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

Route::get('/login', function () {
    return view('login');
});

Route::get('/estadistica', function () {
    return view('estadistica');
});

Route::get('/calendario', function () {
    return view('calendar');
});

Route::get('/registro', function () {
    return view('registro');
});


Route::get('/matricular', function () {
    return view('matricular');
});


Route::get('/curso', function () {
    return view('Curso.curso');
});

Route::get('/notas', function () {
    return view('Curso.notas');
});