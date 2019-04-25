<?php
$data =  Session::get('data');
?>
<p>Buen día, {{ $data['Nombrealumno'] }}.</p>
<p>Se le recuerda que el día {{ $data['Fecha'] }} tiene la entrega de la actividad {{ $data['Nombreactividad'] }} del curso {{ $data['Nombrecurso'] }} con ponderación de {{ $data['Ponderacion'] }} pts.</p>
