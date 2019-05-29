<?php

namespace App\Http\Controllers;

 
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;


class MailController extends Controller
{
     public function send(Request $request)
    {

    	$busqueda = "SELECT * FROM users WHERE email = '".$request->email."'";
        $verificar = DB::SELECT($busqueda); 

        if(sizeof($verificar)==0)
        {
        	$msg = 'No existe el correo '.$request->email.' registrado';
        	return view('login',compact('msg'));
        }

        $name = $verificar[0]->Nombre;
        $id = $verificar[0]->id;

        $Letras = array();
        for($i=97; $i<=123; $i++) 
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

        $contra2 =  Hash::make($contra);


        $sql = "UPDATE users SET password = '".$contra2."' WHERE users.id = ".$id.";";
        DB::UPDATE($sql);
        DB::Commit();

        $objDemo = new \stdClass();
        $objDemo->contra = $contra;
        $objDemo->receiver = $name;
 
        Mail::to($request->email)->send(new SendMail($objDemo));

        $msg2 = 'Se ha enviado un correo a: '.$request->email.', para poder ingresar de nuevo a TEO';
        return view('login',compact('msg2'));
    }
}
