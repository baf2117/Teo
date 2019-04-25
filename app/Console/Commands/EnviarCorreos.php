<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Mail;
use Session;

class EnviarCorreos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:correos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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

	$consulta = "SELECT A.Fecha Fecha, A.Nombre as Nombreactividad, E.Nombre as Nombrecurso, D.seccion as Seccion, C.Nombre as Nombrealumno, C.email as Email
                        FROM Actividad A 
                        INNER JOIN Clase D ON D.id_clase = A.id_clase
                        INNER JOIN users C ON D.id = C.id                        
                        INNER JOIN Curso E ON E.id_curso = D.id_curso
                        WHERE ADDDATE(CURDATE(), 1) = Fecha AND id_actividad_padre IS NULL;";

	$res2 = DB::select($consulta);  
        
        foreach ($res2 as $key => $item) {
            $to_name = $item->Nombrealumno;
            $to_email = $item->Email;
            $to_curso = $item->Nombrecurso;
	    $to_seccion = $item->Seccion;
            $data = array('Fecha' => $item->Fecha, 'Nombreactividad' => $item->Nombreactividad, 'Seccion' => $item->Seccion, 'Nombrecurso' => $item->Nombrecurso, 'Nombrealumno' => $item->Nombrealumno);
            Session::put('data',$data);        
            Mail::send('emailaux', $data, function($message) use ($to_name, $to_email, $to_curso, $to_seccion) {
                $message->to($to_email, $to_name)
                        ->subject('Recordatorio de actividad del curso de ' . $to_curso . ', sección ' . $to_seccion);
                $message->from('teo.mate.usac@gmail.com','Departamento de Matemática');
            });
        }
    }
}
