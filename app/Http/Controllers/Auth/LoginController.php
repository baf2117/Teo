<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use DB;
use Redirect;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function showLoginForm()
    {        
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $this->validate(request(), [
            'email'=>'email|required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
            $busqueda = "SELECT * FROM users WHERE email = '".$request->email."'";
            $verificar = DB::SELECT($busqueda); 
            $type = $verificar[0]->tipo;
            $id = $verificar[0]->id;            
            $request->session()->put('tipo', $type);
            $request->session()->put('id2', $id);
            $request->session()->put('username', $verificar[0]->Nombre);
            $request->session()->put('email', $request->email);

            $consultaClases = "SELECT A.id_clase AS IdClase, C.Nombre AS NombreClase, A.seccion AS Seccion, COUNT(E.id_clase) AS CantAlumnos, A.Edificio AS Edificio, A.salon AS Salon, A.horario AS horario, D.Nombre as Catedratico 
                                    FROM Clase A 
                                    INNER JOIN users B ON A.id = B.id 
                                    INNER JOIN Curso C ON C.id_curso = A.id_curso 
                                    INNER JOIN Catedratico D ON D.id_catedratico = A.id_catedratico 
                                    LEFT JOIN Alumno_Clase E ON E.id_clase = A.id_clase
                                    WHERE A.id=".$id." GROUP BY A.id_clase, C.Nombre, A.seccion, A.Edificio, A.salon, A.horario, D.Nombre";

            $consNoticias = "SELECT C.id_noticia as IdNoticia, D.Nombre as Clase, B.seccion as Seccion, C.Titulo as Titulo, C.Fecha, A.Nombre as Nombre
                                    FROM users A
                                    INNER JOIN Clase B ON A.id = B.id
                                    INNER JOIN Noticia C ON C.id_clase = B.id_clase
                                    INNER JOIN Curso D ON D.id_curso = B.id_curso
                                    WHERE A.id=".$id." ORDER BY C.Fecha Desc LIMIT 5";

            $consActividad = "SELECT *, CASE
                                            WHEN Mes = 1 THEN \"Ene\"
                                            WHEN Mes = 2 THEN \"Feb\"
                                            WHEN Mes = 3 THEN \"Mar\"
                                            WHEN Mes = 4 THEN \"Abr\"
                                            WHEN Mes = 5 THEN \"May\"
                                            WHEN Mes = 6 THEN \"Jun\"
                                            WHEN Mes = 7 THEN \"Jul\"
                                            WHEN Mes = 8 THEN \"Ago\"
                                            WHEN Mes = 9 THEN \"Sep\"
                                            WHEN Mes = 10 THEN \"Oct\"
                                            WHEN Mes = 11 THEN \"Nov\"
                                            WHEN Mes = 12 THEN \"Dic\"
                                        END as Mesfin
                                        FROM(SELECT D.Nombre as Clase, B.seccion as Seccion, C.Nombre as Actividad, C.Fecha as Fecha, DAY(C.Fecha) as Dia, MONTH(C.Fecha) as Mes FROM users A
                                                                            INNER JOIN Clase B ON A.id = B.id
                                                                            INNER JOIN Curso D ON D.id_curso = B.id_curso
                                                                            INNER JOIN Actividad C ON B.id_clase = C.id_clase
                                                                            WHERE Fecha >= DATE_ADD(NOW(), INTERVAL -1 DAY) AND A.id=".$id." ORDER BY C.Fecha Asc) q";

            $index = 0;
            $dia = date("d"); 
            $mes = date("m");            
            $activis2 = array();
            $activis = DB::SELECT($consActividad);  
            foreach ($activis as $key => $item) 
            {
                $evento =  (object)array(); 
                $nombrecurso = $item->Clase." ".$item->Seccion;
                $iniciales = explode(" ", $nombrecurso);
                $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];
                $evento->clase = $nombrecurso;
                $evento->titulo = $item->Actividad;
                $difm = $item->Mes - $mes;
                $aviso ="";                
                if($difm==0)
                {
                    $difd = $item->Dia - $dia;
                    switch($difd) 
                    {
                        case 0:
                            $aviso = "Hoy";
                            break;
                        case 1:
                            $aviso = "Mañana";
                            break;
                        default:
                            $aviso = "En ".$difd." días";
                            break;
                    }
                    if($difd>=7)
                    {
                       $semana = date("W");
                       $semana2 = date("W",mktime(0,0,0,$item->Mes,$item->Dia,date("y")));
                       $difsem = $semana2 -$semana;
                       switch ($difsem) {
                           case 1:
                               $aviso = "Próxima Semana";
                               break;  
                           case 2:
                               $aviso = "En dos Semanas";
                               break;  
                           case 3:
                               $aviso = "En tres Semanas";
                               break;                           
                       }
                    }
                }
                else
                {
                    if($difm==1)
                    {
                        $difd=0;
                        switch($mes) 
                        {
                            case 1:
                            case 3:
                            case 5:
                            case 7:
                            case 8:
                            case 10:
                            case 12:
                                $difd = ($item->Dia+31) - $dia;
                                break;
                            case 2:
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                $difd = ($item->Dia+30) - $dia;
                                break;
                            default:
                                $difd = ($item->Dia+28) - $dia;
                                break;
                        }
                         switch($difd) 
                        {
                            case 0:
                                $aviso = "Hoy";
                                break;
                            case 1:
                                $aviso = "Mañana";
                                break;
                            default:
                                $aviso = "En ".$difd." días";
                                break;
                        }
                        if($difd>=7)
                        {
                           $semana = date("W");
                           $semana2 = date("W",mktime(0,0,0,$item->Mes,$item->Dia,date("y")));
                           $difsem = $semana2 -$semana;
                           switch ($difsem) {
                               case 1:
                                   $aviso = "Próxima Semana";
                                   break;  
                               case 2:
                                   $aviso = "En dos Semanas";
                                   break;  
                               case 3:
                                   $aviso = "En tres Semanas";
                                   break;                           
                           }
                        }
                    }
                }
                $evento->aviso = $aviso;
                array_push($activis2, $evento);
            }

            $news = DB::SELECT($consNoticias);
            $clases = DB::SELECT($consultaClases);
              
            $request->session()->put('clases', $clases);
            $request->session()->put('news', $news);
            $request->session()->put('activis', $activis);
            $request->session()->put('activis2',$activis2);
            return view('inicio',compact('clases','type','news','activis')); 
        }
        else
        {

        return back()
            ->withErrors(['email'=>"las credenciales no concuerdan"])
            ->withInput(request(['email']));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
