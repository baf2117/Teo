<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    	$id =Session::get('id2');

    	$busqueda1 = "SELECT a.id_clase,a.id_curso, b.Nombre, a.seccion FROM Clase a, Curso b WHERE a.id =".$id." AND b.id_curso = a.id_curso;";
    	$cursos = DB::SELECT($busqueda1);

    	if(!count($cursos)>0)
    	{
    		return view('Auxiliar.calendar');
    	}
    	$i =0;
    	$actividades;
     	foreach ( $cursos as $valor)
    	{
    		$busqueda2 ="SELECT a.Nombre, a.Fecha, a.id_actividad, b.seccion, c.Nombre as curso from Actividad a, Clase b, Curso c WHERE a.id_clase = ".$valor->id_clase." AND a.id_clase = b.id_clase AND b.id_curso = c.id_curso;";
    		if($i==0)
    		{
    			$actividades = DB::SELECT($busqueda2);
    		}else
    		{
    			$aux = DB::SELECT($busqueda2);
				$actividades = array_merge($actividades,$aux);
    		}
    		$i=1;
    	}
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
       return view('Auxiliar.calendar',compact('actividades','clases','cursos','type'));
    }

    public function registro(Request $request)
    {

    	$nombre = $request->nombre;
    	$fecha = $request->fecha;

    	$fecha2 = explode('/', $fecha);
    	$clase = $request->clase;
    	$ponderada = $request->ponderada;
    	$tipo = $request->tipoa;
    	$puntos = $request->puntos;	
    	$fecha = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];
    	$sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase) VALUES ('".$nombre."', '".$ponderada."', '".$puntos."', '".$fecha."', '".$tipo."', '".$clase."');";
    	
    	DB::insert($sentencia);
    	DB::commit(); 

        $sentencia = "SELECT id FROM Alumno_Clase WHERE id_clase = ".$clase.";";
        $alumnos = DB::SELECT($sentencia);

        $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$clase." AND Nombre = '".$nombre."';";
        $actividad = DB::SELECT($sentencia);
        $id_actividad = $actividad[0]->id_actividad;

        foreach ($alumnos as $key => $item) 
        {
          $sentencia = "INSERT INTO Alumno_Actividad(Nota,id,id_actividad) VALUES (0,".$item->id.",".$id_actividad.");";
          DB::insert($sentencia);
        }

        DB::commit();

    	return redirect()->back();
    }

    public function eliminar(Request $request)
    {
    	$id = $request->actividad;

    	$sentencia = "DELETE FROM Actividad WHERE id_actividad = ".$id.";";
    	DB::delete($sentencia);
    	DB::commit();
    	return redirect()->back();
    }
}
