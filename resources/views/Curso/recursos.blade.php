@extends('templates.main3')

    @section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <!-- <link href="/assets/extra-libs/DataTables/scroller.bootstrap4.min.css" rel="stylesheet"> -->
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
<div>
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><?php echo Session::get('nombrecurso');?></h4>
        </div>
    </div>
</div> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Archivos disponibles</h5>
                    <div class="table-responsive">
                        <table id="recursos" class="table table-striped table-bordered display"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
                    <i class="mdi mdi-library-plus"></i> 
                    Recurso
                </a>
            </div>              
        </div>
    </div>         
</div>

<div style="display: none">
    <form id="notasend" name="notasend" method="POST" action="{{ route('curso.descargar') }}">
        <input type="text" name="idcurso" id="idcurso">
        <input type="text" name="idrecurso" id="idrecurso">
        {{ csrf_field() }}
    </form>

    <form id="notasend2" name="notasend2" method="POST" action="{{ route('curso.eliminarRecurso') }}">
        <input type="text" name="idcurso2" id="idcurso2">
        <input type="text" name="idrecurso2" id="idrecurso2">
        <input type="text" name="tipoRecurso" id="tipoRecurso">
        {{ csrf_field() }}
    </form>
         
</div>

<div class="modal fade none-border" id="add-new">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Crear</strong> Recurso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('curso.guardarrecurso') }}" enctype="multipart/form-data">
                    <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Nombre del recurso</label>
                            <input class="form-control form-white" id ="nombreRecurso" placeholder="Ingrese un nombre" type="text" name="nombreRecurso" />
                        </div>        
                        <div class="col-md-6">
                        <label class="control-label">Descripción del recurso</label>
                        <input class="form-control form-white" id ="descripcionRecurso" placeholder="Ingrese una descripción" type="text" name="descripcionRecurso" />
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label style="margin-top:25px;" class="control-label">Tipo de recurso</label>
                            <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="tipoRecurso" id="tipoRecurso" onchange="cambiar();">
                                <option value="0">Documento</option>
                                <option value="1">Video</option>
                            </select>
                        </div> 
                        <div class="col-md-6">
                            <label style="margin-top:25px;" class="control-label">Privacidad</label>
                            <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="publico" id="publico">
                                <option value="0">Privado</option>
                                <option value="1">Público</option>
                            </select>
                        </div>   
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6" id="div1" name="div1" style="display:block;">
                            <input type="file" class="custom-file-input" id="archivo" name="archivo">
                            <label class="custom-file-label" for="archivo">Elegir archivo...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        <div class="col-md-6" id="div2" name="div2" style="display:none;">
                            <label style="margin-top:25px;" class="control-label">Enlace del video</label>
                            <input class="form-control form-white" id ="enlaceVideo" placeholder="Ingrese el enlace del video" type="text" name="enlaceVideo" />
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" data-toggle="modal" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                <i class="mdi mdi-upload"></i> 
                                Cargar recurso
                            </button>
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

<script type="text/javascript">
    var combito = false;
    function cambiar(){
        combito = !combito;
        var div1 = document.getElementById("div1");
        var div2 = document.getElementById("div2");

        if(combito){
            div1.style.display = "none";
            div2.style.display = "block";
        }else{
            div1.style.display = "block";
            div2.style.display = "none";
        }
    }
</script>

<script>
    
    function postear(idcurso, idrecurso){
        var padre = document.getElementById("notasend");
        var varidcurso = document.getElementById("idcurso");
        var varidrecurso = document.getElementById("idrecurso");

        varidcurso.setAttribute("value", idcurso);
        varidrecurso.setAttribute("value", idrecurso);

        document.notasend.submit();
    }

    function postear2(idcurso, idrecurso, tipoRecurso){
        var padre = document.getElementById("notasend2");
        var varidcurso = document.getElementById("idcurso2");
        var varidrecurso = document.getElementById("idrecurso2");
        var vartipoRecurso = document.getElementById("tipoRecurso");

        varidcurso.setAttribute("value", idcurso);
        varidrecurso.setAttribute("value", idrecurso);
        vartipoRecurso.setAttribute("value", tipoRecurso);

        document.notasend2.submit();
    }
</script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });


    var dataSet = [
    <?php
    $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    for ($i = 0; $i <count($recursos); $i++) 
    {
        $publico = "fas fa-window-close";
        if($recursos[$i]->publico===1)
        {
            $publico = "fas fa-check-circle";
        }

        if($recursos[$i]->Tipo==0){
            echo "[ \"".$recursos[$i]->Nombre."\",
            \"".$recursos[$i]->Descripcion."\", 
            \"<button onclick=\\\"postear('".$idcurso."','".$recursos[$i]->NombreArchivo."')\\\" data-toggle=\\\"modal\\\" class=\\\"btn btn-success btn-block waves-effect waves-light\\\"><i class=\\\"mdi mdi-download\\\"></i> Descargar</button>\",
            \"<button onclick=\\\"postear2('".$idcurso."','".$recursos[$i]->NombreArchivo."','".$recursos[$i]->Tipo."')\\\" data-toggle=\\\"modal\\\" class=\\\"btn btn-danger btn-block waves-effect waves-light\\\"><i class=\\\"mdi mdi-delete\\\"></i> Eliminar</button>\",
            \"".$space."<i class=\\\"".$publico."\\\"></i>\"],";
        }else{
            $variable2 = str_replace("https://youtu.be/","https://www.youtube.com/embed/",$recursos[$i]->NombreArchivo);
            $variable = str_replace("watch?v=","embed/",$variable2);

            echo "[ \"".$recursos[$i]->Nombre."\",
            \"".$recursos[$i]->Descripcion."\",
            \"<iframe width=\\\"400\\\" height=\\\"275\\\" src=\\\"" . $variable . "\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen></iframe>\", \"<button onclick=\\\"postear2('".$idcurso."','".$recursos[$i]->NombreArchivo."','".$recursos[$i]->Tipo."')\\\" data-toggle=\\\"modal\\\" class=\\\"btn btn-danger btn-block waves-effect waves-light\\\"><i class=\\\"mdi mdi-delete\\\"></i> Eliminar</button>\",
            \"".$space."<i class=\\\"".$publico."\\\"></i>\"],";
        }
    }
    ?>
    ];
    $(document).ready(function() {
        $('#recursos').DataTable( {
            data: dataSet,
             language : {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
            columns: [
            { title: "Nombre Recurso" },
            { title: "Descripción" },
            { title: "Descarga o visualización" },
            { title: "Eliminación" },
            { title: "Público" },
            ]
        } );
        var myTable = $('#recursos').DataTable();

        myTable.fixedHeader.enable();

        $('#recursos').on( 'click', 'tbody td', function () {
            myTable.cell( this ).edit( 'bubble' );
        } );

        $('#register').submit(function(){
            var varidcurso = $('#idcurso').val();
            var varidrecurso = $('#idrecurso').val();

            var dataString = "idcurso="+varidcurso+"&idrecurso="+varidrecurso;
            $.ajax({
                type: "POST",
                url: "register",
                data: dataString,
                success: function(data){
                    console.log(data);
                }
            });
        });
    });
    
</script>
@endsection