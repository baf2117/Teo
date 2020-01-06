<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class PublicoController extends Controller
{
    public function index()
    {
        
        $sentencia = "SELECT 
        a.Nombre,
        a.Descripcion,
        a.NombreArchivo,
        a.Tipo,
        a.id_clase,
        b.seccion,
        b.anio,
        c.Nombre AS nombrecurso,
        b.semestre,
        CASE
          WHEN b.semestre = 1 THEN \"Primer Semestre\"
          WHEN b.semestre = 2 THEN \"Vacaciones Junio\"
          WHEN b.semestre = 3 THEN \"Segundo Semestre\"
          WHEN b.semestre = 4 THEN \"Vacaciones Diciembre\"
       END AS periodo
        FROM Recursos a
        LEFT JOIN Clase b ON b.id_clase = a.id_clase
        LEFT JOIN Curso c ON c.id_curso = b.id_curso
        WHERE a.publico = 1;";

        $recursos = DB::select($sentencia);
        return view('Publico.recursos',compact('recursos'));
    }

    public function descargar(Request $request)
    {;

        $idrecurso = $request->idrecurso;
        $storage_path = storage_path();
        $url = $storage_path.'/app/storage/'.$idrecurso;
        echo $url;

        header ("Content-Disposition: attachment; filename=".$idrecurso); 
        header ("Content-Type: application/octet-stream"); 
        header ("Content-Length: ".filesize($url)); 
        readfile($url); 

       /* $sentencia = "SELECT 
        a.Nombre,
        a.Descripcion,
        a.NombreArchivo,
        a.Tipo,
        a.id_clase,
        b.seccion,
        b.anio,
        c.Nombre AS nombrecurso,
        b.semestre,
        CASE
          WHEN b.semestre = 1 THEN \"Primer Semestre\"
          WHEN b.semestre = 2 THEN \"Vacaciones Junio\"
          WHEN b.semestre = 3 THEN \"Segundo Semestre\"
          WHEN b.semestre = 4 THEN \"Vacaciones Diciembre\"
       END AS periodo
        FROM Recursos a
        LEFT JOIN Clase b ON b.id_clase = a.id_clase
        LEFT JOIN Curso c ON c.id_curso = b.id_curso
        WHERE a.publico = 1;";

        $recursos = DB::select($sentencia);
        return view('Publico.recursos',compact('recursos'));*/
    }
}
