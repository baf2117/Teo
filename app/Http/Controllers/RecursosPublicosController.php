<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Felicitacion;

class RecursosPublicosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    public function recursos(Request $request)
    { 
        //$idcurso=$request->idcurso;
        //$nombrecurso =Session::get('nombrecurso');  

        $sentencia = "SELECT * FROM Recursos  WHERE id_clase is NULL ORDER by id_recurso DESC;";
        
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        //$clases =Session::get('clases');
        //$nombrecurso =Session::get('nombrecurso');  
        return view('Admin.recursos_publicos', compact('id2', 'type', 'recursos'));
    }

    public function guardarrecurso(Request $request)
    {
        $idcurso = null;
        $id2 = Session::get('id2');
        $type = Session::get('tipo');
        //$clases =Session::get('clases');

        $sentencia = "SELECT MAX(id_recurso) as Maximo FROM Recursos;";
        $aux = DB::select($sentencia);
        $maximo = $aux[0]->Maximo;
        $maxint = intval($maximo) + 1;

        $tipito=$request->tipoRecurso;
        $nom=$request->nombreRecurso;     
        $desc=$request->descripcionRecurso;
        $publico = 1;

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

            $sentencia = "INSERT INTO Recursos (Nombre,NombreArchivo,Descripcion,Tipo,id_clase,publico) VALUES ('".$nom."','".$nombrefin."','".$desc."','".$tipito."', null, 1);";
            DB::insert($sentencia);
        }else{
            $nombrefin = $request->enlaceVideo;
            $sentencia = "INSERT INTO Recursos (Nombre,NombreArchivo,Descripcion,Tipo,id_clase,publico) VALUES ('".$nom."','".$nombrefin."','".$desc."','".$tipito."', null, 1);";
            DB::insert($sentencia);
        }

        $sentencia = "SELECT * FROM Recursos WHERE id_clase is null ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        //$clases =Session::get('clases');
        //$nombrecurso =Session::get('nombrecurso');  
        return view('Admin.recursos_publicos', compact('id2', 'type', 'recursos'));
    }


    public function descargar(Request $request)
    {
        $idrecurso = $request->idrecurso;
        $storage_path = storage_path();
        $url = $storage_path.'/app/storage/'.$idrecurso;
        echo $url;
        info($url);

        header ("Content-Disposition: attachment; filename=".$idrecurso); 
        header ("Content-Type: application/octet-stream"); 
        header ("Content-Length: ".filesize($url)); 
        readfile($url); 
    }

    public function eliminarRecurso(Request $request)
    {
        //return "HOLA MUNDO";
        $idcurso = null;
        $idrecurso = $request->idrecurso2;
        $storage_path = storage_path();
        if($request->tipoRecurso==0){
            Storage::delete($idrecurso);
        }

        $url = $storage_path.'/app/storage/'.$idrecurso;

        $sentencia = "DELETE FROM Recursos WHERE id_clase is null AND NombreArchivo='" . $idrecurso . "';";
        DB::delete($sentencia);
        DB::commit();

        $sentencia = "SELECT * FROM Recursos WHERE id_clase is null  ORDER by id_recurso DESC;";
        $recursos = DB::select($sentencia);

        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        //$clases =Session::get('clases');
        //$nombrecurso =Session::get('nombrecurso');  
        return view('Admin.recursos_publicos', compact('id2', 'type', 'recursos'));

        //return view('cerrar');
    }
}
