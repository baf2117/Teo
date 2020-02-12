<?php
$data =  Session::get('data');
?>
<p>Buen día, {{ $data['Nombrealumno'] }}.</p>
<p>Se ha compartido una noticia del curso {{ $data['Nombrecurso'] }}:</p>
<p><b>Título:</b> {{ $data['Titulo'] }}.</p>
<p><b>Descripción:</b> {{ $data['Descripcion'] }}.</p>
