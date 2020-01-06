<?php

use Illuminate\Http\Request;

//Auxiliar

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
Route::post('/curso/eliminarRecurso', 'CursoController@eliminarRecurso')->name('curso.eliminarRecurso');
Route::post('/curso/eliminarEstudiante', 'CursoController@eliminarEstudiante')->name('curso.eliminarEstudiante');
Route::get('/curso/pruebacorreo','CursoController@pruebacorreo')->name('curso.pruebacorreo');
Route::post('/save/notas', 'CursoController@save')->name('save.notas');
Route::post('/save/notas/parcial', 'EstadisticasController@saveparcial')->name('save.notas.parcial');
Route::post('/curso/ponderacion', 'CursoController@guardarPonderacion')->name('curso.guardarPonderacion');
Route::post('/curso/descargarListado', 'CursoController@descargarListado')->name('curso.descargarListado');
Route::post('/curso/descargarNotas', 'CursoController@descargarNotas')->name('curso.descargarNotas');
Route::post('/estadisticas/parcial', 'EstadisticasController@parcial')->name('estadistica.parcial');

Route::post('/actividad', 'CursoController@registro_act')->name('actividad.registro');
Route::post('/actividad/edit', 'CursoController@edit_act')->name('actividad.edit');

Route::get('/noticia', 'NoticiasController@index')->name('noticia');
Route::post('/noticia/crear', 'NoticiasController@crear')->name('noticia.crear');
Route::post('/save/mensaje', 'NoticiasController@save')->name('save.mensaje');

Route::post('/estadistica', 'EstadisticasController@inicio')->name('estadistica');
Route::get('/estadistica', 'EstadisticasController@inicio2')->name('estadistica2');
Route::post('/estadistica/generacion', 'EstadisticasController@generacion')->name('estadistica.generacion');
Route::post('/estadistica/descarga', 'EstadisticasController@descarga')->name('estadistica.descarga');
Route::post('/estadistica/envio', 'EstadisticasController@envio')->name('estadistica.envio');
Route::post('/estadistica/actividad', 'EstadisticasController@crear')->name('estadistica.crear');

//Admin
Route::get('/admin/carga', 'AdminController@carga')->name('admin.carga');
Route::post('/admin/carga', 'AdminController@carga')->name('admin.carga');
Route::post('/admin/cargamasiva', 'AdminController@cargamasiva')->name('admin.cargamasiva');

Route::get('/admin/aux', 'AdminController@index')->name('admin.aux');
Route::post('/admin/aux', 'AdminController@index')->name('admin.aux');
Route::post('/admin/clase/crear', 'AdminController@clasecrear')->name('clase.crear');
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

Route::post('/matricular/activar', 'AdminController@activar')->name('activar.matricular');

//Alumno
Route::post('/alumno/notas', 'AlumnoController@index')->name('alumno.notas');
Route::post('/alumno/notas2', 'AlumnoController@index2')->name('alumno.notas2');
Route::post('/alumno/recursos', 'AlumnoController@recursos')->name('alumno.recursos');
Route::post('/alumno/descarga', 'AlumnoController@descargar')->name('alumno.descargar');

Route::get('/matricular', 'MatricularController@index')->name('matricular');
Route::post('/matricularse', 'MatricularController@matricularse')->name('matricularse');
Route::post('/desmatricularse', 'MatricularController@desmatricularse')->name('desmatricularse');

//General

Route::post('/mail/send', 'MailController@send')->name('recuperar');
Route::post('/registro', 'RegistroController@crearUsuario')->name('registro.crearUsuario');

Route::get('/registro', function () {
    return view('registro');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('inicio', 'HomeController@index')->name('inicio');

Route::get('/horarios', 'HorariosController@index')->name('horarios');
Route::get('/horarios_', 'Horarios2Controller@index')->name('horarios_');

Route::post('/perfil', 'PerfilController@index')->name('perfil');
Route::post('/perfil/save', 'PerfilController@save')->name('perfil.save');

Route::post('/permisos', 'PermisosController@index')->name('permisos');
Route::post('/permisos/edit', 'PermisosController@edit')->name('permisos.edit');

Route::get('/nosotros/historia', 'HistoriaController@show')->name('nosotros.historia');

Route::get('/nosotros/objetivos', 'ObjetivosController@show')->name('nosotros.objetivos');

Route::get('/nosotros/misvis', 'MisvisController@show')->name('nosotros.misvis');

Route::get('/enlaces', 'EnlacesController@show')->name('enlaces');

Route::get('/nosotros/equipo', 'EquipoController@show')->name('nosotros.equipo');

// Recursos

Route::get('/admin/recursos', 'RecursosPublicosController@recursos')->name('admin.recursos');
Route::post('/admin/guardarrecurso', 'RecursosPublicosController@guardarrecurso')->name('admin.guardarrecurso');
Route::post('/admin/descargar', 'RecursosPublicosController@descargar')->name('admin.descargar');
Route::post('/admin/eliminar', 'RecursosPublicosController@eliminarRecurso')->name('admin.eliminarRecurso');

Route::get('/admin/carga_examenes', 'AdminHorariosController@indexFinal')->name('admin.carga_examenes');
Route::get('/admin/carga_primera_retra', 'AdminHorariosController@indexRetra1')->name('admin.carga_primera_retra');
Route::get('/admin/carga_segunda_retra', 'AdminHorariosController@indexRetra2')->name('admin.carga_segunda_retra');

Route::get('/Recursos', 'PublicoController@index')->name('recursos.publicos');

Route::post('/Recursos/descarga', 'PublicoController@descargar')->name('recursos.descargar');