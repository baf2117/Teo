<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Felicitacion;

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
        $activis = Session::get('activis');


        $sentencia = "SELECT * FROM Alumno_Clase WHERE id = 6 AND id_clase =;";

        return view('Curso.curso',compact('id2','clases','type','news','activis'));
    }

    public function listado(Request $request)
    {
        $idcurso=$request->idcurso;
        $nombrecurso = $request->nombre;
        $iniciales = explode(" ", $nombrecurso);
        $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];

        $request->session()->put('idcurso', $idcurso);
        $request->session()->put('nombrecurso', $nombrecurso);

        $sentencia = "SELECT b.id,b.Nombre,b.email,b.CUI,b.Carnet FROM Alumno_Clase  a , users b WHERE a.id_clase =".$idcurso." AND b.id = a.id;";

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
        $sentencia = "SELECT b.id,b.Nombre,b.email,b.CUI,b.Carnet FROM Alumno_Clase  a , users b WHERE a.id_clase =".$idcurso." AND b.id = a.id;";

        $alumnos = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

         return view('Curso.curso',compact('id2','clases','type','alumnos','idcurso','nombrecurso'));
    }

    public function notas(Request $request)
    {
        $type =Session::get('tipo');
        $idcurso=$request->idcurso;
        $request->session()->put('idcurso', $idcurso);
        $nombrecurso =Session::get('nombrecurso');  

        $busqueda2 ="SELECT a.Nombre, a.Fecha, a.id_actividad, b.seccion, c.Nombre as curso, d.Escritura
                        FROM Actividad a
                        INNER JOIN Clase b ON b.id_clase = a.id_clase
                        INNER JOIN Curso c ON  b.id_curso = c.id_curso
                        INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad 
                        WHERE a.id_clase = ".$idcurso." AND a.id_clase = d.id_clase AND a.Ponderada = 1";

        $actividades2 = DB::SELECT($busqueda2);

        $sentencia = "SELECT * FROM Actividad WHERE Ponderada = 1 AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        if(sizeof($actividades)==0){
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno,a.Tipo,d.Escritura,a.Catalogo_actividad as tipo2
                            FROM users c
                            LEFT JOIN Alumno_Actividad b ON c.id = b.id
                            LEFT JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Alumno_Clase e ON e.id = c.id
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE d.id_clase =".$idcurso." AND a.Ponderada = 1 AND a.id_clase = ".$idcurso.
                            " AND d.id_clase = ".$idcurso." ORDER by  c.Carnet, a.Nombre; ";
        }else{
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura,a.Catalogo_actividad as tipo2
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.Ponderada = 1 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        }  

        $notas = DB::select($sentencia);
        for ($i=0; $i < sizeof($notas) ; $i++) { 
            if($notas[$i]->Tipo=="Tema de examen" || $notas[$i]->Tipo=="Tema de parcial" || $notas[$i]->Tipo=="Final")
           {
                $notas[$i]->Ponderacion=0;
           }
        }

        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";               
        $parciales = DB::select($sentencia2);

        $sentencia2 = "SELECT b.Nombre, b.id FROM Privilegio a, Catalogo_Actividad b
                        WHERE a.id_clase =".$idcurso." AND b.id = a.Actividad AND a.Creacion = 1";

        if($type>3)
        {
            $sentencia2 = "SELECT b.Nombre, b.id FROM Privilegio a, Catalogo_Actividad b
                        WHERE a.id_clase =".$idcurso." AND b.id = a.Actividad";
        }  

        $creacion = DB::select($sentencia2);

        $sentencia2 = "SELECT a.id_actividad, a.Nombre,d.Nombre as curso,c.seccion
                        FROM Actividad a
                        INNER JOIN Privilegio b ON b.Actividad = a.Catalogo_actividad
                        INNER JOIN Clase c ON c.id_clase = a.id_clase
                        INNER JOIN Curso d ON d.id_curso = c.id_curso
                        WHERE  b.Eliminacion = 1 AND a.id_clase = ".$idcurso." AND a.id_clase = b.id_clase";

        if($type>3)
        {
            $sentencia2 = "SELECT a.id_actividad, a.Nombre,d.Nombre as curso,c.seccion
                        FROM Actividad a
                        INNER JOIN Privilegio b ON b.Actividad = a.Catalogo_actividad
                        INNER JOIN Clase c ON c.id_clase = a.id_clase
                        INNER JOIN Curso d ON d.id_curso = c.id_curso
                        WHERE a.id_clase = ".$idcurso." AND a.id_clase = b.id_clase";

        }        

        $eliminacion = DB::select($sentencia2);
        $save = 1;

        //echo(count($clases));
        return view('Curso.notas',compact('save','id2','clases','actividades','idcurso','notas','nombrecurso','parciales','actividades2','creacion','eliminacion','type'));
    }

    public function notas2(Request $request)
    {
        $idcurso=$request->session()->get('idcurso');
        $nombrecurso =Session::get('nombrecurso');  

        $busqueda2 ="SELECT a.Nombre, a.Fecha, a.id_actividad, b.seccion, c.Nombre as curso, d.Escritura
                        FROM Actividad a
                        INNER JOIN Clase b ON b.id_clase = a.id_clase
                        INNER JOIN Curso c ON  b.id_curso = c.id_curso
                        INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad 
                        WHERE a.id_clase = ".$idcurso." AND a.id_clase = d.id_clase AND a.Ponderada = 1";

        $actividades2 = DB::SELECT($busqueda2);

        $sentencia = "SELECT * FROM Actividad WHERE Ponderada = 1 AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        if(sizeof($actividades)==0){
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno,a.Tipo,d.Escritura,a.Catalogo_actividad as tipo2
                            FROM users c
                            LEFT JOIN Alumno_Actividad b ON c.id = b.id
                            LEFT JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Alumno_Clase e ON e.id = c.id
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE d.id_clase =".$idcurso." AND a.Ponderada = 1 AND a.id_clase = ".$idcurso.
                            " AND d.id_clase = ".$idcurso." ORDER by  c.Carnet, a.Nombre; ";
        }else{
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura,a.Catalogo_actividad as tipo2
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.Ponderada = 1 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        }  

        $notas = DB::select($sentencia);
        for ($i=0; $i < sizeof($notas) ; $i++) { 
            if($notas[$i]->Tipo=="Tema de examen" || $notas[$i]->Tipo=="Tema de parcial" || $notas[$i]->Tipo=="Final")
           {
                $notas[$i]->Ponderacion=0;
           }
        }

        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";               
        $parciales = DB::select($sentencia2);

        $sentencia2 = "SELECT b.Nombre FROM Privilegio a, Catalogo_Actividad b
                        WHERE a.id_clase =".$idcurso." AND b.id = a.Actividad AND a.Creacion = 1";

        $creacion = DB::select($sentencia2);

        $sentencia2 = "SELECT b.Nombre,b.id FROM Privilegio a, Catalogo_Actividad b
                        WHERE a.id_clase =".$idcurso." AND b.id = a.Actividad AND a.Creacion = 1";

        $creacion = DB::select($sentencia2);

        $sentencia2 = "SELECT a.id_actividad, a.Nombre,d.Nombre as curso,c.seccion
                        FROM Actividad a
                        INNER JOIN Privilegio b ON b.Actividad = a.Catalogo_actividad
                        INNER JOIN Clase c ON c.id_clase = a.id_clase
                        INNER JOIN Curso d ON d.id_curso = c.id_curso
                        WHERE  b.Eliminacion = 1 AND a.id_clase = ".$idcurso." AND a.id_clase = b.id_clase";

        $eliminacion = DB::select($sentencia2);
        $save = 1;

        return view('Curso.notas',compact('save','id2','clases','type','actividades','idcurso','notas','nombrecurso','parciales','actividades2','creacion','eliminacion'));
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
        $idcurso=$request->session()->get('idcurso');
        $nombrecurso =Session::get('nombrecurso');  
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
        foreach ($act as $key => $item) {
            $query = "UPDATE Alumno_Actividad SET Nota=".$item->suma." WHERE id=".$item->alumno. " AND id_actividad=".$item->actividadpadre.";";
            DB::update($query);
            DB::commit();
        }

    
        $sentencia = "SELECT c.Nombre,c.email,c.id, SUM((a.Ponderacion * b.Nota)/100) as total
                        FROM users c
                        LEFT JOIN Alumno_Actividad b ON c.id = b.id 
                        LEFT JOIN Actividad a ON b.id_actividad = a.id_actividad 
                        INNER JOIN Alumno_Clase d ON d.id = c.id 
                        WHERE d.id_clase =".$idcurso."
                        AND a.id_clase = ".$idcurso."
                        AND a.Ponderada =1
                        GROUP BY c.id,c.Nombre,c.email";

        $notas = DB::select($sentencia);

        foreach ($notas as $key => $value) {

            if($value->total>=61)
            {
                $sentencia = "SELECT Aprobado 
                                FROM Alumno_Clase 
                                WHERE id = ".$value->id." AND id_clase = ".$idcurso.";";
                $verificar = DB::SELECT($sentencia);

                if($verificar[0]->Aprobado==0)
                {
                    $sentencia ="UPDATE Alumno_Clase
                                    SET Aprobado = 1
                                    WHERE id = ".$value->id." AND id_clase = ".$idcurso.";";
                    DB::UPDATE($sentencia);
                    DB::COMMIT();

                    $objDemo = new \stdClass();
                    $objDemo->curso = $nombrecurso;
                    $objDemo->receiver = $value->Nombre;
 
                    Mail::to($value->email)->send(new Felicitacion($objDemo));
                }
            }
           
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
        $tipoid = $request->tipoa;
        $puntos = $request->puntos; 

        $sentencia = "SELECT Nombre FROM Catalogo_Actividad WHERE id=".$tipoid.";";
        $tipoid2 = DB::SELECT($sentencia);
        $tipo = $tipoid2[0]->Nombre;

        $sql6 = "SELECT * FROM Actividad WHERE Ponderada=3 AND Tipo='".$tipo."' AND id_clase = ".$clase.";";
        $verificar6 = DB::SELECT($sql6);
        if(count($verificar6)>0){
            $fecha = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];

            $sql3 = "SELECT * FROM Actividad WHERE id_clase = ".$clase." AND Ponderada=1 AND Tipo = '".$tipo."'";
            $actis = DB::SELECT($sql3);

            $cantidad = count($actis) + 1;
            $punteo = floatval($verificar6[0]->Ponderacion);
            $punteofinal = $punteo/$cantidad;

            $sql5 = "UPDATE Actividad SET Ponderacion = '".$punteofinal."' WHERE id_clase = ".$clase." AND Ponderada=1 AND Tipo = '".$tipo."'";

            DB::UPDATE($sql5);
            DB::COMMIT();

            $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase,Catalogo_Actividad) VALUES ('".$nombre."', '".$ponderada."', '".$punteofinal."', '".$fecha."', '".$tipo."', '".$clase."',".$tipoid.");";
            DB::insert($sentencia);
            DB::commit(); 

            $sentencia = "SELECT id FROM Alumno_Clase WHERE id_clase = ".$clase.";";
            $alumnos = DB::SELECT($sentencia);

            $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$clase." AND Nombre = '".$nombre."';";
            $actividad = DB::SELECT($sentencia);
            $id_actividad = $actividad[0]->id_actividad;

            if(($tipo=="Tema de examen")OR($tipo=="Parcial")OR($tipo=="Final")){
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

            if(floatval($puntos)>0)
            {
                return redirect()->back()
                    ->withErrors(['msg'=>"El punteo de la actividad será asignado según la ponderación creada"]);
            }

        }else{

            $sql ="SELECT sum(Ponderacion) as total, id_clase from Actividad Where id_clase = ".$clase." AND Ponderada=1 AND Tipo<> 'Tema de examen' AND Tipo <> 'Tema de parcial' GROUP BY id_clase";
            $verificar = DB::SELECT($sql);

            if(count($verificar)>0){
                if($verificar[0]->total + $puntos > 100)
                {
                    return redirect()->back()
                        ->withErrors(['msg'=>"Las actividades sobrepasan los 100pts"]);
                }
            }

            $fecha = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];
            if($tipo=="Tema de examen"){
                $parci = $request->nombreparcial;
                $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase, id_actividad_padre,Catalogo_Actividad) VALUES ('".$nombre."', '2', '".$puntos."', '".$fecha."', '".$tipo."', '".$clase."', ".$parci.",".$tipoid.");";       
            }else{
                $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase,Catalogo_Actividad) VALUES ('".$nombre."', '".$ponderada."', '".$puntos."', '".$fecha."', '".$tipo."', '".$clase."',".$tipoid.");";
            }
            DB::insert($sentencia);
            DB::commit(); 

            $sentencia = "SELECT id FROM Alumno_Clase WHERE id_clase = ".$clase.";";
            $alumnos = DB::SELECT($sentencia);

            $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$clase." AND Nombre = '".$nombre."';";
            $actividad = DB::SELECT($sentencia);
            $id_actividad = $actividad[0]->id_actividad;

            if(($tipo=="Tema de examen")OR($tipo=="Parcial")OR($tipo=="Final")){
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
        }

        return redirect()->back();
    }

     public function edit_act(Request $request)
    {

        $nombre = $request->nombre;
        $fecha = $request->fecha;

        $fecha = str_replace("-","/",$fecha);

        $fecha2 = explode('/', $fecha);
        $fecha = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];
        $clase = $request->session()->get('idcurso');
        $ponderada = $request->ponderada;
        $tipo = $request->tipo;
        $puntos = $request->puntos; 
        $idactividad = $request->idactividad;

        $sql ="SELECT sum(Ponderacion) as total, id_clase from Actividad Where id_clase = ".$clase." AND Tipo<> 'Tema de examen' AND Tipo <> 'Tema de parcial' GROUP BY id_clase";
        $verificar = DB::SELECT($sql);

        $sql ="SELECT Ponderacion from Actividad Where id_actividad = ".$idactividad.";";
        $verificar2 = DB::SELECT($sql);

        if((count($verificar)>0)and(count($verificar)>0)){
            if(($verificar[0]->total + $puntos)-$verificar2[0]->Ponderacion > 100)
            {
                return redirect()->back()
                    ->withErrors(['msg'=>"Las actividades sobrepasan los 100pts"]);
            }
        }

        $sql = "UPDATE Actividad SET Nombre = '".$nombre."', Ponderada = '".$ponderada."', `Ponderacion` = '".$puntos."', Fecha = '".$fecha."', Tipo = '".$tipo."' WHERE id_actividad = ".$idactividad.";";

        DB::UPDATE($sql);
        DB::COMMIT();

        return redirect()->back();
    }

    public function guardarPonderacion(Request $request)
    {
        $clase = $request->session()->get('idcurso');
        $tipoActividad = $request->tipoPonderacion;
        $puntosPonderacion = $request->puntosPonderacion;

        $sql ="SELECT sum(Ponderacion) as total, id_clase from Actividad Where id_clase = ".$clase." AND Ponderada=1 AND Tipo<> 'Tema de examen' AND Tipo <> 'Tema de parcial' GROUP BY id_clase";
        $verificar = DB::SELECT($sql);

        if(count($verificar)>0){
            if($verificar[0]->total + $puntosPonderacion > 100)
            {
                return redirect()->back()
                    ->withErrors(['msg'=>"Las actividades sobrepasan los 100pts"]);
            }
        }

        $sql2 = "SELECT * FROM Actividad WHERE id_clase = ".$clase." AND Ponderada=3 AND Tipo = '".$tipoActividad."'";
        $verificar2 = DB::SELECT($sql2);

        if(count($verificar2)>0){
            return redirect()->back()
                    ->withErrors(['msg'=>"Ya ha sido creada una ponderación para este tipo de actividad"]); 
        }        
        
        $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Fecha, Tipo, id_clase) VALUES ('".$tipoActividad."', '3', '".$puntosPonderacion."', '0000-00-00', '".$tipoActividad."', '".$clase."');";
        DB::insert($sentencia);
        DB::commit(); 

        $sql3 = "SELECT * FROM Actividad WHERE id_clase = ".$clase." AND Ponderada=1 AND Tipo = '".$tipoActividad."'";
        $actis = DB::SELECT($sql3);

        if(count($actis)>0){
            
            $cantidad = count($actis);
            $punteo = floatval($puntosPonderacion);
            $punteofinal = $punteo/$cantidad;

            $sql5 = "UPDATE Actividad SET Ponderacion = '".$punteofinal."' WHERE id_clase = ".$clase." AND Ponderada=1 AND Tipo = '".$tipoActividad."'";

            DB::UPDATE($sql5);
            DB::COMMIT();
        }

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
                if(count($residuser)>0)
                {
		$iduser = $residuser[0]->id;
                $sentencia = "UPDATE  Alumno_Actividad SET Nota=".$nota." WHERE id=".$iduser." AND id_actividad=".$idactividad.";";
                DB::UPDATE($sentencia);
		}
            }else{
                $nombre = $fila[1];
                $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$idcurso." AND Nombre = '".$nombre."';";
                $actividad = DB::SELECT($sentencia);
                $idactividad = $actividad[0]->id_actividad;
            }
            
            $numeroDeFila++;
        }
        fclose($gestor);
        DB::COMMIT();
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
            $query = "UPDATE Alumno_Actividad SET Nota=".$item->suma." WHERE id=".$item->alumno. " AND id_actividad=".$item->actividadpadre.";";
            DB::update($query);
            DB::commit();
        }    

        $sentencia = "SELECT * FROM Actividad WHERE Ponderada = 1 AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);

        if(sizeof($actividades)==0){
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno,a.Tipo,d.Escritura,a.Catalogo_actividad as tipo2
                            FROM users c
                            LEFT JOIN Alumno_Actividad b ON c.id = b.id
                            LEFT JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Alumno_Clase e ON e.id = c.id
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE d.id_clase =".$idcurso." AND a.Ponderada = 1 AND a.id_clase = ".$idcurso.
                            " AND d.id_clase = ".$idcurso." ORDER by  c.Carnet, a.Nombre; ";
        }else{
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura,a.Catalogo_actividad as tipo2
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.Ponderada = 1 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        }  

        $notas = DB::select($sentencia);
        for ($i=0; $i < sizeof($notas) ; $i++) { 
            if($notas[$i]->Tipo=="Tema de examen" || $notas[$i]->Tipo=="Tema de parcial" || $notas[$i]->Tipo=="Final")
           {
                $notas[$i]->Ponderacion=0;
           }
        }
  
        $nombrecurso=$request->session()->get('nombrecurso'); 

        $sentencia2 = "SELECT id_actividad as idactividad, Nombre as nombreactividad 
                                FROM Actividad
                                WHERE id_clase = ".$idcurso." AND Tipo='Parcial';";               
        $parciales = DB::select($sentencia2);
	

	$sentencia2 = "SELECT b.Nombre, b.id FROM Privilegio a, Catalogo_Actividad b
                        WHERE a.id_clase =".$idcurso." AND b.id = a.Actividad AND a.Creacion = 1";

        $creacion = DB::select($sentencia2);

        $sentencia2 = "SELECT a.id_actividad, a.Nombre,d.Nombre as curso,c.seccion
                        FROM Actividad a
                        INNER JOIN Privilegio b ON b.Actividad = a.Catalogo_actividad
                        INNER JOIN Clase c ON c.id_clase = a.id_clase
                        INNER JOIN Curso d ON d.id_curso = c.id_curso
                        WHERE  b.Eliminacion = 1 AND a.id_clase = ".$idcurso." AND a.id_clase = b.id_clase";
        $eliminacion = DB::select($sentencia2);

        return view('Curso.notas',compact('id2','clases','type','actividades','idcurso','notas','nombrecurso','parciales','creacion','eliminacion'));
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
        $nombrecurso =Session::get('nombrecurso');  
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos','nombrecurso'));
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

        $tipito=$request->tipoRecurso;
        $nom=$request->nombreRecurso;     
        $desc=$request->descripcionRecurso;
        $publico = $request->publico;

        if($tipito==0){
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

            $sentencia = "INSERT INTO Recursos (Nombre,NombreArchivo,Descripcion,Tipo,id_clase,publico) VALUES ('".$nom."','".$nombrefin."','".$desc."','".$tipito."',".$idcurso.",".$publico.");";
            DB::insert($sentencia);
        }else{
            $nombrefin = $request->enlaceVideo;
            $sentencia = "INSERT INTO Recursos (Nombre,NombreArchivo,Descripcion,Tipo,id_clase,publico) VALUES ('".$nom."','".$nombrefin."','".$desc."','".$tipito."',".$idcurso.",".$publico.");";
            DB::insert($sentencia);
        }

        $sentencia = "SELECT * FROM Recursos WHERE id_clase =".$idcurso."  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $nombrecurso =Session::get('nombrecurso');  
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos','nombrecurso'));
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
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos','nombrecurso'));

        //return view('cerrar');
    }

    public function eliminarRecurso(Request $request)
    {
        //return "HOLA MUNDO";
        $idcurso=$request->idcurso2;
        $idrecurso = $request->idrecurso2;
        $storage_path = storage_path();
        if($request->tipoRecurso==0){
            Storage::delete($idrecurso);
        }

        $url = $storage_path.'/app/storage/'.$idrecurso;

        $sentencia = "DELETE FROM Recursos WHERE id_clase =".$idcurso." AND NombreArchivo='" . $idrecurso . "';";
        DB::delete($sentencia);
        DB::commit();

        $sentencia = "SELECT * FROM Recursos WHERE id_clase =".$idcurso."  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $nombrecurso =Session::get('nombrecurso');  
        return view('Curso.recursos',compact('id2','clases','type','idcurso','recursos','nombrecurso'));

        //return view('cerrar');
    }

    public function eliminarEstudiante(Request $request)
    {
        //return "HOLA MUNDO";
        $idcurso=$request->idcurso;
        $idrecurso = $request->idrecurso;

        $sentencia = "DELETE FROM Alumno_Clase WHERE id_clase =".$idcurso." AND id='" . $idrecurso . "';";
        DB::delete($sentencia);
        DB::commit();

        $sql = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$idcurso.";";
        $actividades = DB::SELECT($sql);

        foreach ($actividades as $key => $value) {
            $sql = "DELETE FROM Alumno_Actividad WHERE id = ".$idrecurso." AND id_actividad = ".$value->id_actividad.";";
            DB::DELETE($sql);
            DB::COMMIT();
        }

        $nombrecurso =Session::get('nombrecurso');

        $request->session()->put('idcurso', $idcurso);
        $request->session()->put('nombrecurso', $nombrecurso);

        $sentencia = "SELECT b.Nombre,b.email,b.CUI,b.Carnet FROM Alumno_Clase  a , users b WHERE a.id_clase =".$idcurso." AND b.id = a.id;";

        $alumnos = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');        

        return view('Curso.curso',compact('id2','clases','type','alumnos','idcurso','nombrecurso'));

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

    public function descargarListado(Request $request)
    {
        $idcurso=$request->idcurso;
        $nombrecurso=$request->session()->get('nombrecurso');  

        $sentencia = "SELECT b.Nombre,b.Carnet,b.email FROM Alumno_Clase a, users b WHERE a.id_clase =".$idcurso." AND b.id = a.id;";
        $alumnos = DB::select($sentencia);

        $textoArchivo = "Carnet,Nombre,Correo\n";

        foreach ($alumnos as $key => $item) {
            $textoArchivo = $textoArchivo . $item->Carnet . "," . $item->Nombre . "," . $item->email . " \n";
        }

        $file = fopen("ListadoAlumnos.csv","w");
        fputs($file,$textoArchivo);
        fclose($file);

        header ("Content-Disposition: attachment; filename=ListadoAlumnos.csv"); 
        header ("Content-Type: application/octet-stream"); 
        header ("Content-Length: ".filesize("ListadoAlumnos.csv")); 
        readfile("ListadoAlumnos.csv");         
    }

    public function descargarNotas(Request $request)
    {
        $idcurso=$request->session()->get('idcurso');
        $nombrecurso =Session::get('nombrecurso');  

        $busqueda2 ="SELECT a.Nombre, a.Fecha, a.id_actividad, b.seccion, c.Nombre as curso, d.Escritura
                        FROM Actividad a
                        INNER JOIN Clase b ON b.id_clase = a.id_clase
                        INNER JOIN Curso c ON  b.id_curso = c.id_curso
                        INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad 
                        WHERE a.id_clase = ".$idcurso." AND a.id_clase = d.id_clase AND a.Ponderada = 1";

        $actividades2 = DB::SELECT($busqueda2);

        $sentencia = "SELECT * FROM Actividad WHERE Ponderada = 1 AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        if(sizeof($actividades)==0){
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno,a.Tipo,d.Escritura
                            FROM users c
                            LEFT JOIN Alumno_Actividad b ON c.id = b.id
                            LEFT JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Alumno_Clase d ON d.id = c.id
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE d.id_clase =".$idcurso." AND a.Ponderada = 1 AND a.id_clase = ".$idcurso.
                            " AND d.id_clase = ".$idcurso." ORDER by  c.Carnet, a.Nombre; ";
        }else{
            $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.Ponderada = 1 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        }  

        $notas = DB::select($sentencia);
        for ($i=0; $i < sizeof($notas) ; $i++) { 
            if($notas[$i]->Tipo=="Tema de examen" || $notas[$i]->Tipo=="Tema de parcial" || $notas[$i]->Tipo=="Final")
           {
                $notas[$i]->Ponderacion=0;
           }
        }

        //-----------------------------------------------------------------------
        $textoArchivo = "Carnet,Nombre";

        try {
            $tama = count($notas)/count($actividades);
        } catch (Exception $e) {
            $tama = 0;
        }

        foreach ($actividades as $key => $item) 
        {
            if($item->Tipo!="Final")
            {
                $textoArchivo = $textoArchivo . "," . $item->Nombre . " - " . $item->Ponderacion . " pts";
            }    
        }

        $textoArchivo = $textoArchivo . ", Zona, Examen Final, Nota Final\n";
          
        $j = 0;
        $zona = 0;
        $final = 0;
        $banderafinal = 0;
        if($tama>0){
            for ($i = 0; $i <$tama; $i++) 
            {
                $zona =0;
                $final =0;
                $textoArchivo = $textoArchivo . $notas[$j]->Carnet . "," . $notas[$j]->Nombre;
                for ($x =0; $x < count($actividades); $x++) 
                {
                    if($notas[$x+$j]->Tipo!="Final")
                    {
                        if($notas[$x+$j]->Nota<0)
                        {
                            $textoArchivo = $textoArchivo . "," . "0.00";
                        }
                        else
                        {
                            $textoArchivo = $textoArchivo . "," . $notas[$x+$j]->Nota;
                            $zona+=($notas[$x+$j]->Nota*$notas[$x+$j]->Ponderacion)/100;
                        }
                    }
                }

                $textoArchivo = $textoArchivo . "," . $zona;
                for ($x =0; $x < count($actividades); $x++) 
                {
                    if($notas[$x+$j]->Tipo=="Final")
                    {   
                        $banderafinal = 1;
                        if($notas[$x+$j]->Nota<0)
                        {
                            $textoArchivo = $textoArchivo . "," . "0.00";
                        }
                        else
                        {
                            $textoArchivo = $textoArchivo . "," . $notas[$x+$j]->Nota;
                            $zona+=($notas[$x+$j]->Nota*$notas[$x+$j]->Ponderacion)/100;
                        }
                    }
                }

                if($banderafinal==0)
                {
                    $textoArchivo = $textoArchivo . "," . "0.00";
                }

                $notafin = $final + $zona;

                $textoArchivo = $textoArchivo . "," . $notafin;
                $j= $j + count($actividades);
                $textoArchivo = $textoArchivo . "\n"; 
            }
        }

        $file = fopen("ListadoNotas.csv","w");
        fputs($file,$textoArchivo);
        fclose($file);

        header ("Content-Disposition: attachment; filename=ListadoNotas.csv"); 
        header ("Content-Type: application/octet-stream"); 
        header ("Content-Length: ".filesize("ListadoNotas.csv")); 
        readfile("ListadoNotas.csv");  
    }
}
