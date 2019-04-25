<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use DB;
use Redirect;


class RegistroController extends Controller
{
	public function crearUsuario(Request $request)
	{
		$password = $request->password;
		$password2 = $request->password2;
		$carnet = $request->carne;
		$cui = $request->cui;

		if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%&]{8,}$/", $password))
		{
			echo "error en la clave\n";

			return redirect()->back()
			->withErrors(['Error en la los requisitos de la contraseña, asegúrese de que contenga una mayúscula, minuscula, número y longitud mayor a 8 caracteres','msg'])
            ->withInput();
		}
		
		if(!strcmp($password,$password2)==0)
		{
			return redirect()->back()
			->withErrors(['No coinciden las contraseñas','msg'])
            ->withInput();
		}

		if(!strlen($carnet)==9)
		{
			return redirect()->back()
			->withErrors(['Verifique su carnet','msg'])
            ->withInput();
		}

		if(!strlen($cui)==13)
		{
			return redirect()->back()
			->withErrors(['Verifique su cui','msg'])
            ->withInput();
		}

		$contra =  Hash::make($password);
		$busqueda = "SELECT * FROM users WHERE Carnet = ".$carnet." OR email = '".$request->email."' OR CUI =".$cui.";";

		$verificar = DB::SELECT($busqueda);		

		$sentencia= "INSERT INTO users (Carnet,Nombre,email,password,Tipo,CUI) VALUES (".$carnet.",'".$request->nombre."','".$request->email."','".$contra."',3,'".$cui."');";		
        
        if(count($verificar)==0)
        {
        	DB::insert($sentencia);
        	DB::commit();  
    	}
    	else
    	 {	
        	return redirect()->back()
			->withErrors(['Este correo, carnet o cui ya ha sido registrado','msg'])
            ->withInput();
         }
        
		return redirect()->route('inicio');
	}
}
