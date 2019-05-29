<?php

namespace App\Http\Controllers;

use Session;
use DB;
use Redirect;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('admin');
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

        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
        	$semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda1 = "SELECT a.id_clase as id, a.semestre, a.anio, a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso  order by c.Nombre,d.id_curso ASC";
    	$cursos = DB::SELECT($busqueda1);

    	$busqueda1 ="SELECT Nombre, id FROM users WHERE tipo = 2";
    	$auxs = DB::SELECT($busqueda1);

    	$busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
    	$cursos2 = DB::SELECT($busqueda1);

    	$busqueda1 = "SELECT id_catedratico as id, Nombre FROM Catedratico;";
    	$cat = DB::SELECT($busqueda1);

    	if(Session::has('msg'))
    	{
    		$msg = Session::get('msg');
    		Session::forget('msg');
    		return view('Admin.listado',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg'));
    	}
        if(Session::has('msg2'))
        {
            $msg2 = Session::get('msg2');
            Session::forget('msg2');
            return view('Admin.listado',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg2'));
        }

        return view('Admin.listado',compact('id2','clases','type','news','cursos','auxs','cursos2','cat'));
    }

    public function index2()
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');

        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
            $semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda1 = "SELECT DISTINCT c.Nombre as aux, c.id, c.email as correo, c.Carnet as carne, c.CUI  FROM Clase a, users c WHERE c.id = a.id AND  c.tipo  =  2 order by c.Nombre ASC";
        $cursos = DB::SELECT($busqueda1);

        $busqueda1 ="SELECT Nombre, id FROM users WHERE tipo = 2";
        $auxs = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
        $cursos2 = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_catedratico as id, Nombre FROM Catedratico;";
        $cat = DB::SELECT($busqueda1);

        if(Session::has('msg'))
        {
            $msg = Session::get('msg');
            Session::forget('msg');
            return view('Admin.listadoaux',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg'));
        }
        if(Session::has('msg2'))
        {
            $msg2 = Session::get('msg2');
            Session::forget('msg2');
            return view('Admin.listadoaux',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg2'));
        }

        return view('Admin.listadoaux',compact('id2','clases','type','news','cursos','auxs','cursos2','cat'));
    }

     public function index3()
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news'); 

        $busqueda1 = "SELECT DISTINCT c.Nombre as aux, c.id, c.email as correo, c.Carnet as carne, c.CUI  FROM users c WHERE  c.tipo  =  3 order by c.Nombre ASC";
        $cursos = DB::SELECT($busqueda1);

        $busqueda1 ="SELECT Nombre, id FROM users WHERE tipo = 2";
        $auxs = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
        $cursos2 = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_catedratico as id, Nombre FROM Catedratico;";
        $cat = DB::SELECT($busqueda1);

        if(Session::has('msg'))
        {
            $msg = Session::get('msg');
            Session::forget('msg');
            return view('Admin.listadouser',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg'));
        }
        if(Session::has('msg2'))
        {
            $msg2 = Session::get('msg2');
            Session::forget('msg2');
            return view('Admin.listadouser',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg2'));
        }

        return view('Admin.listadouser',compact('id2','clases','type','news','cursos','auxs','cursos2','cat'));
    }

    public function index4()
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news'); 

        $busqueda1 = "SELECT c.Nombre as cat, c.id_catedratico as id, c.Area as area, c.Correo as correo FROM Catedratico c;";
        $cursos = DB::SELECT($busqueda1);

        $busqueda1 ="SELECT Nombre, id FROM users WHERE tipo = 2";
        $auxs = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
        $cursos2 = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_catedratico as id, Nombre FROM Catedratico;";
        $cat = DB::SELECT($busqueda1);

        if(Session::has('msg'))
        {
            $msg = Session::get('msg');
            Session::forget('msg');
            return view('Admin.listadocat',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg'));
        }
        if(Session::has('msg2'))
        {
            $msg2 = Session::get('msg2');
            Session::forget('msg2');
            return view('Admin.listadocat',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg2'));
        }

        return view('Admin.listadocat',compact('id2','clases','type','news','cursos','auxs','cursos2','cat'));
    }

    public function asignaraux(Request $request)
    {
    	$aux=$request->aux;
        $curso = $request->curso;
        $seccion=$request->seccion;
        $cat=$request->cat;
        $hora=$request->hora;
        $salon=$request->salon;
        $edificio=$request->edificio;

        $seccion = strtoupper($seccion);
        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
        	$semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda = "SELECT * FROM Clase  WHERE seccion ='".$seccion."' AND id_curso = ".$curso." AND semestre = ".$semestre." AND anio = ".$year.";";
        $consulta = DB::SELECT($busqueda);

        if(count($consulta)!=0)
        {
        	return back()
            ->withErrors(['email'=>"El curso ya ha sido creado"]);
        }
        else
        {

        	$sentencia= "INSERT INTO Clase (seccion,Edificio,salon,horario,semestre,anio,id,id_curso,id_catedratico) VALUES ('".$seccion."','".$edificio."','".$salon."','".$hora."',".$semestre.",".$year.",".$aux.",".$curso.",".$cat.");";
        	DB::INSERT($sentencia);
        	DB::COMMIT();	
            $request->session()->put('msg', "Curso asignado con éxito");
			return redirect("/admin/aux");
		}
    }


    public function crearaux(Request $request)
	{
		$carnet = $request->carne;
		$cui = $request->cui;

		if(!strlen($carnet)==9)
		{
			return back()
			 ->withErrors(['email'=>"Carnet no Válido, Auxiliar no Registrado"]);

		}

		if(!strlen($cui)==13) 
		{
			return back()
			->withErrors(['email'=>"CUI no Válido, Auxiliar no Registrado"]);
		}
		$Letras = array();
		for($i=65; $i<=90; $i++) 
		{  
    		$letra = (string)chr($i); 
    		array_push($Letras, $letra);
    	}  

    	$let1 = strtoupper($Letras[rand(0,24)]);
    	$let2 = $Letras[rand(0,24)];
    	$let3 = strtoupper($Letras[rand(0,24)]);
    	$let4 = strtoupper($Letras[rand(0,24)]);
    	$let5 = $Letras[rand(0,24)];
    	$let6 = $Letras[rand(0,24)];

    	$simbolos = ["!","@","#","$","%","&"];

    	$contra = $let1.$let2.$let3.$let4.$let5.$let6.rand(0,199).$simbolos[rand(0,5)];

		$contra =  Hash::make($contra);
		$busqueda = "SELECT * FROM users WHERE Carnet = ".$carnet." OR email = '".$request->email."' OR CUI =".$cui.";";

		$verificar = DB::SELECT($busqueda);		

		$sentencia= "INSERT INTO users (Carnet,Nombre,email,password,Tipo,CUI) VALUES (".$carnet.",'".$request->name."','".$request->email."','".$contra."',2,'".$cui."');";		
        
        if(count($verificar)==0)
        {
        	$request->session()->put('msg', "Auxiliar creado");
        	DB::insert($sentencia);
        	DB::commit();  
    	}
    	else
    	 {	
        	return back()
        	 ->withErrors(['email'=>"Este correo, carnet o cui ya ha sido registrado"]);
         }
        
		return redirect("/admin/aux");
	}
      public function crearcat(Request $request)
    {
        $name = $request->name;
        $jefe = $request->jefe;
        $area = $request->area;
        $jefe2 = 0;
        $area2 = "NULL";
        $correo2 = "NULL";

        if($jefe)
        {
            $busqueda = "SELECT * FROM Catedratico WHERE Area = '".$area."';";
            $verificar = DB::SELECT($busqueda);
            if(count($verificar)!=0)
            {
                return back()
             ->withErrors(['email'=>"Ya existe un Jefe para el área de ".$area]);
            }
            else
            {
                $jefe2 = 1;
                $area2 = $area;
                $correo2 = $request->email;
            }
        }

        
        $busqueda = "SELECT * FROM Catedratico WHERE Nombre = '".$name."';";

        $verificar = DB::SELECT($busqueda);     

        $sentencia= "INSERT INTO Catedratico (Nombre,Jefe,Area,Correo) VALUES ('".$name."',".$jefe2.",'".$area2."','".$correo2."');";        
        
        if(count($verificar)==0)
        {
            $request->session()->put('msg', "Catedrático creado");
            DB::insert($sentencia);
            DB::commit();  
        }
        else
         {  
             return back()
             ->withErrors(['email'=>"El catedrático ya existe"]);
         }
        
        return redirect("/admin/aux");
    }

    public function editcurso(Request $request)
    {
        $id_clase=$request->clase;

        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
            $semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda1 = "SELECT a.id_clase as id, a.semestre, a.anio, c.id as id_aux, a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico, b.id_catedratico, c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso  AND a.id_clase = ".$id_clase." order by c.Nombre,d.id_curso ASC";

        $clase_actual = DB::SELECT($busqueda1);
        $actual =  (object)array(); 
        $actual->id = $clase_actual[0]->id;
        $actual->aux = $clase_actual[0]->auxiliar;
        $actual->aux_id = $clase_actual[0]->id_aux;
        $actual->curso = $clase_actual[0]->curso;
        $actual->curso_id = $clase_actual[0]->id_curso;
        $actual->seccion = $clase_actual[0]->seccion;
        $actual->edificio= $clase_actual[0]->Edificio;
        $actual->salon = $clase_actual[0]->salon;
        $actual->horario = $clase_actual[0]->horario;
        $actual->catedratico = $clase_actual[0]->Catedratico;
        $actual->catedratico_id = $clase_actual[0]->id_catedratico;
        $actual->semeste = $clase_actual[0]->semestre;
        $actual->anio = $clase_actual[0]->anio;

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');

        $busqueda1 = "SELECT a.id, a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso  order by c.Nombre,d.id_curso ASC";
        $cursos = DB::SELECT($busqueda1);

        $busqueda1 ="SELECT Nombre, id FROM users WHERE tipo = 2";
        $auxs = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
        $cursos2 = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_catedratico as id, Nombre FROM Catedratico;";
        $cat = DB::SELECT($busqueda1);

        return view('Admin.Editcurso',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','actual')); 
    }

    public function editcurso2(Request $request)
    {
        $aux=$request->aux;
        $curso = $request->curso;
        $seccion=$request->seccion;
        $cat=$request->cat;
        $hora=$request->hora;
        $salon=$request->salon;
        $edificio=$request->edificio;
        $id = $request->id;

        $seccion = strtoupper($seccion);
        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
            $semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda = "SELECT * FROM Clase  WHERE seccion ='".$seccion."' AND id_curso = ".$curso." AND semestre = ".$semestre." AND anio = ".$year." AND id_clase != ".$id.";";
        $consulta = DB::SELECT($busqueda);

        if(count($consulta)!=0)
        {
            $request->session()->put('msg2', "El curso ya ha sido creado. Imposible actualizar");
            return redirect("/admin/aux");
        }
        else
        {

            $sentencia= "UPDATE  Clase SET seccion = '".$seccion."', Edificio = '".$edificio."', salon = '".$salon."', horario = '".$hora."', semestre = ".$semestre.",anio = ".$year.", id = ".$aux.", id_curso = ".$curso.", id_catedratico = ".$cat." WHERE id_clase = ".$id.";";
            DB::UPDATE($sentencia);
            DB::COMMIT();   
            $request->session()->put('msg', "Curso Actualizado");
            return redirect("/admin/aux");
        }
    }

    public function editaux(Request $request)
    {
        $id_aux=$request->aux;

        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
            $semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda1 = "SELECT *  FROM  users  where id = ".$id_aux.";";

        $clase_actual = DB::SELECT($busqueda1);
        $actual =  (object)array(); 
        $actual->id = $clase_actual[0]->id;
        $actual->nombre = $clase_actual[0]->Nombre;
        $actual->cui = $clase_actual[0]->CUI;
        $actual->correo = $clase_actual[0]->email;
        $actual->carnet = $clase_actual[0]->Carnet;
       
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');

        return view('Admin.Editaux',compact('id2','clases','type','news','actual')); 
    }

    public function editaux2(Request $request)
    {
        $nombre = $request->name;
        $cui = $request->cui;
        $correo = $request->email;
        $carnet = $request->carnet;
        $id = $request->id;
        
        $busqueda ="SELECT * FROM users WHERE (email='".$correo."' OR cui='".$cui."' OR Carnet='".$carnet."') AND id !='".$id."';";
        $verificar = DB::SELECT($busqueda);

        if(count($verificar)>0)
        {
            $request->session()->put('msg2', "El correo, carnet o cui ya han sido registrados");
            return redirect("/admin/aux2");
        }

        $busqueda = "UPDATE users SET CUI = '".$cui."', Nombre ='".$nombre."',Carnet = '".$carnet."', email = '".$correo."' WHERE id = '".$id."'";
        
        $datos = DB::UPDATE($busqueda); 
        DB::COMMIT();      

       $request->session()->put('msg', "Datos del Auxiliar actualizados");
        return redirect("/admin/aux2");
    }

    public function deleteaux(Request $request)
    {
        $nombre = $request->nombre;
        $id = $request->id;

        $busqueda = "UPDATE users SET tipo = 3 WHERE id = '".$id."'";
        $datos = DB::UPDATE($busqueda); 
        DB::COMMIT(); 

         $request->session()->put('msg', "El auxiliar ".$nombre." ha sido dado de baja");
        return redirect("/admin/aux2");
    }
     public function edituser(Request $request)
    {
        $id_aux=$request->aux;

        $busqueda1 = "SELECT *  FROM  users  where id = ".$id_aux.";";

        $clase_actual = DB::SELECT($busqueda1);
        $actual =  (object)array(); 
        $actual->id = $clase_actual[0]->id;
        $actual->nombre = $clase_actual[0]->Nombre;
        $actual->cui = $clase_actual[0]->CUI;
        $actual->correo = $clase_actual[0]->email;
        $actual->carnet = $clase_actual[0]->Carnet;
       
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');

        return view('Admin.Edituser',compact('id2','clases','type','news','actual')); 
    }

    public function edituser2(Request $request)
    {
        $nombre = $request->name;
        $cui = $request->cui;
        $correo = $request->email;
        $carnet = $request->carnet;
        $id = $request->id;
        
        $busqueda ="SELECT * FROM users WHERE (email='".$correo."' OR cui='".$cui."' OR Carnet='".$carnet."') AND id !='".$id."';";
        $verificar = DB::SELECT($busqueda);

        if(count($verificar)>0)
        {
            $request->session()->put('msg2', "El correo, carnet o cui ya han sido registrados");
            return redirect("/admin/aux2");
        }

        $busqueda = "UPDATE users SET CUI = '".$cui."', Nombre ='".$nombre."',Carnet = '".$carnet."', email = '".$correo."' WHERE id = '".$id."'";
        
        $datos = DB::UPDATE($busqueda); 
        DB::COMMIT();      

       $request->session()->put('msg', "Datos del estudiante actualizados");
        return redirect("/admin/user");
    }

    public function deleteuser(Request $request)
    {
        $nombre = $request->nombre;
        $id = $request->id;

        $busqueda = "UPDATE users SET tipo = 0 WHERE id = '".$id."'";
        $datos = DB::UPDATE($busqueda); 
        DB::COMMIT(); 

         $request->session()->put('msg', "El estudiante ".$nombre." ha sido dado de baja");
        return redirect("/admin/user");
    }

    public function upgradeuser(Request $request)
    {
        $nombre = $request->nombre;
        $id = $request->id;

        $busqueda = "UPDATE users SET tipo = 2 WHERE id = '".$id."'";
        $datos = DB::UPDATE($busqueda); 
        DB::COMMIT(); 

         $request->session()->put('msg', "El estudiante ".$nombre." ya es un auxiliar");
        return redirect("/admin/user");
    }

    public function editcat(Request $request)
    {
        $id_cat=$request->cat;

        $busqueda1 = "SELECT *  FROM  Catedratico  where id_catedratico = ".$id_cat.";";

        $clase_actual = DB::SELECT($busqueda1);
        $actual =  (object)array(); 
        $actual->id = $clase_actual[0]->id_catedratico;
        $actual->nombre = $clase_actual[0]->Nombre;
        $actual->area = $clase_actual[0]->Area;
        $actual->correo = $clase_actual[0]->Correo;
       
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');

        return view('Admin.Editcat',compact('id2','clases','type','news','actual')); 
    }

    public function editcat2(Request $request)
    {
        $nombre = $request->name;
        $area = $request->area;
        $correo = $request->email;
        $id = $request->id;

        $jefe2 = 0;
        $area2 = "";
        $correo2 = "";

        if(strcmp($area, "")!=0)
        {
            $busqueda = "SELECT * FROM Catedratico WHERE Area = '".$area."' AND id_catedratico != ".$id.";";
            $verificar = DB::SELECT($busqueda);
            if(count($verificar)!=0)
            {
             $request->session()->put('msg2', "Ya existe un Jefe para el área ".$area);
                return redirect("/admin/cat");
            }
            else
            {
                $jefe2 = 1;
                $area2 = $area;
                $correo2 = $correo;
            }
        }

        $busqueda = "UPDATE Catedratico SET Nombre = '".$nombre."', Jefe =".$jefe2.", Area = '".$area2."', Correo = '".$correo2."' WHERE id_catedratico = '".$id."'";
        
        $datos = DB::UPDATE($busqueda); 
        DB::COMMIT();      

       $request->session()->put('msg', "Datos del catedrático actualizados");
        return redirect("/admin/cat");
    }

    public function carga(Request $request){
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');
        $news =Session::get('news');

        $mes = date("m"); 
        $semestre =1;
        if($mes>6)
        {
            $semestre=2;
        }
        $year = date("y")+2000; 

        $busqueda1 = "SELECT a.id_clase as id, a.semestre, a.anio, a.seccion, a.Edificio, a.salon, a.horario, b.Nombre as Catedratico,c.Nombre as auxiliar, d.Nombre as curso, d.id_curso  FROM Clase a, Catedratico b, users c , Curso d where a.id_catedratico = b.id_catedratico and c.id = a.id AND d.id_curso = a.id_curso  order by c.Nombre,d.id_curso ASC";
        $cursos = DB::SELECT($busqueda1);

        $busqueda1 ="SELECT Nombre, id FROM users WHERE tipo = 2";
        $auxs = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_curso as id, Nombre FROM Curso;";
        $cursos2 = DB::SELECT($busqueda1);

        $busqueda1 = "SELECT id_catedratico as id, Nombre FROM Catedratico;";
        $cat = DB::SELECT($busqueda1);

        if(Session::has('msg'))
        {
            $msg = Session::get('msg');
            Session::forget('msg');
            return view('Admin.cargamasiva',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg'));
        }
        if(Session::has('msg2'))
        {
            $msg2 = Session::get('msg2');
            Session::forget('msg2');
            return view('Admin.cargamasiva',compact('id2','clases','type','news','cursos','auxs','cursos2','cat','msg2'));
        }

        return view('Admin.cargamasiva',compact('id2','clases','type','news','cursos','auxs','cursos2','cat'));  
    }

    public function cargamasiva(Request $request){
        $periodo=$request->Actividad;
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
                $codigo = intval($fila[0]);
                if(($codigo==101)||($codigo==103)||($codigo==107)||($codigo==112)||($codigo==114)||($codigo==116)||($codigo==118)||($codigo==120)||($codigo==122)||($codigo==123)||($codigo==960)||($codigo==962)){

                    $anio = date("Y");
                    $nombrecat = $fila[14];

                    $sentencia = "SELECT id_catedratico FROM Catedratico WHERE Nombre = '".$nombrecat."';";
                    $actividad = DB::SELECT($sentencia);

                    if(sizeof($actividad)==0){
                        $sentencia = "INSERT INTO Catedratico (Nombre) VALUES ('".$nombrecat."');";
                        DB::insert($sentencia);
                        DB::commit();
                    }

                    $sentencia = "SELECT id_catedratico FROM Catedratico WHERE Nombre = '".$nombrecat."';";
                    $actividad = DB::SELECT($sentencia);
                    $id_actividad = $actividad[0]->id_catedratico;
                    
                    
                    $seccion = $fila[2];
                    $edificio = $fila[3];
                    $salon = $fila[4];
                    $horario = $fila[5]." - ".$fila[6];

                    $sentencia = "INSERT INTO Clase (seccion,Edificio,salon,horario,semestre,anio,id_curso,id_catedratico) VALUES ('".$seccion."','".$edificio."','".$salon."','".$horario."',".$periodo.",".$anio.",".$codigo.",".$id_actividad.");";
                    DB::insert($sentencia);
                    DB::commit();
                }   
            }
            
            $numeroDeFila++;
        }
        fclose($gestor);

        $request->session()->put('msg', "Información de cursos cargada correctamente");
        return redirect("/admin/carga");
    }    
}
