<?php

use Illuminate\Http\Request;
//use Session;
//use DB;

Route::get('/registro', function () {
    return view('registro');
});

Route::post('/registro', 'RegistroController@crearUsuario')->name('registro.crearUsuario');

Route::get('/matricular', 'MatricularController@index')->name('matricular');

Route::post('/matricularse', 'MatricularController@matricularse')->name('matricularse');

Route::get('/graficas', function () {
    return view('Reportes.graficas'); 
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('inicio', 'HomeController@index')->name('inicio');

Route::get('/calendario', 'CalendarController@index')->name('calendar');

Route::post('/calendario', 'CalendarController@registro')->name('calendar.registro');
Route::post('/calendario/eliminar', 'CalendarController@eliminar')->name('calendar.eliminar');

Route::post('/curso', 'CursoController@listado')->name('curso.listado');
Route::post('/curso/listado2', 'CursoController@listado2')->name('curso.listado2');
Route::get('/curso', 'CursoController@listado2')->name('curso.listado3');

Route::post('/curso/notas', 'CursoController@notas')->name('curso.notas');
Route::get('/curso/notas', 'CursoController@notas2')->name('curso.notas2');

Route::post('/curso/carga', 'CursoController@carga')->name('curso.carga');
Route::post('/curso/plantilla', 'CursoController@plantilla')->name('curso.plantilla');
Route::post('/curso/cargamasiva', 'CursoController@cargamasiva')->name('curso.cargamasiva');
Route::post('/curso/recursos', 'CursoController@recursos')->name('curso.recursos');
Route::post('/curso/guardarrecurso', 'CursoController@guardarrecurso')->name('curso.guardarrecurso');
Route::post('/curso/descargar', 'CursoController@descargar')->name('curso.descargar');

Route::get('/curso/pruebacorreo','CursoController@pruebacorreo')->name('curso.pruebacorreo');

Route::post('/save/notas', 'CursoController@save')->name('save.notas');

Route::post('/actividad', 'CursoController@registro_act')->name('actividad.registro');

Route::get('/estadistica', 'EstadisticasController@index')->name('estadistica');

Route::get('/horarios', 'HorariosController@index')->name('horarios');

Route::get('/horarios_', 'Horarios2Controller@index')->name('horarios_');

Route::get('/noticia', 'NoticiasController@index')->name('horarios');

Route::post('/save/mensaje', 'NoticiasController@save')->name('save.mensaje');


Route::post('/perfil', 'PerfilController@index')->name('perfil');
Route::post('/perfil/save', 'PerfilController@save')->name('perfil.save');

Route::get('/admin/aux', 'AdminController@index')->name('admin.aux');
Route::post('/admin/aux', 'AdminController@index')->name('admin.aux');
Route::post('/admin/aux/asignar', 'AdminController@asignaraux')->name('aux.asignar');
Route::post('/admin/aux/crear', 'AdminController@crearaux')->name('aux.crear');
Route::post('/admin/cat/crear', 'AdminController@crearcat')->name('cat.crear');
Route::post('/admin/curso/edit', 'AdminController@editcurso')->name('curso.edit');
Route::post('/admin/curso/edit2', 'AdminController@editcurso2')->name('curso.edit2');

Route::get('/admin/aux2', 'AdminController@index2')->name('admin.aux2');
Route::post('/admin/aux2', 'AdminController@index2')->name('admin.aux2');

Route::post('/admin/aux/edit', 'AdminController@editaux')->name('aux.edit');
Route::post('/admin/aux/edit2', 'AdminController@editaux2')->name('aux.edit2');
Route::post('/admin/aux/delete', 'AdminController@deleteaux')->name('aux.eliminar');

Route::get('/admin/user', 'AdminController@index3')->name('admin.user');
Route::post('/admin/user', 'AdminController@index3')->name('admin.user');

Route::post('/admin/user/edit', 'AdminController@edituser')->name('user.edit');
Route::post('/admin/user/edit2', 'AdminController@edituser2')->name('user.edit2');
Route::post('/admin/user/delete', 'AdminController@deleteuser')->name('user.eliminar');
Route::post('/admin/user/updgrade', 'AdminController@upgradeuser')->name('user.upgrade');

Route::get('/admin/cat', 'AdminController@index4')->name('admin.cat');
Route::post('/admin/cat', 'AdminController@index4')->name('admin.cat');

Route::post('/admin/cat/edit', 'AdminController@editcat')->name('cat.edit');
Route::post('/admin/cat/edit2', 'AdminController@editcat2')->name('cat.edit2');

Route::post('/estadistica', 'EstadisticasController@inicio')->name('estadistica');
Route::post('/estadistica/generacion', 'EstadisticasController@generacion')->name('estadistica.generacion');
Route::post('/estadistica/descarga', 'EstadisticasController@descarga')->name('estadistica.descarga');

Route::get('/admin/carga', 'AdminController@carga')->name('admin.carga');
Route::post('/admin/carga', 'AdminController@carga')->name('admin.carga');

Route::post('/admin/cargamasiva', 'AdminController@cargamasiva')->name('admin.cargamasiva');

Route::post('/mail/send', 'MailController@send')->name('recuperar');


Route::post('/alumno/notas', 'AlumnoController@index')->name('alumno.notas');

Route::post('/alumno/notas2', 'AlumnoController@index2')->name('alumno.notas2');

Route::post('/alumno/recursos', 'AlumnoController@recursos')->name('alumno.recursos');

Route::post('/alumno/descarga', 'AlumnoController@descargar')->name('alumno.descargar');