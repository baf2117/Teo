  @extends('templates.main')

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
        <div class="col-md-2">
            
        </div>
        <div class="col-md-2">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
                <i class="mdi mdi-library-plus"></i> 
                Actividad
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
                            <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="nombre" />
                        </div>    
                        <div class="col-md-6">
                            <label class="control-label">Categoria</label>
                            <select class="form-control form-white" data-placeholder="Tipo actividad" name="tipoa" id="tipoa" onchange="cambio()">
                                <option value="Parcial">Parcial</option>
                                <option value="Tema de examen">Tema de examen</option>
                                <option value="Revision">Revision</option>
                                <option value="Final">Final</option>
                                <option value="Tarea">Tarea</option>
                                <option value="HT">HT</option>
                                <option value="Lab">Laboratorio</option>
                                <option value="Retrasada">Retrasada</option>
                                <option value="Otro">Otros</option>
                            </select>
                        </div>                         
                    </div>
                    <div class="row card-body" style="display: none" id="divtema" name="divtema">    
                        <div class="col-md-6">
                            <label class="control-label">Parcial a añadir tema</label>
                            <select class="form-control form-white" data-placeholder="Parcial" name="nombreparcial" id="nombreparcial">
                                <?php
                                foreach ($parciales as $key => $item) {
                                ?>
                                <option value="<?php echo "$item->idactividad";?>"><?php echo "$item->nombreactividad";?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>                         
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Fecha</label>
                            <div class="input-group">
                                <input type="text" id="fecha" name="fecha" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
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
                            <input class="form-control form-white" id ="puntos" placeholder="Ingrese un valor" type="number" name="puntos" step="0.01"/>
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
<div class="modal fade none-border" id="edit-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Editar</strong> una Actividad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Evento</label>
                            <select class="form-control form-white" data-placeholder="Tipo actividad" name="category-color">
                                <option value="success">Tarea1</option>
                                <option value="danger">Tarea2</option>
                                <option value="info">Tarea5</option>
                                <option value="primary">Tarea2</option>
                                <option value="warning">Corto2</option>
                            </select>
                        </div>                          
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="category-name" />
                        </div>    
                         <div class="col-md-6">
                            <label class="control-label">Categoria</label>
                            <select class="form-control form-white" data-placeholder="Tipo actividad" name="category-color">
                                <option value="success">Parcial</option>
                                <option value="danger">Revision</option>
                                <option value="info">Final</option>
                                <option value="primary">Tarea</option>
                                <option value="warning">Otros</option>
                            </select>
                        </div>                         
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Fecha Inicio</label>
                            <div class="input-group">
                                <input type="text" id="eventoF1" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Fecha Fin</label>
                            <div class="input-group">
                                <input type="text" id="eventoF2" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Tipo</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="Ponderada" name="radio-stacked" required>
                                <label class="custom-control-label" for="Ponderada">Poderada</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="NoPoderada" name="radio-stacked" required>
                                <label class="custom-control-label" for="NoPoderada">No Ponderada</label>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <label class="control-label">Puntos</label>
                            <input class="form-control form-white" id ="PuntosE" placeholder="Ingrese un valor" type="number" name="category-name" />
                        </div>                             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal" onclick="nueva()">Guardar</button>
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
<script src="/assets/extra-libs/DataTables/dataTables.scroller.min.js"></script>

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
    for ($i = 0; $i <$tama; $i++) 
    {
        echo "[ \"".$notas[$j]->Nombre."\", \"".$notas[$j]->Carnet."\"";
        for ($x =0; $x < count($actividades); $x++) 
        {
            if($notas[$x+$j]->Nota<0){
                echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"0.00\\\"></div>\"";
            }else{
                echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"".$notas[$x+$j]->Nota."\\\"></div>\"";
            }
        }
        echo "],";
        $j= $j + count($actividades); 
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
            { title: "Nombre" },
            { title: "Carnet" },
            <?php
            foreach ($actividades as $key => $item) 
            {
                echo "{ title: \"$item->Nombre - $item->Ponderacion pts \" },";
            }
            ?>
            ]
        } );
        var myTable = $('#notas').DataTable();

        myTable.fixedHeader.enable();


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
 function nueva() {
    var dataSet = [
    [ "Brayan Alexander Flores", "201403564","<div class=\"row\"><input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Nota\" aria-label=\"Nota\" aria-describedby=\"basic-addon1\" required=\"\"><div>"],
    ];
    evento = document.getElementById("eventoN").value;
    dateStr = document.getElementById("eventoF1").value;
    dateStr2 = document.getElementById("eventoF2").value;
    puntos = document.getElementById("PuntosE").value;

    var contenido = evento.concat("/"+puntos+"pts")

    var table1 = document.getElementById("tabla1");
    table1.innerHTML = '';

    var tb3 = document.createElement("table"); 
    tb3.setAttribute("id", "notas");
    tb3.setAttribute("class","table table-striped table-bordered");
    table1.appendChild(tb3);  

    $(document).ready(function() {
        $('#notas').DataTable( {
            data: dataSet,
             language : {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            deferRender:    true,
            scroller:       true,
            columns: [
            { title: "Nombre" },
            { title: "Carnet" },            
            { title: contenido },
            { title: evento },
            ]
        } );
    } );
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
@endsection