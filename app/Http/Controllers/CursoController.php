<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class CursoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aux');
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


        $sentencia = "SELECT * FROM Alumno_Clase WHERE id = 6 AND id_clase =;";

        return view('Curso.curso',compact('id2','clases','type'));
    }

    public function listado(Request $request)
    {
    	$idcurso=$request->idcurso;
        $nombrecurso = $request->nombre;
        $iniciales = explode(" ", $nombrecurso);
        $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];

        $request->session()->put('idcurso', $idcurso);
        $request->session()->put('nombrecurso', $nombrecurso);

        $sentencia = "SELECT b.Nombre,b.email,b.CUI,b.Carnet FROM Alumno_Clase  a , users b WHERE a.id_clase =".$idcurso." AND b.id = a.id;";

        $alumnos = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');        

        return view('Curso.curso',compact('id2','clases','type','alumnos','idcurso','nombrecurso'));
    }

    public function listado2(Request $request)
    {
        $idcurso=$request->session()->get('idcurso');       
        $nombrecurso=$request->session()->get('nombrecurso');  
         $sentencia = "SELECT b.Nombre,b.email,b.CUI,b.Carnet FROM Alumno_Clase  a , users b WHERE a.id_clase =".$idcurso." AND b.id = a.id;";

        $alumnos = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

         return view('Curso.curso',compact('id2','clases','type','alumnos','idcurso','nombrecurso'));
    }

    public function notas(Request $request)
    {
        $idcurso=$request->idcurso;
        $request->session()->put('idcurso', $idcurso);
        $nombrecurso =Session::get('nombrecurso');  

        $sentencia = "SELECT * FROM Actividad WHERE id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad, b.Nota, b.id_act_alumno FROM Actividad a, Alumno_Actividad b, users c WHERE a.id_clase =".$idcurso." AND b.id_actividad = a.id_actividad AND b.id = c.id  ORDER by  c.Carnet, a.Nombre; ";
        /*$sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad, b.Nota, b.id_act_alumno FROM Actividad a
                                                                                                                INNER JOIN Alumno_Actividad b on a.id_actividad = b.id_actividad
                                                                                                                INNER JOIN users c on c.id = b.id
                                                                                                                WHERE a.id_clase =".$idcurso.";";*/

        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";                                                                                                                                    

        $notas = DB::select($sentencia);
        $parciales = DB::select($sentencia2);
        //echo json_encode($notas);
        return view('Curso.notas',compact('id2','clases','type','actividades','idcurso','notas','nombrecurso','parciales'));
    }

    public function notas2(Request $request)
    {
        $idcurso=$request->session()->get('idcurso');
        $nombrecurso =Session::get('nombrecurso');  

        $sentencia = "SELECT * FROM Actividad WHERE id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad, b.Nota, b.id_act_alumno FROM Actividad a, Alumno_Actividad b, users c WHERE a.id_clase =".$idcurso." AND b.id_actividad = a.id_actividad AND b.id = c.id  ORDER by  c.Carnet, a.Nombre; ";
        /*$sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad, b.Nota, b.id_act_alumno FROM Actividad a
                                                                                                                INNER JOIN Alumno_Actividad b on a.id_actividad = b.id_actividad
                                                                                                                INNER JOIN users c on c.id = b.id
                                                                                                                WHERE a.id_clase =".$idcurso.";";*/

        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";                                

        $notas = DB::select($sentencia);
        $parciales = DB::select($sentencia2);
        return view('Curso.notas',compact('id2','clases','type','actividades','idcurso','notas','nombrecurso','parciales'));
    }

    public function carga(Request $request)
    {
        $idcurso=$request->idcurso;
        $sentencia = "SELECT * FROM Actividad WHERE id_clase =".$idcurso."  ORDER by Nombre;";
        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        return view('Curso.carga',compact('id2','clases','type','actividades','idcurso'));        
    }

    public function plantilla(Request $request)
    {
        $idcurso=$request->idcurso;
        $actividad=$request->Actividad;
        $textoArchivo = "Carnet,".$actividad."\n";

        $consulta = "SELECT B.Carnet as Carnet
                        FROM Alumno_Clase A
                        INNER JOIN users B ON A.id = B.id
                        WHERE A.id_clase = ".$idcurso." ORDER BY B.Carnet;";

        $carnetes = DB::select($consulta);

        $sentencia = "SELECT * FROM Actividad WHERE id_clase =".$idcurso."  ORDER by Nombre;";
        $actividades = DB::select($sentencia);
        
        foreach ($carnetes as $key => $item) {
            $textoArchivo = $textoArchivo . $item->Carnet . ", \n";
        }

        $file = fopen("Plantilla.csv","w");
        fputs($file,$textoArchivo);
        fclose($file);

        header ("Content-Disposition: attachment; filename=Plantilla.csv"); 
        header ("Content-Type: application/octet-stream"); 
        header ("Content-Length: ".filesize("Plantilla.csv")); 
        readfile("Plantilla.csv"); 

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        return view('Curso.carga',compact('id2','clases','type','actividades','idcurso'));        
    }

    public function save(Request $request) 
    {
        $claves = explode("nota",$request->claves);
        unset($claves[0]);
    
        foreach ($claves as $key => $item) {
            $val = $request['nota'.$item];
            $sentencia = "UPDATE  Alumno_Actividad SET Nota = ".$val." WHERE id_act_alumno = ".$item.";";
            DB::update($sentencia);
            DB::commit();
        }

        $sentencia3 = "SELECT SUM(A.Nota) as suma, B.id_actividad_padre as actividadpadre, A.id as alumno
                                FROM Alumno_Actividad A
                                INNER JOIN Actividad B on B.id_actividad = A.id_actividad
                                WHERE B.id_actividad_padre IS NOT NULL
                                GROUP BY actividadpadre, alumno;";
        
        $act = DB::select($sentencia3);
        //echo json_encode($act);
        foreach ($act as $key => $item) {
            $query = "UPDATE Alumno_Actividad SET Nota=".$item->suma." WHERE id=".$item->alumno. " AND id_actividad=".$item->actividadpadre.";";
            DB::update($query);
            DB::commit();
        }

        return view('cerrar');
    }


     public function registro_act(Request $request)
    {

        $nombre = $request->nombre;
        $fecha = $request->fecha;

        $fecha2 = explode('/', $fecha);
        $clase = $request->session()->get('idcurso');
        $ponderada = $request->ponderada;
        $tipo = $request->tipoa;
        $puntos = $request->puntos; 
        $fecha = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];
        if($tipo=="Tema de examen"){
            $parci = $request->nombreparcial;
            $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase, id_actividad_padre) VALUES ('".$nombre."', '2', '".$puntos."', '".$fecha."', '".$tipo."', '".$clase."', ".$parci.");";       
        }else{
            $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase) VALUES ('".$nombre."', '".$ponderada."', '".$puntos."', '".$fecha."', '".$tipo."', '".$clase."');";
        }
        DB::insert($sentencia);
        DB::commit(); 

        $sentencia = "SELECT id FROM Alumno_Clase WHERE id_clase = ".$clase.";";
        $alumnos = DB::SELECT($sentencia);

        $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$clase." AND Nombre = '".$nombre."';";
        $actividad = DB::SELECT($sentencia);
        $id_actividad = $actividad[0]->id_actividad;

        if($tipo=="Tema de examen"){
            foreach ($alumnos as $key => $item) 
            {
                $sentencia = "INSERT INTO Alumno_Actividad(Nota,id,id_actividad) VALUES (-0.01,".$item->id.",".$id_actividad.");";
                DB::insert($sentencia);
            }   
        }else{
            foreach ($alumnos as $key => $item) 
            {
                $sentencia = "INSERT INTO Alumno_Actividad(Nota,id,id_actividad) VALUES (0,".$item->id.",".$id_actividad.");";
                DB::insert($sentencia);
            }
        }

        DB::commit();

        return redirect()->back();
    }

    public function cargamasiva(Request $request)
    {
        $idcurso=$request->idcurso;
        $idactividad=0;

        $archivo=$request->file('archivo');
        $nombre = $archivo->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($archivo));
        $storage_path = storage_path();
        $url = $storage_path.'/app/storage/'.$nombre;

        $longitudDeLinea = 100;
        $delimitador = ","; 
        
        $gestor = fopen($url, "r");
        if (!$gestor) {
            exit("No se puede abrir el archivo $nombreArchivo");
        }
        
        $numeroDeFila = 1;
        while (($fila = fgetcsv($gestor, $longitudDeLinea, $delimitador)) !== false) {
            if ($numeroDeFila > 1) {
                $carnet = $fila[0];
                $nota = $fila[1];
                $iduserselect = "SELECT id FROM users WHERE Carnet=".$carnet.";";
                $residuser = DB::SELECT($iduserselect);
                $iduser = $residuser[0]->id;
                $sentencia = "UPDATE  Alumno_Actividad SET Nota=".$nota." WHERE id=".$iduser." AND id_actividad=".$idactividad.";";
                DB::insert($sentencia);
            }else{
                $nombre = $fila[1];
                $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$idcurso." AND Nombre = '".$nombre."';";
                $actividad = DB::SELECT($sentencia);
                $idactividad = $actividad[0]->id_actividad;
            }
            
            $numeroDeFila++;
        }
        fclose($gestor);
        
        $sentencia = "SELECT * FROM Actividad WHERE id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $sentencia3 = "SELECT SUM(A.Nota) as suma, B.id_actividad_padre as actividadpadre, A.id as alumno
                                FROM Alumno_Actividad A
                                INNER JOIN Actividad B on B.id_actividad = A.id_actividad
                                WHERE B.id_actividad_padre IS NOT NULL
                                GROUP BY actividadpadre, alumno;";
        
        $act = DB::select($sentencia3);
        foreach ($act as $key => $item) {
            $query = "UPDATE Alumno_Actividad SET Nota=".$act->suma." WHERE id=".$act->alumno. " AND id_actividad=".$act->actividadpadre.";";
            DB::update($query);
            DB::commit();
        }    

        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad, b.Nota, b.id_act_alumno FROM Actividad a, Alumno_Actividad b, users c WHERE a.id_clase =".$idcurso." AND b.id_actividad = a.id_actividad AND b.id = c.id  ORDER by  c.Carnet, a.Nombre; ";

        $notas = DB::select($sentencia);
        //echo $notas[0]->Carnet;
        //echo $notas[1]->Carnet;
        //echo $notas[2]->Carnet;
        return view('Curso.notas',compact('id2','clases','type','actividades','idcurso','notas'));
    }

    public function recursos(Request $request)
    {
        $idcurso=$request->idcurso;

        $sentencia = "SELECT * FROM Recursos WHERE id_clase =".$idcurso."  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos'));
    }

    public function guardarrecurso(Request $request)
    {
        $idcurso=$request->idcurso;
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $sentencia = "SELECT MAX(id_recurso) as Maximo FROM Recursos;";
        $aux = DB::select($sentencia);
        $maximo = $aux[0]->Maximo;
        $maxint = intval($maximo) + 1;

        $archivo=$request->file('archivo');
        $nombre = $archivo->getClientOriginalName();
        $arreglo = explode(".", $nombre);

        $nombrefin = "";
        for($i=0;$i<count($arreglo);$i++){
            if($i==count($arreglo)-1){
                $nombrefin = $nombrefin . $arreglo[$i];
            }else if($i==count($arreglo)-2){
                $nombrefin = $nombrefin . $arreglo[$i] . strval($maxint) . ".";
            }else{
                $nombrefin = $nombrefin . $arreglo[$i] . ".";
            }
        }
        
        \Storage::disk('local')->put($nombrefin, \File::get($archivo));
        $storage_path = storage_path();
        $url = $storage_path.'/app/storage/'.$nombre;

        $nom=$request->nombreRecurso;     
        $desc=$request->descripcionRecurso;
        $tipito=$request->tipoRecurso;

        $sentencia = "INSERT INTO Recursos (Nombre,NombreArchivo,Descripcion,Tipo,id_clase) VALUES ('".$nom."','".$nombrefin."','".$desc."','".$tipito."',".$idcurso.");";
        DB::insert($sentencia);

        $sentencia = "SELECT * FROM Recursos WHERE id_clase =".$idcurso."  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos'));
    }

    public function descargarrecurso(Request $request)
    {
        //echo "HOLA MUNDO";
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
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos'));

        //return view('cerrar');
    }

    public function pruebacorreo(Request $request)
    {
       
        //Codigo de prueba

        $consulta = "SELECT A.Fecha Fecha, A.Nombre as Nombreactividad, A.Ponderacion as Ponderacion, E.Nombre as Nombrecurso, C.Nombre as Nombrealumno, C.email as Email
                        FROM Actividad A 
                        INNER JOIN Alumno_Actividad B ON A.id_actividad = B.id_actividad
                        INNER JOIN users C ON B.id = C.id
                        INNER JOIN Clase D ON D.id_clase = A.id_clase
                        INNER JOIN Curso E ON E.id_curso = D.id_curso
                        WHERE ADDDATE(CURDATE(), 1) = Fecha AND id_actividad_padre IS NULL;";

        $res = DB::select($consulta);  
        
        foreach ($res as $key => $item) {
            $to_name = $item->Nombrealumno;
            $to_email = $item->Email;
            $to_curso = $item->Nombrecurso;
            $data = array('Fecha' => $item->Fecha, 'Nombreactividad' => $item->Nombreactividad, 'Ponderacion' => $item->Ponderacion, 'Nombrecurso' => $item->Nombrecurso, 'Nombrealumno' => $item->Nombrealumno);
            Session::put('data',$data);        
            Mail::send('email', $data, function($message) use ($to_name, $to_email, $to_curso) {
                $message->to($to_email, $to_name)
                        ->subject('Recordatorio de actividad del curso de ' . $to_curso);
                $message->from('teo.mate.usac@gmail.com','Departamento de Matemática');
            });
        }  

        echo 'LLEGA A LA FUNCION';
        //return view('cerrar');
    }
}
