<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class HorariosController extends Controller
{
    public function index()
    {
    	$mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
        	$semestre=2;
        }
        $year = date("y")+2000; 
     	$busqueda1 = "SELECT a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso AND a.semestre =".$semestre." AND a.anio = ".$year." order by d.id_curso ASC";
    	$cursos = DB::SELECT($busqueda1);
    	return view('Curso.horarios',compact('cursos'));
    }
}
