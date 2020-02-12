<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Session;
use DB;

class EquipoController extends Controller
{
    public function show()
    {
        
        $busqueda = "SELECT Nombre, email from users where tipo = 4 and Nombre <> 'Catedratico'";
        $busqueda2 = "SELECT Nombre, email from users where tipo = 2 and Nombre <> 'Auxiliar'";
                        
        $miembros = DB::SELECT($busqueda);
        $auxiliares = DB::SELECT($busqueda2);
    	return view('nosotros.equipo', compact('miembros', 'auxiliares'));
    }
}
