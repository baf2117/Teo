@extends('templates.main3')

@section('head')
<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/dist/css/style.min.css" rel="stylesheet">
<link href="/assets/extra-libs/DataTables/scroller.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('curso')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <span class="d-none d-md-block"><?php echo $nombrecurso; ?> <i class="mdi mdi-menu"></i></span>
     <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
 </a>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <form method="POST" action="{{ route('curso.listado2') }}">
           <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
           <input type="submit" class="dropdown-item" value="Listado de Alumnos">
            {{ csrf_field() }}
        </form> 
        <form method="POST" action="{{ route('curso.notas') }}">
           <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
           <input type="submit" class="dropdown-item" value="Gestionar Notas">
            {{ csrf_field() }}
        </form>
        <form method="POST" action="{{ route('curso.recursos') }}">
           <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
           <input type="submit" class="dropdown-item" value="Recursos">
            {{ csrf_field() }}
        </form>  
        <form method="POST" action="{{ route('estadistica') }}">
           <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
           <input type="submit" class="dropdown-item" value="Estadísticas">
            {{ csrf_field() }}
        </form>
        <?php
         if($type>3)
            {
        ?>
        <form method="POST" action="{{ route('permisos') }}">
           <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
           <input type="submit" class="dropdown-item" value="Permisos">
            {{ csrf_field() }}
        </form>
        <?php
            }
        ?>
</div>
</li>
@endsection
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" id="tabla1">
                    <table id="notas" class="table table-striped table-bordered display">                                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-2">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#agregarPonderacion" class="btn m-t-20 btn-primary btn-block waves-effect waves-light">
            <i class="mdi mdi-clipboard-text"></i> 
            Ponderación
        </a>
    </div>
    <div class="col-md-2">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
            <i class="mdi mdi-library-plus"></i> 
            Actividad
        </a>
    </div>
    <div class="col-md-2">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-event" class="btn m-t-20 btn-danger btn-block waves-effect waves-light">
            <i class="fas fa-minus-circle"></i> 
            Eliminar
        </a>
    </div>
    <div class="col-md-2">            
        <button type="button" class="btn m-t-20 btn-block btn-warning " onclick="save()">
            <i class="mdi mdi-content-save"></i> 
            Guardar
        </button>
    </div>
    <div class="col-md-2">            
        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
            <i class="mdi mdi-table-edit"></i> 
            Editar
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-2">
        <form method="POST" action="{{ route('curso.carga') }}">
            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
            <button type="submit" data-toggle="modal" class="btn m-t-20 btn-danger btn-block waves-effect waves-light">
                <i class="mdi mdi-upload"></i> 
                Carga masiva
            </button>
            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-md-2">
        <form method="POST" action="{{ route('curso.descargarNotas') }}">
            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
            <button type="submit" data-toggle="modal" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
                <i class="mdi mdi-download"></i> 
                Descargar Notas
            </button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
</div>

<div class="modal fade none-border" id="agregarPonderacion">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Agregar</strong> una Ponderación</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('curso.guardarPonderacion') }}">
                <div class="row card-body">    
                    <div class="col-md-6">
                        <label class="control-label">Categoria</label>
                        <select class="form-control form-white" data-placeholder="Tipo actividad" name="tipoPonderacion" id="tipoPonderacion">
                            <option value="Parcial">Parcial</option>
                            <option value="Tarea">Tarea</option>
                            <option value="HT">HT</option>
                        </select>
                    </div>   
                    <div class="col-md-6">
                        <label class="control-label">Puntos</label>
                        <input class="form-control form-white" id ="puntosPonderacion" placeholder="Ingrese un valor" type="number" name="puntosPonderacion" step="0.01"/>
                    </div>                       
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <input class="btn btn-danger" value="Guardar" type="submit"/>
                    </div>
                </div> 
                {{ csrf_field() }}
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade none-border" id="add-new-event">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Crear</strong> una Actividad</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('actividad.registro') }}">
                <div class="row card-body">
                    <div class="col-md-6">
                        <label class="control-label">Nombre</label>
                        <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="nombre" required />
                    </div>    
                    <div class="col-md-6">
                        <label class="control-label">Categoria</label>
                        <select class="form-control form-white" data-placeholder="Tipo actividad" name="tipoa" id="tipoa" onchange="cambio()" required>
                            <?php
                            foreach ($creacion as $item)
                                {
                                    echo "<option value=\"$item->id\">$item->Nombre</option>";
                                }
                                ?>
                        </select>
                    </div>                         
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <label class="control-label">Fecha</label>
                        <div class="input-group">
                            <input type="text" id="fecha" name="fecha" class="form-control mydatepicker" placeholder="mm/dd/yyyy" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>                       
                </div>
                <div class="row card-body">
                     <div class="col-md-6">
                        <label class="control-label">Tipo</label>
                        <select class="form-control form-white" id="ponderada" name="ponderada" required="">
                            <option value="1">Ponderada</option>
                            <option value="2">No Ponderada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Puntos</label>
                        <input class="form-control form-white" id ="puntos" placeholder="Ingrese un valor" type="number" name="puntos" step="0.01" required/>
                    </div> 
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <input  type="submit" class="btn btn-danger" value="Guardar" type="submit"/>
                    </div>
                </div> 
                {{ csrf_field() }}
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>
<div class="modal fade none-border" id="delete-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Eliminar</strong> una Actividad</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('calendar.eliminar') }}" >
                                    <div class="row card-body">
                                        <div class="col-md-9">
                                            <label class="control-label">Cursos</label>
                                            <select class="form-control form-white" id="actividad" name="actividad" required="">
                                                <?php
                                                foreach ($eliminacion as $item)
                                                {
                                                    echo "<option value=\"$item->id_actividad\">$item->Nombre-$item->curso $item->seccion</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                            <div class="col-md-3">
                                                 <input class="btn btn-danger" value="Eliminar" type="submit"/>
                                            </div>
                                        </div>  
                                    </div>                                                        
                                    {{ csrf_field() }}                                       
                                </form>
                            </div>
                            <div class="modal-footer">                                 
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
<div class="modal fade none-border" id="edit-event">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Editar</strong> una Actividad</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
             <form method="POST" action="{{ route('actividad.edit') }}">
                <div class="row card-body">
                    <div class="col-md-6">
                        <label class="control-label">Actividad</label>
                        <select id="cambio" class="form-control form-white" data-placeholder="Tipo actividad" name="idactividad">
                            <?php
                            foreach ($actividades as $key => $item) 
                            {
                                echo "<option value=\"$item->id_actividad\">$item->Nombre</option>";
                            }
                            ?>
                        </select>
                    </div>                          
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <label class="control-label">Nombre</label>
                        <input id="cnombre" class="form-control form-white" placeholder="Ingrese un nombre" type="text" name="nombre" />
                    </div>    
                     <div class="col-md-6">
                        <label class="control-label">Categoria</label>
                        <select id="ccat"  class="form-control form-white" data-placeholder="Tipo actividad" name="tipo">
                            <?php
                            foreach ($creacion as $item)
                                {
                                    echo "<option value=\"$item->Nombre\">$item->Nombre</option>";
                                }
                                ?>
                        </select>
                    </div>                         
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <label class="control-label">Fecha</label>
                        <div class="input-group">
                            <input id="cfecha" name="fecha" type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>                       
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <label class="control-label">Tipo</label>
                        <select id="cpond" class="form-control form-white" name="ponderada" required="">
                            <option value="1">Ponderada</option>
                            <option value="2">No Ponderada</option>
                        </select>
                    </div> 
                    <div class="col-md-6">
                        <label class="control-label">Puntos</label>
                        <input id="cpuntos" class="form-control form-white"  placeholder="Ingrese un valor" type="number" name="puntos" />
                    </div>                             
                </div>
                <div class="row card-body">
                    <div class="col-md-6">
                        <input class="btn btn-danger" value="Guardar" type="submit"/>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>

<div style="display: none">
<form id="notasend" name="notasend" method="POST" action="{{ route('save.notas') }}"  target="_blank">
    <input type="text" name="claves" id="claves">
    {{ csrf_field() }}
</form>
     
</div>

@endsection

@section('script')
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/dist/js/jquery.ui.touch-punch-improved.js"></script>
<script src="/dist/js/jquery-ui.min.js"></script>
<script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="/dist/js/waves.js"></script>
<script src="/dist/js/sidebarmenu.js"></script>
<script src="/dist/js/custom.min.js"></script>
<script src="/assets/libs/moment/min/moment.min.js"></script>
<script src="/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="/dist/js/pages/calendar/cal-init.js"></script>
<script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="/dist/js/pages/mask/mask.init.js"></script>
<script src="/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
<script src="/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/libs/quill/dist/quill.min.js"></script>
<script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

<script>
function save()
{
    var padre = document.getElementById("notasend");
    var keys = document.getElementById("claves");
    for (i=0;i<cambios_notas.length;i++) 
    {
        var input = document.createElement("INPUT");
        input.type = 'text';  
        input.setAttribute("id", "nota"+cambios_notas[i].id);
        input.setAttribute("name", "nota"+cambios_notas[i].id);
        input.setAttribute("value", cambios_notas[i].nota);
        padre.appendChild(input);
        var val = keys.value+"nota"+cambios_notas[i].id;
        keys.setAttribute("value", val);
    }
    document.notasend.submit();
    padre.innerHTML = '{{ csrf_field() }}';
    var input = document.createElement("INPUT");
        input.type = 'text';  
        input.setAttribute("id", "claves");
        input.setAttribute("name", "claves");
        padre.appendChild(input);
    cambios_notas = [];
}

function cambio()
{
    var combo = document.getElementById("tipoa").value;
    if(combo.localeCompare("Tema de examen")==0){
        var divi = document.getElementById("divtema");
        divi.setAttribute("style", "display:inline");
    }else{
        var divi = document.getElementById("divtema");
        divi.setAttribute("style", "display:none");
    }
}

</script>

<script>
var dataSet = [
<?php

try {
    $tama = count($notas)/count($actividades);
} catch (Exception $e) {
    $tama = 0;
}
  
$j = 0;
$zona = 0;
$final = 0;
$existefinal = 0;
if($tama>0){
    for ($i = 0; $i <$tama; $i++) 
    {
        $zona =0;
        $final =0;
        echo "[ \"".$notas[$j]->Carnet."\", \"".$notas[$j]->Nombre."\"";
        for ($x =0; $x < count($actividades); $x++) 
        {
            if($notas[$x+$j]->Tipo!="Final")
            {
                if(($notas[$x+$j]->Escritura==1 && $notas[$x+$j]->tipo2 != 1) or $type > 3 )
                {
                    if($notas[$x+$j]->Nota<0)
                    {
                        echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"0.00\\\"></div>\"";
                    }
                    else
                    {
                        echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"".$notas[$x+$j]->Nota."\\\"></div>\"";
                        $zona+=($notas[$x+$j]->Nota*$notas[$x+$j]->Ponderacion)/100;
                    }
                }
                else
                {
                    if($notas[$x+$j]->Nota<0){
                        echo ",0.00";
                    }else{
                        echo ",".$notas[$x+$j]->Nota;
                        $zona+=($notas[$x+$j]->Nota*$notas[$x+$j]->Ponderacion)/100;
                    }
                }
            }
        }

         echo ",\"".$zona."\"";
        for ($x =0; $x < count($actividades); $x++) 
        {
            if($notas[$x+$j]->Tipo=="Final")
            {
                $existefinal = 1;
                if($notas[$x+$j]->Escritura==1  or $type > 3)
                {
                    if($notas[$x+$j]->Nota<0)
                    {
                        echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"0.00\\\"></div>\"";
                    }
                    else
                    {
                        echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"".$notas[$x+$j]->Nota."\\\"></div>\"";
                        $zona+=($notas[$x+$j]->Nota*$notas[$x+$j]->Ponderacion)/100;
                    }
                }
                else
                {
                    if($notas[$x+$j]->Nota<0){
                        echo ",0.00";
                    }else{
                        echo ",".$notas[$x+$j]->Nota;
                        $zona+=($notas[$x+$j]->Nota*$notas[$x+$j]->Ponderacion)/100;
                    }
                }
            }
        }

        if($existefinal==0)
        {
            echo ",0.00";
        }

        $notafin = $final + $zona;

        echo ",\"".$notafin."\"],";
        $j= $j + count($actividades); 
    }
}else{
    $tama = count($notas);
    for ($i = 0; $i <$tama; $i++) 
    {
        echo "[ \"".$notas[$j]->Carnet."\", \"".$notas[$j]->Nombre."\" ],";
    }
}
?>
];
$(document).ready(function() {
    $('#notas').DataTable( {
        data: dataSet,
         language : {
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        scroller: true,
        columns: [
        { title: "Registro" },
        { title: "Nombre" },
        <?php
        foreach ($actividades as $key => $item) 
        {
            if($item->Tipo!="Final")
            {
                $texto =$item->Nombre;
                $texto = str_replace(" ", "_", $texto);
                $texto = $texto." ".$item->Ponderacion."pts";
                echo "{ title: \"$texto\" },"; 
            }
            
        }
        ?>
        { title: "Zona" },
        { title: "Examen_Final" },
        { title: "Nota_Final" },
        ]
    } );

} );


</script>
<script>  
var cambios_notas = new Array(); 
function cambios(id_actividad)
{
    var val = document.getElementById("nota"+id_actividad).value;
    var cambio = new Object();
    cambio.nota = val;
    cambio.id = id_actividad;
    cambios_notas.push(cambio);
}
</script>
<script>
$(".select2").select2();

$('.demo').each(function() {

    $(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        position: $(this).attr('data-position') || 'bottom left',

        change: function(value, opacity) {
            if (!value) return;
            if (opacity) value += ', ' + opacity;
            if (typeof console === 'object') {
                console.log(value);
            }
        },
        theme: 'bootstrap'
    });

});
jQuery('.mydatepicker').datepicker();
jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
});
var quill = new Quill('#editor', {
    theme: 'snow'
});
</script>

@if($errors->any())
    <script type="text/javascript">
    $(document).ready(function() {                
    toastr.error('{!!$errors->first('msg',':message')!!}');
    } );    
    </script>
@endif
<script>

document.getElementById("cambio").onchange = function(){
    var cambio = document.getElementById("cambio");
    var cnombre = document.getElementById("cnombre");
    var cfecha = document.getElementById("cfecha");
    var ccat = document.getElementById("ccat");
    var cpond = document.getElementById("cpond");
    var cpuntos = document.getElementById("cpuntos");

    var actividades=[];
    <?php
        foreach ($actividades as $key => $item) 
        {

            echo "var actividad = {id_actividad:\"$item->id_actividad\", Nombre:\"$item->Nombre\",Ponderada: \"$item->Ponderada\", Ponderacion:\"$item->Ponderacion\",Fecha:\"$item->Fecha\",Tipo:\"$item->Tipo\"};\n";
            echo "actividades.push(actividad);\n";
        }
        ?>

        for (i=0;i<actividades.length;i++) 
        {
                if (actividades[i].id_actividad==cambio.value) 
                {
                    cnombre.value = actividades[i].Nombre;
                    cfecha.value = actividades[i].Fecha;
                    ccat.value = actividades[i].Tipo;
                    cpond.value = actividades[i].Ponderada;
                    cpuntos.value = actividades[i].Ponderacion;
                    
                }
        }

}
</script>
@endsection