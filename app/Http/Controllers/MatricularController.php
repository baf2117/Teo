<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
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
        $activo = Session::get('activo');

        if($activo==0)
        {
            $id2 =Session::get('id2');
            $type =Session::get('tipo');
            $clases =Session::get('clases');
            $news =Session::get('news');
            $activis = Session::get('activis');
            return view('inicio',compact('id2','clases','type','news','activis'));
        }

		$mes = date("m"); 
        $semestre = AdminController::semestre($mes);
        $year = date("Y");

		$busqueda1 = "SELECT 
                        a.seccion, 
                        a.Edificio, 
                        a.salon, 
                        a.horario, 
                        b.Nombre AS Catedratico,
                        c.Nombre AS auxiliar, 
                        d.Nombre AS curso,
                        a.id_clase AS id_curso  
                        FROM Clase a
                        LEFT JOIN users b ON b.id = a.id_catedratico
                        LEFT JOIN users c ON c.id = a.id
                        INNER JOIN Curso d ON d.id_curso = a.id_curso
                        WHERE a.semestre = ".$semestre." AND a.anio = ".$year.
                        " ORDER BY d.id_curso, a.seccion ASC";

		$cursos = DB::SELECT($busqueda1);
		$busqueda1 = "SELECT id_clase,id FROM Alumno_Clase WHERE id = ".$id2.";";
		$clases_asig = DB::SELECT($busqueda1);
		return view('matricular',compact('id2','clases','type','news','cursos','clases_asig'));
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

        $mes = date("m"); 
        $semestre = AdminController::semestre($mes);
        $year = date("Y");

		if(sizeof($verificar)>0)
		{
			$msg ="Ya se ha registrado en esta clase";
			return view('inicio',compact('id2','clases','type','news','activis','msg'));
		}

		$sql = "SELECT B.id_curso FROM Clase A, Curso B Where A.id_curso = B.id_curso AND A.id_clase = ".$clase.";";
		$curso = DB::SELECT($sql);
		$curso2 = $curso[0]->id_curso;
		$sql = "SELECT * FROM Alumno_Clase A, Clase B, Curso  C WHERE A.id = ".$id2." AND B.semestre = ".$semestre." AND B.anio = ".$year." AND  B.id_clase = A.id_clase AND C.id_curso = B.id_curso AND C.id_curso = ".$curso2.";";

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

		foreach ($actividades as $key => $value) 
        {
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
                LEFT JOIN users D ON D.id = B.id_catedratico
                LEFT JOIN users E ON E.id = B.id
                WHERE A.id=".$id2." AND B.semestre = ".$semestre." AND B.anio = ".$year.";";

		$clases = DB::SELECT($consultaClases);              
		$request->session()->put('clases', $clases);

		$consNoticias = "SELECT C.id_noticia as IdNoticia, D.Nombre as Clase, B.seccion as Seccion, C.Titulo as Titulo, C.Fecha, E.Nombre as Nombre
                                    FROM Alumno_Clase A
                                    INNER JOIN Clase B ON A.id_clase = B.id_clase
                                    INNER JOIN Noticia C ON C.id_clase = B.id_clase
                                    INNER JOIN Curso D ON D.id_curso = B.id_curso
                                    INNER JOIN users E ON E.id = C.id
                                    WHERE A.id=".$id2. " AND B.semestre = ".$semestre." AND B.anio = ".$year.
                                    " ORDER BY C.Fecha Desc LIMIT 5";

         $news = DB::SELECT($consNoticias);
         $request->session()->put('news', $news);
         $consActividad = "SELECT *, CASE
                                            WHEN Mes = 1 THEN \"Ene\"
                                            WHEN Mes = 2 THEN \"Feb\"
                                            WHEN Mes = 3 THEN \"Mar\"
                                            WHEN Mes = 4 THEN \"Abr\"
                                            WHEN Mes = 5 THEN \"May\"
                                            WHEN Mes = 6 THEN \"Jun\"
                                            WHEN Mes = 7 THEN \"Jul\"
                                            WHEN Mes = 8 THEN \"Ago\"
                                            WHEN Mes = 9 THEN \"Sep\"
                                            WHEN Mes = 10 THEN \"Oct\"
                                            WHEN Mes = 11 THEN \"Nov\"
                                            WHEN Mes = 12 THEN \"Dic\"
                                        END as Mesfin
                                        FROM(SELECT D.Nombre as Clase, B.seccion as Seccion, C.Nombre as Actividad, C.Fecha as Fecha, DAY(C.Fecha) as Dia, MONTH(C.Fecha) as Mes FROM Alumno_Clase A
                                            INNER JOIN Clase B ON A.id_clase = B.id_clase
                                            INNER JOIN Curso D ON D.id_curso = B.id_curso
                                            INNER JOIN Actividad C ON B.id_clase = C.id_clase
                                            WHERE Fecha >= DATE_ADD(NOW(), INTERVAL -1 DAY) AND A.id=".$id2." ORDER BY C.Fecha Asc) q";
            $index = 0;
            $dia = date("d"); 
            $mes = date("m");            
            $activis2 = array();
            $activis = DB::SELECT($consActividad); 

            foreach ($activis as $key => $item) 
            {
                $evento =  (object)array(); 
                $nombrecurso = $item->Clase." ".$item->Seccion;
                $iniciales = explode(" ", $nombrecurso);
                $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];
                $evento->clase = $nombrecurso;
                $evento->titulo = $item->Actividad;
                $difm = $item->Mes - $mes;
                $aviso ="";                
                if($difm==0)
                {
                    $difd = $item->Dia - $dia;
                    switch($difd) 
                    {
                        case 0:
                            $aviso = "Hoy";
                            break;
                        case 1:
                            $aviso = "Mañana";
                            break;
                        default:
                            $aviso = "En ".$difd." días";
                            break;
                    }
                    if($difd>=7)
                    {
                       $semana = date("W");
                       $semana2 = date("W",mktime(0,0,0,$item->Mes,$item->Dia,date("y")));
                       $difsem = $semana2 -$semana;
                       switch ($difsem) {
                           case 1:
                               $aviso = "Próxima Semana";
                               break;  
                           case 2:
                               $aviso = "En dos Semanas";
                               break;  
                           case 3:
                               $aviso = "En tres Semanas";
                               break;                           
                       }
                    }
                }
                else
                {
                    if($difm==1)
                    {
                        $difd=0;
                        switch($mes) 
                        {
                            case 1:
                            case 3:
                            case 5:
                            case 7:
                            case 8:
                            case 10:
                            case 12:
                                $difd = ($item->Dia+31) - $dia;
                                break;
                            case 2:
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                $difd = ($item->Dia+30) - $dia;
                                break;
                            default:
                                $difd = ($item->Dia+28) - $dia;
                                break;
                        }
                         switch($difd) 
                        {
                            case 0:
                                $aviso = "Hoy";
                                break;
                            case 1:
                                $aviso = "Mañana";
                                break;
                            default:
                                $aviso = "En ".$difd." días";
                                break;
                        }
                        if($difd>=7)
                        {
                           $semana = date("W");
                           $semana2 = date("W",mktime(0,0,0,$item->Mes,$item->Dia,date("y")));
                           $difsem = $semana2 -$semana;
                           switch ($difsem) {
                               case 1:
                                   $aviso = "Próxima Semana";
                                   break;  
                               case 2:
                                   $aviso = "En dos Semanas";
                                   break;  
                               case 3:
                                   $aviso = "En tres Semanas";
                                   break;                           
                           }
                        }
                    }
                }
                $evento->aviso = $aviso;
                array_push($activis2, $evento);
            }

        $request->session()->put('activis', $activis);
        $request->session()->put('activis2',$activis2);
		return view('inicio',compact('id2','clases','type','news','activis'));
	}

	public function desmatricularse(Request $request)
	{
		$id2 =Session::get('id2');
		$clase = $request->id_clase;
		$id2 =Session::get('id2');
		$type =Session::get('tipo');
		$clases =Session::get('clases');
		$activis = Session::get('activis');
		$sql = "DELETE FROM Alumno_Clase WHERE id = ".$id2." AND id_clase = ".$clase.";";
		DB::DELETE($sql);
		DB::COMMIT();
		$sql = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$clase.";";
		$actividades = DB::SELECT($sql);
		
		$mes = date("m"); 
        	$semestre = AdminController::semestre($mes);
        	$year = date("Y");
		
		foreach ($actividades as $key => $value) 
        {
			$sql = "DELETE FROM Alumno_Actividad WHERE id = ".$id2." AND id_actividad = ".$value->id_actividad.";";
			DB::DELETE($sql);
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
				WHERE A.id=".$id2." AND B.semestre = ".$semestre." AND B.anio = ".$year.";";

		$clases = DB::SELECT($consultaClases);              
		$request->session()->put('clases', $clases);
		$consNoticias = "SELECT C.id_noticia as IdNoticia, D.Nombre as Clase, B.seccion as Seccion, C.Titulo as Titulo, C.Fecha, E.Nombre as Nombre
                                    FROM Alumno_Clase A
                                    INNER JOIN Clase B ON A.id_clase = B.id_clase
                                    INNER JOIN Noticia C ON C.id_clase = B.id_clase
                                    INNER JOIN Curso D ON D.id_curso = B.id_curso
                                    INNER JOIN users E ON E.id = C.id
                                    WHERE A.id=".$id2." AND B.semestre = ".$semestre." AND B.anio = ".$year.
                                    " ORDER BY C.Fecha Desc LIMIT 5";

         $news = DB::SELECT($consNoticias);
         $request->session()->put('news', $news);
         $consActividad = "SELECT *, CASE
                                            WHEN Mes = 1 THEN \"Ene\"
                                            WHEN Mes = 2 THEN \"Feb\"
                                            WHEN Mes = 3 THEN \"Mar\"
                                            WHEN Mes = 4 THEN \"Abr\"
                                            WHEN Mes = 5 THEN \"May\"
                                            WHEN Mes = 6 THEN \"Jun\"
                                            WHEN Mes = 7 THEN \"Jul\"
                                            WHEN Mes = 8 THEN \"Ago\"
                                            WHEN Mes = 9 THEN \"Sep\"
                                            WHEN Mes = 10 THEN \"Oct\"
                                            WHEN Mes = 11 THEN \"Nov\"
                                            WHEN Mes = 12 THEN \"Dic\"
                                        END as Mesfin
                                        FROM(SELECT D.Nombre as Clase, B.seccion as Seccion, C.Nombre as Actividad, C.Fecha as Fecha, DAY(C.Fecha) as Dia, MONTH(C.Fecha) as Mes FROM Alumno_Clase A
                                            INNER JOIN Clase B ON A.id_clase = B.id_clase
                                            INNER JOIN Curso D ON D.id_curso = B.id_curso
                                            INNER JOIN Actividad C ON B.id_clase = C.id_clase
                                            WHERE Fecha >= DATE_ADD(NOW(), INTERVAL -1 DAY) AND A.id=".$id2." ORDER BY C.Fecha Asc) q";
            $index = 0;
            $dia = date("d"); 
            $mes = date("m");            
            $activis2 = array();
            $activis = DB::SELECT($consActividad);  
            foreach ($activis as $key => $item) 
            {
                $evento =  (object)array(); 
                $nombrecurso = $item->Clase." ".$item->Seccion;
                $iniciales = explode(" ", $nombrecurso);
                $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];
                $evento->clase = $nombrecurso;
                $evento->titulo = $item->Actividad;
                $difm = $item->Mes - $mes;
                $aviso ="";                
                if($difm==0)
                {
                    $difd = $item->Dia - $dia;
                    switch($difd) 
                    {
                        case 0:
                            $aviso = "Hoy";
                            break;
                        case 1:
                            $aviso = "Mañana";
                            break;
                        default:
                            $aviso = "En ".$difd." días";
                            break;
                    }
                    if($difd>=7)
                    {
                       $semana = date("W");
                       $semana2 = date("W",mktime(0,0,0,$item->Mes,$item->Dia,date("y")));
                       $difsem = $semana2 -$semana;
                       switch ($difsem) {
                           case 1:
                               $aviso = "Próxima Semana";
                               break;  
                           case 2:
                               $aviso = "En dos Semanas";
                               break;  
                           case 3:
                               $aviso = "En tres Semanas";
                               break;                           
                       }
                    }
                }
                else
                {
                    if($difm==1)
                    {
                        $difd=0;
                        switch($mes) 
                        {
                            case 1:
                            case 3:
                            case 5:
                            case 7:
                            case 8:
                            case 10:
                            case 12:
                                $difd = ($item->Dia+31) - $dia;
                                break;
                            case 2:
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                $difd = ($item->Dia+30) - $dia;
                                break;
                            default:
                                $difd = ($item->Dia+28) - $dia;
                                break;
                        }
                         switch($difd) 
                        {
                            case 0:
                                $aviso = "Hoy";
                                break;
                            case 1:
                                $aviso = "Mañana";
                                break;
                            default:
                                $aviso = "En ".$difd." días";
                                break;
                        }
                        if($difd>=7)
                        {
                           $semana = date("W");
                           $semana2 = date("W",mktime(0,0,0,$item->Mes,$item->Dia,date("y")));
                           $difsem = $semana2 -$semana;
                           switch ($difsem) {
                               case 1:
                                   $aviso = "Próxima Semana";
                                   break;  
                               case 2:
                                   $aviso = "En dos Semanas";
                                   break;  
                               case 3:
                                   $aviso = "En tres Semanas";
                                   break;                           
                           }
                        }
                    }
                }
                $evento->aviso = $aviso;
                array_push($activis2, $evento);
            }

        $request->session()->put('activis', $activis);
        $request->session()->put('activis2',$activis2);
		return view('inicio',compact('id2','clases','type','news','activis'));
	}
}
