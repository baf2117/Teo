<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class NoticiasController extends Controller
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

        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $username =Session::get('username');
        $type =Session::get('tipo');

        $consNoticias = "SELECT C.id_noticia as IdNoticia, D.Nombre as Clase, B.seccion as Seccion, C.Titulo as Titulo, C.Descripcion, C.Fecha, A.Nombre as Nombre , A.tipo
                                    FROM users A
                                    INNER JOIN Clase B ON A.id = B.id
                                    INNER JOIN Noticia C ON C.id_clase = B.id_clase
                                    INNER JOIN Curso D ON D.id_curso = B.id_curso
                                    WHERE A.id=".$id." ORDER BY C.Fecha, D.Nombre, B.seccion Desc";

        $noticias  = DB::SELECT($consNoticias);

        //echo json_encode($noticias);
        $chat = array();

      foreach ($noticias as $key => $item) {
            $noticia =  (object)array(); 
            $noticia->clase = $item->Clase;
            $noticia->seccion =$item->Seccion;
            $noticia->titulo =$item->Titulo;
            $noticia->descripcion = $item->Descripcion;
            $noticia->fecha = $item->Fecha;
            $noticia->Nombre = $item->Nombre;   
            $noticia->id = $item->IdNoticia;         
            $sendialo = "SELECT a.Fecha, a.Contenido, b.Nombre, b.tipo FROM Dialogo a, users b WHERE a.id_noticia =".$item->IdNoticia." AND a.id = b.id ORDER BY a.Fecha Asc";
            $dialogos = DB::SELECT($sendialo);
            $noticia->dialogos = $dialogos;
            array_push($chat, $noticia);
        }

       return view('Curso.noticia',compact('clases','cursos','type','chat','username','type'));
    }

    public function save(Request $request) 
    {
        $id_noticia = $request->noticia;
        $id2 =Session::get('id2');
        $mensaje = $request->mensaje;
        $fecha = $request->fecha;

        /*echo $id_noticia;
        echo $id2;
        echo $fecha;
        echo $mensaje;*/

        $sentencia = "INSERT INTO Dialogo (Fecha, Contenido, id, id_noticia) VALUES ('".$fecha."', '".$mensaje."',".$id2.",".$id_noticia.")";
           DB::INSERT($sentencia);
           DB::commit();

        return view('cerrar');
    }
}
