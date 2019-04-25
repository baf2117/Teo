<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use Illuminate\Support\Facades\Mail;

class PerfilController extends Controller
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
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $busqueda = "SELECT * FROM users WHERE id = '".$id2."'";
        $datos = DB::SELECT($busqueda); 
        $correo = $datos[0]->email; 
        $carnet = $datos[0]->Carnet; 
        $cui = $datos[0]->CUI;          

        return view('perfil',compact('id2','clases','type','correo','carnet','cui'));
    }

	public function save(Request $request)
    {
        $id2 =Session::get('id2');
        $type =Session::get('tipo');
        $clases =Session::get('clases');

        $nombre = $request->name;
        $cui = $request->cui;
        $correo = $request->email2;
        $carnet = $request->carnet;
        $password = $request->password2;
        
        $credentials = $this->validate(request(), [
            'email'=>'email|required|string',
            'password' => 'required|string'
        ]);

       
        if(!Auth::attempt($credentials))
        {
        	$mensaje = "La contraseña no coincide";
        	$busqueda = "SELECT * FROM users WHERE id = '".$id2."'";
        	$datos = DB::SELECT($busqueda); 
        	$correo = $datos[0]->email; 
        	$carnet = $datos[0]->Carnet; 
        	$cui = $datos[0]->CUI;    
        	return view('perfil',compact('id2','clases','type','correo','carnet','cui','mensaje'));
        }

        if(strlen($password)>0){
			if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%&]{8,}$/", $password))
			{				
				$mensaje = "Error en la los requisitos de la contraseña, asegúrese de que contenga una mayúscula, minuscula, número y longitud mayor a 8 caracteres";
	        	$busqueda = "SELECT * FROM users WHERE id = '".$id2."'";
	        	$datos = DB::SELECT($busqueda); 
	        	$correo = $datos[0]->email; 
	        	$carnet = $datos[0]->Carnet; 
	        	$cui = $datos[0]->CUI;    
	        	return view('perfil',compact('id2','clases','type','correo','carnet','cui','mensaje'));
			}
        }
        $busqueda ="SELECT * FROM users WHERE (email='".$correo."' OR cui='".$cui."') AND id !='".$id2."';";
        $verificar = DB::SELECT($busqueda);

        if(count($verificar)>0)
        {
        	$mensaje = "El correo o cui ya han sido registrados";
        	$busqueda = "SELECT * FROM users WHERE id = '".$id2."'";
        	$datos = DB::SELECT($busqueda); 
        	$correo = $datos[0]->email; 
        	$carnet = $datos[0]->Carnet; 
        	$cui = $datos[0]->CUI;    
        	return view('perfil',compact('id2','clases','type','correo','carnet','cui','mensaje'));
        }

        $busqueda = "UPDATE users SET CUI = '".$cui."', Nombre ='".$nombre."', email = '".$correo."' WHERE id = '".$id2."'";

        if(strlen($password)>0)
        {
        	$contra =  Hash::make($password);
        	$busqueda = "UPDATE users SET password = '".$contra."',CUI = '".$cui."', Nombre ='".$nombre."', email = '".$correo."' WHERE id = '".$id2."'";
        }
        
        $datos = DB::UPDATE($busqueda); 
		DB::COMMIT();      

		

        $busqueda = "SELECT * FROM users WHERE id = '".$id2."'";
        $datos = DB::SELECT($busqueda); 
        $correo = $datos[0]->email; 
        $carnet = $datos[0]->Carnet; 
        $cui = $datos[0]->CUI;          

        $request->session()->put('username', $nombre);
        $request->session()->put('email', $correo);
        $activis2 = array();
        $mensaje2 = "Datos actualizados";
        return view('perfil',compact('id2','clases','type','correo','carnet','cui','mensaje2'));

    }    
}
