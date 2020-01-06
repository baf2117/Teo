<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Session;
use DB;

class HorariosController extends Controller
{
    public function index()
    {
    	$mes = date("m"); 
        $semestre = AdminController::semestre($mes);
        $year = date("Y");
        
        $busqueda1 = "SELECT 
                        a.seccion, 
                        a.Edificio, 
                        a.salon, 
                        a.horario, 
                        b.Nombre as Catedratico,
                        c.Nombre as auxiliar, 
                        d.Nombre as curso, 
                        d.id_curso  
                        FROM Clase a
                        LEFT JOIN users b ON b.id = a.id_catedratico
                        LEFT JOIN users c ON a.id = c.id
                        INNER JOIN Curso d ON d.id_curso = a.id_curso
                        WHERE a.semestre =".$semestre." AND a.anio = ".$year." order by d.id_curso,a.seccion ASC";
                        
    	$cursos = DB::SELECT($busqueda1);
    	return view('Curso.horarios',compact('cursos'));
    }
}
