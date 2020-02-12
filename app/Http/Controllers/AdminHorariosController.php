<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;

class AdminHorariosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function semestre($mes)
    {
                $semestre =1;
        if($mes==6) 
        {
            $semestre=2;
        }else if($mes<12)
        {
            $semestre= 3;
        }else
        {
            $semestre = 4;
        }

        return $semestre;
    }

    public function indexFinal()
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $mes = date("m"); 
        $semestre = SELF::semestre($mes);
        $year = date("Y"); 


        $busqued1 = "SELECT curso, seccion, horario, edificio, salon from Examen where semestre = ".$semestre." AND a.anio = ".$year." AND tipo = 0";
        $busqueda1 = "SELECT a.id_clase as id, a.semestre, a.anio, a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  
            FROM Clase a
            LEFT JOIN users b ON a.id_catedratico = b.id
            LEFT JOIN users c ON c.id = a.id
            INNER JOIN Curso d ON d.id_curso = a.id_curso
            WHERE a.semestre = ".$semestre." AND a.anio = ".$year.
            " order by d.id_curso,a.seccion ASC";

        $cursos = DB::SELECT($busqueda1);

        $busqueda1 ="SELECT * FROM users WHERE tipo = 2";
        $auxs = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
        $cursos2 = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id, Nombre FROM users WHERE tipo > 3;";
        $cat = DB::SELECT($busqueda1);

        if(Session::has('msg'))
        {
            $msg = Session::get('msg');
            Session::forget('msg');
            return view('Admin.horario_examenes',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg'));
        }
        if(Session::has('msg2'))
        {
            $msg2 = Session::get('msg2');
            Session::forget('msg2');
            return view('Admin.horario_examenes',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg2'));
        }

        return view('Admin.horario_examenes',compact('id2','clases','type','news','cursos','auxs','cursos2','cat'));
    }

    public function indexRetra1() {}

    public function indexRetra2() {}
}
