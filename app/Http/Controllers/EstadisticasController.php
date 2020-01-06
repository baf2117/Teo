<?php

namespace App\Http\Controllers;

require '/var/www/html/Despligue/Teo/vendor/autoload.php';

use Illuminate\Http\Request;
use Session;
use DB;
use Charts;
use CpChart\Data;
use CpChart\Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EstadisticasController extends Controller
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
    public function inicio(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $request->session()->put('idcurso', $idcurso);
        $nombrecurso =Session::get('nombrecurso'); 

        $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso.
        " AND (Tipo = 'Parcial' OR Tipo = 'Final');";
        $examenes = DB::select($sentencia2);

        $id_padre = 0;
        if(count($examenes)>0)
        {
            $id_padre = $examenes[0]->idactividad;
        }

        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.id_actividad_padre = ".$id_padre." AND a.Catalogo_actividad = 2 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        $notas = DB::SELECT($sentencia);

        $sentencia = "SELECT * FROM Actividad WHERE Catalogo_actividad = 2 AND id_actividad_padre = ".$id_padre." AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);

        return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes','notas','actividades','id_padre'));
    }

    public function inicio2(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso = Session::get('idcurso');

        $nombrecurso =Session::get('nombrecurso'); 

        $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso.
        " AND (Tipo = 'Parcial' OR Tipo = 'Final');";
        $examenes = DB::select($sentencia2);

        $id_padre = 0;
        if(count($examenes)>0)
        {
            $id_padre = $examenes[0]->idactividad;
        }

        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.id_actividad_padre = ".$id_padre." AND a.Catalogo_actividad = 2 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        $notas = DB::SELECT($sentencia);

        $sentencia = "SELECT * FROM Actividad WHERE Catalogo_actividad = 2 AND id_actividad_padre = ".$id_padre." AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);

        return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes','notas','actividades','id_padre'));
    }

    public function parcial(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $id_padre=$request->Actividad;
        $idcurso = Session::get('idcurso');
        $nombrecurso =Session::get('nombrecurso'); 

        $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso.
        " AND (Tipo = 'Parcial' OR Tipo = 'Final');";
        $examenes = DB::select($sentencia2);



        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.id_actividad_padre = ".$id_padre." AND a.Catalogo_actividad = 2 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        $notas = DB::SELECT($sentencia);

        $sentencia = "SELECT * FROM Actividad WHERE Catalogo_actividad = 2 AND id_actividad_padre = ".$id_padre." AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);

        return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes','notas','actividades','id_padre'));
    }

    public function crear(Request $request)
    {

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso'); 
        $nombre = $request->nombre;
        $actividad = $request->Actividad;
        $puntos = $request->puntos;


        $sql ="SELECT sum(Ponderacion) as total, id_clase from Actividad Where id_clase = ".$idcurso."  and id_actividad_padre = ".$actividad." GROUP BY id_clase";
        $verificar = DB::SELECT($sql);

        if(count($verificar)>0)
        {
            if($verificar[0]->total + $puntos > 100)
            {
                return redirect()->back()
                    ->withErrors(['msg'=>"Los temas sobrepasan los 100pts"]);
            }
        }
        else 
        {
            if($puntos>100)
            {
                return redirect()->back()
                    ->withErrors(['msg'=>"Los temas sobrepasan los 100pts"]);
            }
        }


        $sentencia = "INSERT INTO Actividad (Nombre, Ponderada, Ponderacion, Tipo, id_clase, id_actividad_padre,Catalogo_Actividad) VALUES ('".$nombre."', '2', '".$puntos."', 'Tema de examen', '".$idcurso."', ".$actividad.",2);";

        DB::INSERT($sentencia);
        DB::COMMIT();

        $sentencia = "SELECT id FROM Alumno_Clase WHERE id_clase = ".$idcurso.";";
        $alumnos = DB::SELECT($sentencia);

        $sentencia = "SELECT id_actividad FROM Actividad WHERE id_clase = ".$idcurso." AND Nombre = '".$nombre."';";

        $actividad = DB::SELECT($sentencia);
        $id_actividad = $actividad[0]->id_actividad;


        foreach ($alumnos as $key => $item) 
                {
                    $sentencia = "INSERT INTO Alumno_Actividad(Nota,id,id_actividad) VALUES (-0.01,".$item->id.",".$id_actividad.");";
                    DB::insert($sentencia);
                }  
        DB::COMMIT();

        $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso.
        " AND (Tipo = 'Parcial' OR Tipo = 'Final');";
        $examenes = DB::select($sentencia2);

        $id_padre = $request->id_padre;


        $sentencia = "SELECT c.Nombre, c.Carnet, a.Nombre as actividad, a.id_actividad,a.Ponderacion, b.Nota, b.id_act_alumno, a.Tipo,d.Escritura
                            FROM users c
                            INNER JOIN Alumno_Actividad b ON c.id = b.id
                            INNER JOIN Actividad a ON b.id_actividad = a.id_actividad
                            INNER JOIN Privilegio d ON d.Actividad = a.Catalogo_actividad
                            WHERE a.id_clase =".$idcurso." AND a.id_actividad_padre = ".$id_padre." AND a.Catalogo_actividad = 2 AND d.id_clase = ".$idcurso.
                            " ORDER by  c.Carnet, a.Nombre;";
        $notas = DB::SELECT($sentencia);

        $sentencia = "SELECT * FROM Actividad WHERE Catalogo_actividad = 2 AND id_actividad_padre = ".$id_padre." AND id_clase =".$idcurso."  ORDER by Nombre;";

        $actividades = DB::select($sentencia);

        return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes','notas','actividades','id_padre'));

    }

    public function saveparcial(Request $request) 
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
                                WHERE B.id_actividad_padre IS NOT NULL AND B.id_clase = ".$idcurso."
                                GROUP BY actividadpadre, alumno;";
        
        $act = DB::select($sentencia3);
        foreach ($act as $key => $item) {
            $query = "UPDATE Alumno_Actividad SET Nota=".$item->suma." WHERE id=".$item->alumno. " AND id_actividad=".$item->actividadpadre.";";
            DB::update($query);
            DB::commit();
        }

        $parciales = "SELECT SUM(b.Nota) AS total, a.id_actividad_padre FROM Actividad a
                            INNER JOIN Alumno_Actividad b ON b.id_actividad = a.id_actividad
                            WHERE a.id_actividad_padre IS NOT NULL
                            GROUP BY a.id_actividad_padre";

        $notas_parciales = DB::SELECT($parciales);

        foreach ($notas_parciales as $key => $item) {
            $nota = "UPDATE Alumno_Actividad SET Nota = ".$item->total." 
            WHERE id_actividad = ".$item->id_actividad_padre.";";

            DB::UPDATE($nota);
            DB::COMMIT();
        }
        
        return view('cerrar');
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
        $portemas = $request->portemas;

        if($examen!='Nota Final'){
            $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                                FROM Clase A
                                INNER JOIN Curso B ON B.id_curso=A.id_curso
                                LEFT JOIN users C ON C.id=A.id_catedratico
                                LEFT JOIN users D ON D.id=A.id
                                WHERE A.id_clase=".$idcurso.";";

            $datos = DB::select($sentencia);
            if($datos[0]->semestre==1){
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
                if($examinados[0]->nexaminados>0){
                    $porcaproexa = $aprobados[0]->naprobados/$examinados[0]->nexaminados*100;
                }
            }catch(Exception $e){
                $porcaproexa = 0;
            }   

            $sreprobados = "SELECT COUNT(*) as nreprobados FROM Alumno_Actividad WHERE Nota<60.5 AND Nota>=0 AND id_actividad=".$examen.";";
            $reprobados = DB::select($sreprobados);  

            $porcrepro = 0;
            try{
                if($examinados[0]->nexaminados>0){
                    $porcrepro = $reprobados[0]->nreprobados/$examinados[0]->nexaminados*100;
                }
            }catch(Exception $e){
                $porcrepro = 0;
            }

            $sausentes = "SELECT COUNT(*) as nausentes FROM Alumno_Actividad WHERE Nota<0 AND id_actividad=".$examen.";";
            $ausentes = DB::select($sausentes); 

            $porcausentes = 0;
            try{
                if($inscritos[0]->ninscritos>0){
                    $porcausentes = $ausentes[0]->nausentes/$inscritos[0]->ninscritos*100;
                }
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

            if(($portemas=="on")and(sizeof($temaspromedio)==0)){
                $temita = 0;
                return view('Reportes.reporte',compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','examen','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio','temita'))->withErrors(['No se puede generar estadísticas por temas ya que no hay ninguno creado para el examen','msg']);
            }else if($portemas=="on"){
                $temita = 1;
                return view('Reportes.reporte',compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','examen','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio','temita')); 
            }else{
                $temita = 0;
                return view('Reportes.reporte',compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','examen','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio','temita')); 
            }
        }else{
            /********************************/
            $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                                FROM Clase A
                                INNER JOIN Curso B ON B.id_curso=A.id_curso
                                INNER JOIN Catedratico C ON C.id_catedratico=A.id_catedratico
                                INNER JOIN users D ON D.id=A.id
                                WHERE A.id_clase=".$idcurso.";";

            $datos = DB::select($sentencia);
            if($datos[0]->semestre==1){
                $datos[0]->semestre = "Primer";
            }else{
                $datos[0]->semestre = "Segundo";
            }

            $sasignados = "SELECT COUNT(*) as nasignados FROM Alumno_Clase WHERE id_clase=".$idcurso." AND Asignado=1;";
            $asignados = DB::select($sasignados);

            $szonaminima = "SELECT COUNT(C.zona) as zonaminima FROM
                                    (SELECT SUM(A.Nota*B.Ponderacion/100) as zona, A.id as alumno
                                        FROM Alumno_Actividad A
                                        INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                        WHERE B.id_clase=".$idcurso." AND B.Ponderada=1 AND B.Tipo!='Final'
                                        GROUP BY A.id) C
                                WHERE C.zona>=35.5";
            $zonaminima = DB::select($szonaminima);
            
            $sexaminados = "SELECT COUNT(*) as nexaminados 
                                FROM Alumno_Actividad A
                                INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final';";
            $examinados = DB::select($sexaminados);                  

            $saprobados = "SELECT COUNT(C.zona) as zonaminima FROM
                                    (SELECT SUM(A.Nota*B.Ponderacion/100) as zona, A.id as alumno
                                        FROM Alumno_Actividad A
                                        INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                        WHERE B.id_clase=".$idcurso." AND B.Ponderada=1
                                        GROUP BY A.id) C
                                WHERE C.zona>=60.5";
            $aprobados = DB::select($saprobados);                   
            
            $porczminas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porczminas = $zonaminima[0]->zonaminima/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porczminas = 0;
            } 

            $porcexas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcexas = $examinados[0]->nexaminados/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porcexas = 0;
            }  

            $porcaproas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcaproas = $aprobados[0]->zonaminima/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porcaproas = 0;
            }

            $porcaproex = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcaproex = $aprobados[0]->zonaminima/$examinados[0]->nexaminados*100;
                }
            }catch(Exception $e){
                $porcaproex = 0;
            }    

            $spromedio = "SELECT AVG(V.nota) as promedio FROM (SELECT SUM(T.Nota*U.Ponderacion/100) as nota, T.id as alumnito
                                FROM (SELECT A.id as alumno
                                    FROM Alumno_Actividad A
                                    INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                    WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final') S
                                INNER JOIN Alumno_Actividad T ON T.id=S.alumno
                                INNER JOIN Actividad U ON U.id_actividad=T.id_actividad
                                WHERE U.id_clase=".$idcurso." AND U.Ponderada=1
                                GROUP BY T.id) V;";
            $promedio = DB::select($spromedio);

            $sdesviacion = "SELECT STD(V.nota) as promedio FROM (SELECT SUM(T.Nota*U.Ponderacion/100) as nota, T.id as alumnito
                                FROM (SELECT A.id as alumno
                                    FROM Alumno_Actividad A
                                    INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                    WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final') S
                                INNER JOIN Alumno_Actividad T ON T.id=S.alumno
                                INNER JOIN Actividad U ON U.id_actividad=T.id_actividad
                                WHERE U.id_clase=".$idcurso." AND U.Ponderada=1
                                GROUP BY T.id) V;";
            $desviacion = DB::select($sdesviacion);

            return view('Reportes.reportefinal',compact('id2','clases','type','news','nombrecurso','idcurso','examen','datos','asignados','zonaminima','examinados','aprobados','porczminas','porcexas','porcaproas','porcaproex','promedio','desviacion'));

        }
    }

    public function descarga(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso');
        $temita = $request->temita;

        $examen = $request->Actividad;
        if($examen!='Nota Final'){
            $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                                FROM Clase A
                                INNER JOIN Curso B ON B.id_curso=A.id_curso
                                LEFT JOIN users C ON C.id=A.id_catedratico
                                LEFT JOIN users D ON D.id=A.id
                                WHERE A.id_clase=".$idcurso.";";

            $datos = DB::select($sentencia);
            if($datos[0]->semestre==1){
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

            $arrtems = [];
            $arrnotas = [];
            foreach ($temaspromedio as $key => $item) {
                array_push($arrtems, $item->nombre);
                array_push($arrnotas, $item->npromedio);
            }


            /* Create and populate the Data object */
            $data = new Data();
            $data->addPoints($arrnotas, "Promedio");
            $data->setAxisName(0, "Promedio");
            $data->addPoints($arrtems, "Temas");
            $data->setSerieDescription("Temas", "Temas");
            $data->setAbscissa("Temas");

            /* Create the Image object */
            $image = new Image(300, 300, $data);
            $image->drawGradientArea(0, 0, 300, 300, DIRECTION_VERTICAL, [
                "StartR" => 240,
                "StartG" => 240,
                "StartB" => 240,
                "EndR" => 180,
                "EndG" => 180,
                "EndB" => 180,
                "Alpha" => 20
            ]);
            $image->drawGradientArea(0, 0, 300, 300, DIRECTION_HORIZONTAL, [
                "StartR" => 240,
                "StartG" => 240,
                "StartB" => 240,
                "EndR" => 180,
                "EndG" => 180,
                "EndB" => 180,
                "Alpha" => 100
            ]);
            $image->setFontProperties(["FontName" => "pf_arma_five.ttf", "FontSize" => 7]);

            /* Draw the chart scale */
            $image->setGraphArea(50, 15, 285, 285);
            $image->drawScale([
                "CycleBackground" => true,
                "DrawSubTicks" => true,
                "GridR" => 0,
                "GridG" => 0,
                "GridB" => 0,
                "GridAlpha" => 10
                //"Pos" => SCALE_POS_TOPBOTTOM
            ]);

            /* Turn on shadow computing */
            $image->setShadow(true, ["X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10]);

            /* Draw the chart */
            $image->drawBarChart(["DisplayPos" => LABEL_POS_INSIDE, "Rounded" => true, "Surrounding" => 30]);

            /* Write the legend */
            $image->drawLegend(570, 215, ["Style" => LEGEND_NOBORDER, "Mode" => LEGEND_VERTICAL]);

            /* Render the picture (choose the best way) */
            $image->render("ejemplito.png");


            $pdf = \PDF::loadView('Reportes.pdf', compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio','temita'));
            return $pdf->download('Estadistica.pdf');

            return view('Reportes.reporte',compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio'));
        }else{
            /********************************/
            $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                                FROM Clase A
                                INNER JOIN Curso B ON B.id_curso=A.id_curso
                                INNER JOIN Catedratico C ON C.id_catedratico=A.id_catedratico
                                INNER JOIN users D ON D.id=A.id
                                WHERE A.id_clase=".$idcurso.";";

            $datos = DB::select($sentencia);
            if($datos[0]->semestre==1){
                $datos[0]->semestre = "Primer";
            }else{
                $datos[0]->semestre = "Segundo";
            }

            $sasignados = "SELECT COUNT(*) as nasignados FROM Alumno_Clase WHERE id_clase=".$idcurso." AND Asignado=1;";
            $asignados = DB::select($sasignados);

            $szonaminima = "SELECT COUNT(C.zona) as zonaminima FROM
                                    (SELECT SUM(A.Nota*B.Ponderacion/100) as zona, A.id as alumno
                                        FROM Alumno_Actividad A
                                        INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                        WHERE B.id_clase=".$idcurso." AND B.Ponderada=1 AND B.Tipo!='Final'
                                        GROUP BY A.id) C
                                WHERE C.zona>=35.5";
            $zonaminima = DB::select($szonaminima);
            
            $sexaminados = "SELECT COUNT(*) as nexaminados 
                                FROM Alumno_Actividad A
                                INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final';";
            $examinados = DB::select($sexaminados);                  

            $saprobados = "SELECT COUNT(C.zona) as zonaminima FROM
                                    (SELECT SUM(A.Nota*B.Ponderacion/100) as zona, A.id as alumno
                                        FROM Alumno_Actividad A
                                        INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                        WHERE B.id_clase=".$idcurso." AND B.Ponderada=1
                                        GROUP BY A.id) C
                                WHERE C.zona>=60.5";
            $aprobados = DB::select($saprobados);                   
            
            $porczminas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porczminas = $zonaminima[0]->zonaminima/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porczminas = 0;
            } 

            $porcexas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcexas = $examinados[0]->nexaminados/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porcexas = 0;
            }  

            $porcaproas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcaproas = $aprobados[0]->zonaminima/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porcaproas = 0;
            }

            $porcaproex = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcaproex = $aprobados[0]->zonaminima/$examinados[0]->nexaminados*100;
                }
            }catch(Exception $e){
                $porcaproex = 0;
            }    

            $spromedio = "SELECT AVG(V.nota) as promedio FROM (SELECT SUM(T.Nota*U.Ponderacion/100) as nota, T.id as alumnito
                                FROM (SELECT A.id as alumno
                                    FROM Alumno_Actividad A
                                    INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                    WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final') S
                                INNER JOIN Alumno_Actividad T ON T.id=S.alumno
                                INNER JOIN Actividad U ON U.id_actividad=T.id_actividad
                                WHERE U.id_clase=".$idcurso." AND U.Ponderada=1
                                GROUP BY T.id) V;";
            $promedio = DB::select($spromedio);

            $sdesviacion = "SELECT STD(V.nota) as promedio FROM (SELECT SUM(T.Nota*U.Ponderacion/100) as nota, T.id as alumnito
                                FROM (SELECT A.id as alumno
                                    FROM Alumno_Actividad A
                                    INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                    WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final') S
                                INNER JOIN Alumno_Actividad T ON T.id=S.alumno
                                INNER JOIN Actividad U ON U.id_actividad=T.id_actividad
                                WHERE U.id_clase=".$idcurso." AND U.Ponderada=1
                                GROUP BY T.id) V;";
            $desviacion = DB::select($sdesviacion);

            $pdf = \PDF::loadView('Reportes.pdffinal', compact('id2','clases','type','news','nombrecurso','idcurso','datos','asignados','zonaminima','examinados','aprobados','porczminas','porcexas','porcaproas','porcaproex','promedio','desviacion'));
            return $pdf->download('Estadistica.pdf');
        }
    }

    public function envio(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');
        $idcurso=$request->idcurso;
        $nombrecurso =Session::get('nombrecurso');
        $temita = $request->temita;

        $examen = $request->Actividad;
        if($examen!='Nota Final'){
            $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                                FROM Clase A
                                INNER JOIN Curso B ON B.id_curso=A.id_curso
                                INNER JOIN Catedratico C ON C.id_catedratico=A.id_catedratico
                                INNER JOIN users D ON D.id=A.id
                                WHERE A.id_clase=".$idcurso.";";

            $datos = DB::select($sentencia);
            if($datos[0]->semestre==1){
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

            $arrtems = [];
            $arrnotas = [];
            foreach ($temaspromedio as $key => $item) {
                array_push($arrtems, $item->nombre);
                array_push($arrnotas, $item->npromedio);
            }


            /* Create and populate the Data object */
            $data = new Data();
            $data->addPoints($arrnotas, "Promedio");
            $data->setAxisName(0, "Promedio");
            $data->addPoints($arrtems, "Temas");
            $data->setSerieDescription("Temas", "Temas");
            $data->setAbscissa("Temas");

            /* Create the Image object */
            $image = new Image(300, 300, $data);
            $image->drawGradientArea(0, 0, 300, 300, DIRECTION_VERTICAL, [
                "StartR" => 240,
                "StartG" => 240,
                "StartB" => 240,
                "EndR" => 180,
                "EndG" => 180,
                "EndB" => 180,
                "Alpha" => 20
            ]);
            $image->drawGradientArea(0, 0, 300, 300, DIRECTION_HORIZONTAL, [
                "StartR" => 240,
                "StartG" => 240,
                "StartB" => 240,
                "EndR" => 180,
                "EndG" => 180,
                "EndB" => 180,
                "Alpha" => 100
            ]);
            $image->setFontProperties(["FontName" => "pf_arma_five.ttf", "FontSize" => 7]);

            /* Draw the chart scale */
            $image->setGraphArea(50, 15, 285, 285);
            $image->drawScale([
                "CycleBackground" => true,
                "DrawSubTicks" => true,
                "GridR" => 0,
                "GridG" => 0,
                "GridB" => 0,
                "GridAlpha" => 10
                //"Pos" => SCALE_POS_TOPBOTTOM
            ]);

            /* Turn on shadow computing */
            $image->setShadow(true, ["X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10]);

            /* Draw the chart */
            $image->drawBarChart(["DisplayPos" => LABEL_POS_INSIDE, "Rounded" => true, "Surrounding" => 30]);

            /* Write the legend */
            $image->drawLegend(570, 215, ["Style" => LEGEND_NOBORDER, "Mode" => LEGEND_VERTICAL]);

            /* Render the picture (choose the best way) */
            $image->render("ejemplito.png");


            $pdf = \PDF::loadView('Reportes.pdf', compact('id2','clases','type','news','nombrecurso','idcurso','nomex','datos','inscritos','examinados','aprobados','porcaproinscri','porcaproexa','reprobados','porcrepro','ausentes','porcausentes','cero','promedio','desv','temaspromedio','temita'));
            

            $nombre = "Estadistica.pdf";
            $storage_path = storage_path();
            $url = $storage_path.'/app/storage/'.$nombre;

            $content = $pdf->output();
            file_put_contents($url, $content);

            $consulta = "SELECT C.Nombre as nombreAuxiliar, D.seccion as Seccion, E.Nombre as nombreCurso, E.id_curso as codigo
                        FROM users C
                        INNER JOIN Clase D ON D.id = C.id
                        INNER JOIN Curso E ON E.id_curso = D.id_curso
                        WHERE D.id_clase=".$idcurso;

            $res = DB::select($consulta);  

            $to_name = "Coordinador";
            $to_email = "";
            $to_curso = $res[0]->nombreCurso;
            $to_archivo = $url;
            $to_seccion = $res[0]->Seccion;
            $to_examen = $nomex;

            $data = array('Auxiliar' => $res[0]->nombreAuxiliar, 'Curso' => $res[0]->nombreCurso, 'Seccion' => $res[0]->Seccion, 'Examen' => $nomex);
            Session::put('data',$data);

            if($res[0]->codigo==101 || $res[0]->codigo==103){
                $to_email = "cesarmorales261@gmail.com";
            }else if($res[0]->codigo==107 || $res[0]->codigo==112 || $res[0]->codigo==114){
                $to_email = "";
            }else{
                $to_email = "";
            }

            Mail::send('emailestadistica', $data, function($message) use ($to_name, $to_email, $to_curso, $to_archivo, $to_seccion, $to_examen) {
                $message->to($to_email, $to_name)
                        ->subject('Estadísticas de ' . $to_examen . ' del curso ' . $to_curso . ' sección ' . $to_seccion);
                $message->from('teo.mate.usac@gmail.com','Departamento de Matemática');
                $message->attach($to_archivo);
            });

            $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso;
            $examenes = DB::select($sentencia2);

            return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes'));
        }else{
            /********************************/
            $sentencia = "SELECT A.seccion, A.semestre, A.anio, B.Nombre as nombrecurso, C.Nombre as nombrecatedratico, D.Nombre as nombreaux 
                                FROM Clase A
                                INNER JOIN Curso B ON B.id_curso=A.id_curso
                                INNER JOIN Catedratico C ON C.id_catedratico=A.id_catedratico
                                INNER JOIN users D ON D.id=A.id
                                WHERE A.id_clase=".$idcurso.";";

            $datos = DB::select($sentencia);
            if($datos[0]->semestre==1){
                $datos[0]->semestre = "Primer";
            }else{
                $datos[0]->semestre = "Segundo";
            }

            $sasignados = "SELECT COUNT(*) as nasignados FROM Alumno_Clase WHERE id_clase=".$idcurso." AND Asignado=1;";
            $asignados = DB::select($sasignados);

            $szonaminima = "SELECT COUNT(C.zona) as zonaminima FROM
                                    (SELECT SUM(A.Nota*B.Ponderacion/100) as zona, A.id as alumno
                                        FROM Alumno_Actividad A
                                        INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                        WHERE B.id_clase=".$idcurso." AND B.Ponderada=1 AND B.Tipo!='Final'
                                        GROUP BY A.id) C
                                WHERE C.zona>=35.5";
            $zonaminima = DB::select($szonaminima);
            
            $sexaminados = "SELECT COUNT(*) as nexaminados 
                                FROM Alumno_Actividad A
                                INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final';";
            $examinados = DB::select($sexaminados);                  

            $saprobados = "SELECT COUNT(C.zona) as zonaminima FROM
                                    (SELECT SUM(A.Nota*B.Ponderacion/100) as zona, A.id as alumno
                                        FROM Alumno_Actividad A
                                        INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                        WHERE B.id_clase=".$idcurso." AND B.Ponderada=1
                                        GROUP BY A.id) C
                                WHERE C.zona>=60.5";
            $aprobados = DB::select($saprobados);                   
            
            $porczminas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porczminas = $zonaminima[0]->zonaminima/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porczminas = 0;
            } 

            $porcexas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcexas = $examinados[0]->nexaminados/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porcexas = 0;
            }  

            $porcaproas = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcaproas = $aprobados[0]->zonaminima/$asignados[0]->nasignados*100;
                }
            }catch(Exception $e){
                $porcaproas = 0;
            }

            $porcaproex = 0;
            try{
                if($asignados[0]->nasignados>0){
                    $porcaproex = $aprobados[0]->zonaminima/$examinados[0]->nexaminados*100;
                }
            }catch(Exception $e){
                $porcaproex = 0;
            }    

            $spromedio = "SELECT AVG(V.nota) as promedio FROM (SELECT SUM(T.Nota*U.Ponderacion/100) as nota, T.id as alumnito
                                FROM (SELECT A.id as alumno
                                    FROM Alumno_Actividad A
                                    INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                    WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final') S
                                INNER JOIN Alumno_Actividad T ON T.id=S.alumno
                                INNER JOIN Actividad U ON U.id_actividad=T.id_actividad
                                WHERE U.id_clase=".$idcurso." AND U.Ponderada=1
                                GROUP BY T.id) V;";
            $promedio = DB::select($spromedio);

            $sdesviacion = "SELECT STD(V.nota) as promedio FROM (SELECT SUM(T.Nota*U.Ponderacion/100) as nota, T.id as alumnito
                                FROM (SELECT A.id as alumno
                                    FROM Alumno_Actividad A
                                    INNER JOIN Actividad B ON A.id_actividad = B.id_actividad
                                    WHERE B.id_clase=".$idcurso." AND A.Nota>=0 AND B.Tipo='Final') S
                                INNER JOIN Alumno_Actividad T ON T.id=S.alumno
                                INNER JOIN Actividad U ON U.id_actividad=T.id_actividad
                                WHERE U.id_clase=".$idcurso." AND U.Ponderada=1
                                GROUP BY T.id) V;";
            $desviacion = DB::select($sdesviacion);

            $pdf = \PDF::loadView('Reportes.pdffinal', compact('id2','clases','type','news','nombrecurso','idcurso','datos','asignados','zonaminima','examinados','aprobados','porczminas','porcexas','porcaproas','porcaproex','promedio','desviacion'));
            
            $nombre = "Estadistica.pdf";
            $storage_path = storage_path();
            $url = $storage_path.'/app/storage/'.$nombre;

            $content = $pdf->output();
            file_put_contents($url, $content);

            $consulta = "SELECT C.Nombre as nombreAuxiliar, D.seccion as Seccion, E.Nombre as nombreCurso, E.id_curso as codigo
                        FROM users C
                        INNER JOIN Clase D ON D.id = C.id
                        INNER JOIN Curso E ON E.id_curso = D.id_curso
                        WHERE D.id_clase=".$idcurso;

            $res = DB::select($consulta);  

            $to_name = "Coordinador";
            $to_email = "";
            $to_curso = $res[0]->nombreCurso;
            $to_archivo = $url;
            $to_seccion = $res[0]->Seccion;

            $data = array('Auxiliar' => $res[0]->nombreAuxiliar, 'Curso' => $res[0]->nombreCurso, 'Seccion' => $res[0]->Seccion, 'Examen' => 'Estadísticas finales');
            Session::put('data',$data);

            if($res[0]->codigo==101 || $res[0]->codigo==103){
                $to_email = "cesarmorales261@gmail.com";
            }else if($res[0]->codigo==107 || $res[0]->codigo==112 || $res[0]->codigo==114){
                $to_email = "";
            }else{
                $to_email = "";
            }

            Mail::send('emailestadistica', $data, function($message) use ($to_name, $to_email, $to_curso, $to_archivo, $to_seccion) {
                $message->to($to_email, $to_name)
                        ->subject('Estadísticas finales del curso ' . $to_curso . ' sección ' . $to_seccion);
                $message->from('teo.mate.usac@gmail.com','Departamento de Matemática');
                $message->attach($to_archivo);
            });

            $sentencia2 = "SELECT Nombre as nombre, id_actividad as idactividad FROM Actividad WHERE id_clase=".$idcurso;
            $examenes = DB::select($sentencia2);

            return view('Reportes.estadistica',compact('id2','clases','type','news','nombrecurso','idcurso','examenes'));
        }
    }
}
