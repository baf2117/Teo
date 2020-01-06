<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Session;
use DB;

class Horarios2Controller extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $mes = date("m"); 
        $semestre = AdminController::semestre($mes);
        $year = date("Y");

        $busqueda1 = "SELECT a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso AND a.semestre =".$semestre." AND a.anio = ".$year." order by d.id_curso, a.seccion ASC";
    	$cursos = DB::SELECT($busqueda1);
        return view('Curso.horarios_',compact('id2','clases','type','news','cursos'));
    }
}
