<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Felicitacion;

class PermisosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cat');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $idcurso=$request->idcurso;
        $nombrecurso=$request->session()->get('nombrecurso');  

        $query = "SELECT *, CASE
               WHEN Actividad = 1 THEN \"Parcial\"
               WHEN Actividad = 2 THEN \"Tema de examen\"
               WHEN Actividad = 3 THEN \"Revision\"
               WHEN Actividad = 4 THEN \"Final\"
               WHEN Actividad = 5 THEN \"Tarea\"
               WHEN Actividad = 6 THEN \"HT\"
               WHEN Actividad = 7 THEN \"Laboratorio\"
               WHEN Actividad = 8 THEN \"Retrasada\"
               WHEN Actividad = 9 THEN \"Otros\"
               END AS Actividad2,
               CASE
               WHEN Lectura = 0 THEN \" fas fa-window-close\"
               WHEN Lectura = 1 THEN \" fas fa-check-circle\"
               END AS Lectura2,
               CASE
               WHEN Escritura = 0 THEN \" fas fa-window-close\"
               WHEN Escritura = 1 THEN \" fas fa-check-circle\"
               END AS Escritura2,
               CASE
               WHEN Eliminacion = 0 THEN \" fas fa-window-close\"
               WHEN Eliminacion = 1 THEN \" fas fa-check-circle\"
               END AS Eliminacion2,
               CASE
               WHEN Creacion = 0 THEN \" fas fa-window-close\"
               WHEN Creacion = 1 THEN \" fas fa-check-circle\"
               END AS Creacion2
               FROM (SELECT * FROM Privilegio WHERE id_clase =".$idcurso.") a";

       $permisos = DB::SELECT($query);

        return view('Catedratico.Permisos',compact('id2','clases','type','nombrecurso','idcurso','permisos'));
    }

     public function edit(Request $request)
    {
        $permisos = $request->permisos;
        $permiso = $request->permiso;
        $actividad = $request->actividad;
        $idcurso=$request->idcurso;
        $nombrecurso=$request->session()->get('nombrecurso');  
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');


        $query = "UPDATE Privilegio SET ".$permisos." = ".$permiso.
        " WHERE id_clase = ".$idcurso." AND Actividad = ".$actividad.";";

        DB::UPDATE($query);
        DB::COMMIT();

        $query = "SELECT *, CASE
               WHEN Actividad = 1 THEN \"Parcial\"
               WHEN Actividad = 2 THEN \"Tema de examen\"
               WHEN Actividad = 3 THEN \"Revision\"
               WHEN Actividad = 4 THEN \"Final\"
               WHEN Actividad = 5 THEN \"Tarea\"
               WHEN Actividad = 6 THEN \"HT\"
               WHEN Actividad = 7 THEN \"Laboratorio\"
               WHEN Actividad = 8 THEN \"Retrasada\"
               WHEN Actividad = 9 THEN \"Otros\"
               END AS Actividad2,
               CASE
               WHEN Lectura = 0 THEN \" fas fa-window-close\"
               WHEN Lectura = 1 THEN \" fas fa-check-circle\"
               END AS Lectura2,
               CASE
               WHEN Escritura = 0 THEN \" fas fa-window-close\"
               WHEN Escritura = 1 THEN \" fas fa-check-circle\"
               END AS Escritura2,
               CASE
               WHEN Eliminacion = 0 THEN \" fas fa-window-close\"
               WHEN Eliminacion = 1 THEN \" fas fa-check-circle\"
               END AS Eliminacion2,
               CASE
               WHEN Creacion = 0 THEN \" fas fa-window-close\"
               WHEN Creacion = 1 THEN \" fas fa-check-circle\"
               END AS Creacion2

               FROM (SELECT * FROM Privilegio WHERE id_clase =".$idcurso.") a";

       $permisos = DB::SELECT($query);

        return view('Catedratico.Permisos',compact('id2','clases','type','nombrecurso','idcurso','permisos'));
    }
}
