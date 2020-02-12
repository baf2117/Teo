<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Http\Controllers\AdminController;

class AlumnoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('alum');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id2 =Session::get('id2');
        $idcurso=$request->idcurso;
        $request->session()->put('idcurso', $idcurso);
        $nombrecurso = $request->nombre;
        $iniciales = explode(" ", $nombrecurso);
        $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];
        $request->session()->put('nombrecurso', $nombrecurso);

        $sentencia = "SELECT * FROM Actividad WHERE Ponderada = 1 AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $sentencia = "SELECT a.Nombre as actividad, b.Nota, a.Tipo,a.Ponderacion FROM Actividad a, Alumno_Actividad b WHERE a.Ponderada = 1 AND a.id_clase =".$idcurso." AND b.id_actividad = a.id_actividad AND b.id =".$id2.";";

        
        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";                                                                                                                                    

        $notas = DB::select($sentencia);
         for ($i=0; $i < sizeof($notas) ; $i++) { 
            if($notas[$i]->Tipo=="Tema de examen" || $notas[$i]->Tipo=="Tema de parcial" || $notas[$i]->Tipo=="Final")
           {
                $notas[$i]->Ponderacion=0;
           }
        }
        $parciales = DB::select($sentencia2);
        return view('Alumno.Notas',compact('id2','clases','type','actividades','idcurso','notas','nombrecurso','parciales'));
    }

    public function index2(Request $request)
    {
        $id2 =Session::get('id2');
        $idcurso=$request->idcurso;
        $request->session()->put('idcurso', $idcurso);
        $nombrecurso =Session::get('nombrecurso');  

        $sentencia = "SELECT * FROM Actividad WHERE Ponderada = 1 AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $sentencia = "SELECT a.Nombre as actividad, b.Nota, a.Tipo,a.Ponderacion FROM Actividad a, Alumno_Actividad b WHERE a.Ponderada = 1 AND a.id_clase =".$idcurso." AND b.id_actividad = a.id_actividad AND b.id =".$id2.";";


        
        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";                                                                                                                                    

        $notas = DB::select($sentencia);
         for ($i=0; $i < sizeof($notas) ; $i++) { 
            if($notas[$i]->Tipo=="Tema de examen" || $notas[$i]->Tipo=="Tema de parcial" || $notas[$i]->Tipo=="Final")
           {
                $notas[$i]->Ponderacion=0;
           }
        }
        $parciales = DB::select($sentencia2);
        return view('Alumno.Notas',compact('id2','clases','type','actividades','idcurso','notas','nombrecurso','parciales'));
    }


     public function recursos(Request $request)
    {
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso');  

        $sentencia = "SELECT * FROM Recursos WHERE id_clase =".$idcurso."  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases'); 
        return view('Alumno.recursos',compact('id2','clases','type','idcurso','recursos','nombrecurso'));
    }

    public function descargar(Request $request)
    {
        $idcurso=$request->idcurso;
        $idrecurso = $request->idrecurso;
        $storage_path = storage_path();
        $url = $storage_path.'/app/storage/'.$idrecurso;

        header ("Content-Disposition: attachment; filename=".$idrecurso); 
        header ("Content-Type: application/octet-stream"); 
        header ("Content-Length: ".filesize($url)); 
        readfile($url); 

        $sentencia = "SELECT * FROM Recursos WHERE id_clase =".$idcurso."  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $nombrecurso =Session::get('nombrecurso');  
        return view('Alumno.recursos',compact('id2','clases','type','idcurso','recursos','nombrecurso'));
    }
    
}
