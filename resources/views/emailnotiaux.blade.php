<?php
$data =  Session::get('data');
?>
<p>Buen día, {{ $data['Nombrealumno'] }}.</p>
<p>Se ha hecho un diálogo en el curso {{ $data['Nombrecurso'] }}, sección {{ $data['Seccion'] }}:</p>
<p><b>Noticia:</b> {{ $data['Titulo'] }}.</p>
<p><b>Alumno:</b> {{ $data['Nomalum'] }}.</p>
<p><b>Mensaje:</b> {{ $data['Mensaje'] }}.</p>
