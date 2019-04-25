<?php
$data =  Session::get('data');
?>
<p>Buen día, {{ $data['Nombrealumno'] }}.</p>
<p>Se le recuerda que el día {{ $data['Fecha'] }} debe recibir la actividad {{ $data['Nombreactividad'] }} del curso {{ $data['Nombrecurso'] }}, sección {{ $data['Seccion'] }}.</p>