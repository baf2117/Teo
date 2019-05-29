<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class MatricularController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('alum');
	}

	public function index()
	{
		$id2 =Session::get('id2');
		$type =Session::get('tipo');
		$clases =Session::get('clases');
		$news =Session::get('news');

		$mes = date("m"); 
		$semestre =1;
		if($mes>6)
		{
			$semestre=2;
		}
		$year = date("y")+2000; 

		$busqueda1 = "SELECT a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, a.id_clase as id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso AND a.semestre =".$semestre." AND a.anio = ".$year." order by d.id_curso, a.seccion ASC";
		$cursos = DB::SELECT($busqueda1);

		return view('matricular',compact('id2','clases','type','news','cursos'));
	}

	public function matricularse(Request $request)
	{
		$id2 =Session::get('id2');
		$clase = $request->id_clase;

		$id2 =Session::get('id2');
		$type =Session::get('tipo');
		$clases =Session::get('clases');
		$news =Session::get('news');
		$activis = Session::get('activis');

		$sql = "SELECT * FROM Alumno_Clase WHERE id = ".$id2." AND id_clase = ".$clase.";";

		$verificar = DB::SELECT($sql);

		if(sizeof($verificar)>0)
		{
			$msg ="Ya se ha registrado en esta clase";
			return view('inicio',compact('id2','clases','type','news','activis','msg'));
		}

		$sql = "SELECT B.id_curso FROM Clase A, Curso B Where A.id_curso = B.id_curso AND A.id_clase = ".$clase.";";

		$curso = DB::SELECT($sql);

		$curso2 = $curso[0]->id_curso;

		$sql = "SELECT * FROM Alumno_Clase A, Clase B, Curso  C WHERE A.id = ".$id2." AND B.id_clase = A.id_clase AND C.id_curso = B.id_curso AND C.id_curso = ".$curso2.";";

		$verificar = DB::SELECT($sql);

		if(sizeof($verificar)>0)
		{
			$msg ="Ya se ha registrado en otra sección de este curso";
			return view('inicio',compact('id2','clases','type','news','activis','msg'));
		}

		$sql = "INSERT INTO Alumno_Clase (Asignado, id, id_clase) VALUES (0, ".$id2.", ".$clase.");";

		DB::INSERT($sql);
		DB::COMMIT();

		$sql = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$clase.";";
		$actividades = DB::SELECT($sql);

		foreach ($actividades as $key => $value) {
			$sql = "INSERT INTO Alumno_Actividad (Nota,id,id_actividad) VALUES (0,".$id2.",".$value->id_actividad.");";
			DB::INSERT($sql);
			DB::COMMIT();
		}

		$consultaClases = "SELECT 
				B.id_clase AS IdClase,
				C.Nombre AS NombreClase, 
				B.seccion AS Seccion, 
				B.Edificio AS Edificio, 
				B.salon AS Salon, 
				B.horario AS horario, 
				D.Nombre as Catedratico,
				E.Nombre as auxiliar 
				FROM 
				Alumno_Clase A INNER JOIN Clase B ON A.id_clase = B.id_clase 
				INNER JOIN Curso C ON C.id_curso = B.id_curso 
				INNER JOIN Catedratico D ON D.id_catedratico = B.id_catedratico 
				INNER JOIN users E ON E.id = B.id
				WHERE A.id=".$id2.";";

		$clases = DB::SELECT($consultaClases);              
		$request->session()->put('clases', $clases);

		
		return view('inicio',compact('id2','clases','type','news','activis'));
	}
}
