<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminController;
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
      $type =Session::get('tipo');
      $busqueda1 = "";
      $consNoticias = "";
      $mes = date("m"); 
      $semestre = AdminController::semestre($mes);
      $year = date("Y");

      if ($type==3) {
        $busqueda1 = "SELECT 
                        c.id_clase,
                        c.id_curso,
                        b.Nombre, 
                        c.seccion 
                        FROM Alumno_Clase a, Clase c, Curso b 
                        WHERE a.id =".$id." AND c.id_curso = b.id_curso AND a.id_clase = c.id_clase AND c.semestre = ".$semestre." AND c.anio = ".$year.";";

        $consNoticias = "SELECT 
                      C.id_noticia AS IdNoticia, 
                      D.Nombre AS Clase, 
                      B.seccion AS Seccion, 
                      C.Titulo AS Titulo, 
                      C.Descripcion, 
                      C.Fecha, 
                      E.Nombre AS Nombre, 
                      E.tipo
                      FROM Alumno_Clase A
                      INNER JOIN Clase B ON A.id_clase = B.id_clase
                      INNER JOIN Noticia C ON C.id_clase = B.id_clase
                      INNER JOIN Curso D ON D.id_curso = B.id_curso
                      INNER JOIN users E ON E.id = A.id
                      WHERE A.id=".$id. " AND B.semestre = ".$semestre." AND B.anio = ".$year.
                      " ORDER BY C.Fecha, D.Nombre, B.seccion DESC";

       
      }else if($type==2){

    	$busqueda1 = "SELECT 
                      a.id_clase,
                      a.id_curso, 
                      b.Nombre, 
                      a.seccion 
                      FROM Clase a, Curso b 
                      WHERE a.id =".$id." AND b.id_curso = a.id_curso AND a.semestre = ".$semestre." AND a.anio = ".$year.";";

       $consNoticias = "SELECT C.id_noticia AS IdNoticia, D.Nombre AS Clase, B.seccion AS Seccion, C.Titulo AS Titulo, C.Descripcion, C.Fecha, A.Nombre AS Nombre , A.tipo
                                    FROM users A
                                    INNER JOIN Clase B ON A.id = B.id
                                    INNER JOIN Noticia C ON C.id_clase = B.id_clase
                                    INNER JOIN Curso D ON D.id_curso = B.id_curso
                                    WHERE A.id=".$id." AND B.semestre = ".$semestre." AND B.anio = ".$year.
                                    " ORDER BY C.Fecha, D.Nombre, B.seccion DESC";
      }else
      {
        $busqueda1 = "SELECT 
        a.id_clase,
        a.id_curso, 
        b.Nombre, 
        a.seccion 
        FROM Clase a, Curso b 
        WHERE a.id =".$id." AND b.id_curso = a.id_curso AND a.semestre = ".$semestre." AND a.anio = ".$year.";";

        $consNoticias = "SELECT C.id_noticia AS IdNoticia, D.Nombre AS Clase, B.seccion AS Seccion, C.Titulo AS Titulo, C.Descripcion, C.Fecha, A.Nombre AS Nombre , A.tipo
                      FROM users A
                      INNER JOIN Clase B ON A.id = B.id_catedratico
                      INNER JOIN Noticia C ON C.id_clase = B.id_clase
                      INNER JOIN Curso D ON D.id_curso = B.id_curso
                      WHERE A.id=".$id." AND B.semestre = ".$semestre." AND B.anio = ".$year.
                      " ORDER BY C.Fecha, D.Nombre, B.seccion DESC";
      }

      $cursos = DB::SELECT($busqueda1);
      $clases =Session::get('clases');
      $username =Session::get('username');
      $noticias  = DB::SELECT($consNoticias);
      $chat = array();

      foreach ($noticias AS $key => $item) {
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
        $sentencia = "INSERT INTO Dialogo (Fecha, Contenido, id, id_noticia) VALUES ('".$fecha."', '".$mensaje."',".$id2.",".$id_noticia.")";
        DB::INSERT($sentencia);
        DB::commit();
        $consulta = "SELECT A.Nombre AS Nombrealumno, A.email AS Email, D.Nombre AS Nombrecurso, C.seccion AS Seccion, B.Titulo AS Titulo
                      FROM users A
                      INNER JOIN Noticia B ON B.id = A.id
                      INNER JOIN Clase C ON C.id_clase = B.id_clase
                      INNER JOIN Curso D ON D.id_curso = C.id_curso
                      WHERE B.id_noticia = " . $id_noticia . ";";
        $res = DB::select($consulta);  
        $consulta2 = "SELECT Nombre FROM users WHERE id = " . $id2 . ";";
        $res2 = DB::select($consulta2);
        $nomalum = $res2[0]->Nombre;
        
        foreach ($res AS $key => $item) {
            $to_name = $item->Nombrealumno;
            $to_email = $item->Email;
            $to_curso = $item->Nombrecurso;
            $to_seccion = $item->Seccion;
            $data = array('Nombrecurso' => $item->Nombrecurso, 'Seccion' => $item->Seccion, 'Nombrealumno' => $item->Nombrealumno, 'Mensaje' => $mensaje, 'Nomalum' => $nomalum, 'Titulo' => $item->Titulo);
            Session::put('data',$data);        
            Mail::send('emailnotiaux', $data, function($message) use ($to_name, $to_email, $to_curso, $to_seccion) 
            {
                $message->to($to_email, $to_name)
                        ->subject('Nuevo dialogo de alumno del curso ' . $to_curso . ', sección ' . $to_seccion);
                $message->from('teo.mate.usac@gmail.com','Departamento de Matemática');
            });
        }   
        return view('cerrar');
    }

    public function crear(Request $request) 
    {
      $titulo = $request->titulo;
      $des = $request->des;
      $idclase = $request->idclase;
      $id2 =Session::get('id2');
      $sql = "INSERT INTO Noticia (Titulo,Descripcion,id_clase,id) VALUES ('".$titulo."','".$des."',".$idclase.",".$id2.");";
      DB::INSERT($sql);
      DB::COMMIT();
      $consulta = "SELECT A.Nombre AS Nombrealumno, A.email AS Email, D.Nombre AS Nombrecurso
                      FROM users A
                      INNER JOIN Alumno_Clase B ON B.id = A.id
                      INNER JOIN Clase C ON C.id_clase = B.id_clase
                      INNER JOIN Curso D ON D.id_curso = C.id_curso
                      WHERE B.id_clase = " . $idclase . ";";
      $res = DB::select($consulta);  
        
      foreach ($res AS $key => $item) {
          $to_name = $item->Nombrealumno;
          $to_email = $item->Email;
          $to_curso = $item->Nombrecurso;
          $data = array('Nombrecurso' => $item->Nombrecurso, 'Nombrealumno' => $item->Nombrealumno, 'Titulo' => $titulo, 'Descripcion' => $des);
          Session::put('data',$data);   
               
          Mail::send('emailnoti', $data, function($message) use ($to_name, $to_email, $to_curso) 
          {
              $message->to($to_email, $to_name)
                      ->subject('Nueva noticia publicada del curso ' . $to_curso);
              $message->from('teo.mate.usac@gmail.com','Departamento de Matemática');
          });
      }

      return redirect()->back();
    }
}
