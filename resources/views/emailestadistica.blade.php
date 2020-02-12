<?php
$data =  Session::get('data');
?>
<p>Buen día.</p>
<p>Se adjuntan las estadísticas del curso: {{ $data['Curso'] }} sección {{ $data['Seccion'] }}.</p>
<p><b>Auxiliar:</b> {{ $data['Auxiliar'] }}.</p>
<p><b>Examen:</b> {{ $data['Examen'] }}.</p>