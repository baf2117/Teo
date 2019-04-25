<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class EstadisticasController extends Controller
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
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso'); 

        $sentencia = "SELECT  C.Nombre AS NombreClase, B.Nombre as Aux, A.seccion AS Seccion, COUNT(E.id_clase) AS CantAlumnos, D.Nombre as Catedratico 
                                    FROM Clase A, users B, Curso C, Catedratico D, Alumno_Clase E 
                                    WHERE A.id = B.id 
                                    AND C.id_curso = A.id_curso 
                                    AND D.id_catedratico = A.id_catedratico 
                                    AND E.id_clase = A.id_clase AND
                                    WHERE A.id=".$idcurso." GROUP BY C.Nombre, B.Nombre, A.seccion, D.Nombre;";

         //echo $sentencia;
        return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso'));
    }

    public function inicio(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso'); 

        $sentencia = "SELECT C.Nombre AS NombreClase, B.Nombre as Aux, A.seccion AS Seccion, COUNT(E.id_clase) AS CantAlumnos, D.Nombre as Catedratico 
                                    FROM Clase A, users B, Curso C, Catedratico D, Alumno_Clase E 
                                    WHERE A.id = B.id 
                                    AND C.id_curso = A.id_curso 
                                    AND D.id_catedratico = A.id_catedratico 
                                    AND E.id_clase = A.id_clase AND
                                    WHERE A.id=".$idcurso." GROUP BY C.Nombre, B.Nombre, A.seccion, D.Nombre;";

        $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso." AND (Tipo='Parcial' OR Tipo='Final');";                            
        $examenes = DB::select($sentencia2);

        return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes'));
    }

    public function generacion(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso'); 

        $examen = $request->Actividad;
        $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                            FROM Clase A
                            INNER JOIN Curso B ON B.id_curso=A.id_curso
                            INNER JOIN Catedratico C ON C.id_catedratico=A.id_catedratico
                            INNER JOIN users D ON D.id=A.id
                            WHERE A.id_clase=".$idcurso.";";

        $datos = DB::select($sentencia);
        if($datos=='1'){
            $datos[0]->semestre = "Primer";
        }else{
            $datos[0]->semestre = "Segundo";
        }                     

        $sentencia2 = "SELECT Nombre FROM Actividad WHERE id_actividad=".$examen.";";
        $resul = DB::select($sentencia2);
        $nomex = $resul[0]->Nombre;

        $sinscritos = "SELECT COUNT(*) as ninscritos FROM Alumno_Clase WHERE id_clase=".$idcurso.";";
        $inscritos = DB::select($sinscritos);
        
        $sexaminados = "SELECT COUNT(*) as nexaminados FROM Alumno_Actividad WHERE Nota>=0 AND id_actividad=".$examen.";";
        $examinados = DB::select($sexaminados);      

        $saprobados = "SELECT COUNT(*) as naprobados FROM Alumno_Actividad WHERE Nota>=60.5 AND id_actividad=".$examen.";";
        $aprobados = DB::select($saprobados);  

        $porcaproinscri = 0;
        try{
            $porcaproinscri = $aprobados[0]->naprobados/$inscritos[0]->ninscritos*100;
        }catch(Exception $e){
            $porcaproinscri = 0;
        }   

        $porcaproexa = 0;
        try{
            $porcaproexa = $aprobados[0]->naprobados/$examinados[0]->nexaminados*100;
        }catch(Exception $e){
            $porcaproexa = 0;
        }   

        $sreprobados = "SELECT COUNT(*) as nreprobados FROM Alumno_Actividad WHERE Nota<60.5 AND Nota>=0 AND id_actividad=".$examen.";";
        $reprobados = DB::select($sreprobados);  

        $porcrepro = 0;
        try{
            $porcrepro = $reprobados[0]->nreprobados/$examinados[0]->nexaminados*100;
        }catch(Exception $e){
            $porcrepro = 0;
        }

        $sausentes = "SELECT COUNT(*) as nausentes FROM Alumno_Actividad WHERE Nota<0 AND id_actividad=".$examen.";";
        $ausentes = DB::select($sausentes); 

        $porcausentes = 0;
        try{
            $porcausentes = $ausentes[0]->nausentes/$inscritos[0]->ninscritos*100;
        }catch(Exception $e){
            $porcausentes = 0;
        }

        $scero = "SELECT COUNT(*) as ncero FROM Alumno_Actividad WHERE Nota=0 AND id_actividad=".$examen.";";
        $cero = DB::select($scero);

        $spromedio = "SELECT AVG(Nota) as npromedio FROM Alumno_Actividad WHERE Nota>=0 AND id_actividad=".$examen.";";
        $promedio = DB::select($spromedio);

        $sdesv = "SELECT STD(Nota) as ndesv FROM Alumno_Actividad WHERE Nota>=0 AND id_actividad=".$examen.";";
        $desv = DB::select($sdesv);

        $stemaspromedio = "SELECT AVG(A.Nota)/B.Ponderacion*100 as npromedio, B.Nombre as nombre, A.id_actividad as idactividad
                                FROM Alumno_Actividad A 
                                INNER JOIN Actividad B on B.id_actividad=A.id_actividad
                                WHERE A.Nota>=0 AND B.id_actividad_padre=".$examen."
                                GROUP BY nombre, idactividad;";
        $temaspromedio = DB::select($stemaspromedio);        

        return view('Reportes.reporte',compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','examen','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio'));
    }

    public function descarga(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso'); 

        $examen = $request->Actividad;
        $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                            FROM Clase A
                            INNER JOIN Curso B ON B.id_curso=A.id_curso
                            INNER JOIN Catedratico C ON C.id_catedratico=A.id_catedratico
                            INNER JOIN users D ON D.id=A.id
                            WHERE A.id_clase=".$idcurso.";";

        $datos = DB::select($sentencia);
        if($datos=='1'){
            $datos[0]->semestre = "Primer";
        }else{
            $datos[0]->semestre = "Segundo";
        }                     

        $sentencia2 = "SELECT Nombre FROM Actividad WHERE id_actividad=".$examen.";";
        $resul = DB::select($sentencia2);
        $nomex = $resul[0]->Nombre;

        $sinscritos = "SELECT COUNT(*) as ninscritos FROM Alumno_Clase WHERE id_clase=".$idcurso.";";
        $inscritos = DB::select($sinscritos);
        
        $sexaminados = "SELECT COUNT(*) as nexaminados FROM Alumno_Actividad WHERE Nota>=0 AND id_actividad=".$examen.";";
        $examinados = DB::select($sexaminados);      

        $saprobados = "SELECT COUNT(*) as naprobados FROM Alumno_Actividad WHERE Nota>=60.5 AND id_actividad=".$examen.";";
        $aprobados = DB::select($saprobados);  

        $porcaproinscri = 0;
        try{
            $porcaproinscri = $aprobados[0]->naprobados/$inscritos[0]->ninscritos*100;
        }catch(Exception $e){
            $porcaproinscri = 0;
        }   

        $porcaproexa = 0;
        try{
            $porcaproexa = $aprobados[0]->naprobados/$examinados[0]->nexaminados*100;
        }catch(Exception $e){
            $porcaproexa = 0;
        }   

        $sreprobados = "SELECT COUNT(*) as nreprobados FROM Alumno_Actividad WHERE Nota<60.5 AND Nota>=0 AND id_actividad=".$examen.";";
        $reprobados = DB::select($sreprobados);  

        $porcrepro = 0;
        try{
            $porcrepro = $reprobados[0]->nreprobados/$examinados[0]->nexaminados*100;
        }catch(Exception $e){
            $porcrepro = 0;
        }

        $sausentes = "SELECT COUNT(*) as nausentes FROM Alumno_Actividad WHERE Nota<0 AND id_actividad=".$examen.";";
        $ausentes = DB::select($sausentes); 

        $porcausentes = 0;
        try{
            $porcausentes = $ausentes[0]->nausentes/$inscritos[0]->ninscritos*100;
        }catch(Exception $e){
            $porcausentes = 0;
        }

        $scero = "SELECT COUNT(*) as ncero FROM Alumno_Actividad WHERE Nota=0 AND id_actividad=".$examen.";";
        $cero = DB::select($scero);

        $spromedio = "SELECT AVG(Nota) as npromedio FROM Alumno_Actividad WHERE Nota>=0 AND id_actividad=".$examen.";";
        $promedio = DB::select($spromedio);

        $sdesv = "SELECT STD(Nota) as ndesv FROM Alumno_Actividad WHERE Nota>=0 AND id_actividad=".$examen.";";
        $desv = DB::select($sdesv);

        $stemaspromedio = "SELECT AVG(A.Nota)/B.Ponderacion*100 as npromedio, B.Nombre as nombre, A.id_actividad as idactividad
                                FROM Alumno_Actividad A 
                                INNER JOIN Actividad B on B.id_actividad=A.id_actividad
                                WHERE A.Nota>=0 AND B.id_actividad_padre=".$examen."
                                GROUP BY nombre, idactividad;";
        $temaspromedio = DB::select($stemaspromedio);        

        $pdf = \PDF::loadView('Reportes.pdf', compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio'));
        return $pdf->download('Estadistica.pdf');

        return view('Reportes.reporte',compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio'));
    }
}
