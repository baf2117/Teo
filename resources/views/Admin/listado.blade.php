@extends('templates.main')

@section('head')
<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/dist/css/style.min.css" rel="stylesheet">
<link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
<div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Auxiliares</h5>
                        <div class="table-responsive">
                            <table id="estudiates" class="table table-striped table-bordered display">  </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-curso" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
                    <i class="mdi mdi-clipboard-account"></i> 
                    Curso
                </a>
            </div>
            <div class="col-md-2">            
                <a href="javascript:void(0)" data-toggle="modal" data-target="#add-aux" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                    <i class="mdi mdi-account-plus"></i> 
                    Auxiliar
                </a>
            </div>
            <div class="col-md-2">            
                <a href="javascript:void(0)" data-toggle="modal" data-target="#add-cat" class="btn m-t-20 btn-warning btn-block waves-effect waves-light">
                    <i class="mdi mdi-account-plus"></i> 
                    Catedrático
                </a>
            </div>
        </div>
    </div>
    <div class="modal fade none-border" id="add-new-curso">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Asignar</strong> una Auxiliar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('aux.asignar') }}">
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Auxiliar</label>
                                <select class="form-control form-white" data-placeholder="Auxiliar" name="aux">
                                    <?php
                                    foreach ($auxs as $key => $item) 
                                    {
                                        ?>
                                        <option value="<?php echo $item->id?>"><?php echo $item->Nombre;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Curso</label>
                                <select class="form-control form-white" data-placeholder="Auxiliar" name="curso">
                                    <?php
                                    foreach ($cursos2 as $key => $item) 
                                    {
                                        ?>
                                        <option value="<?php echo $item->id?>"><?php echo $item->Nombre;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>  
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Catedrático</label>
                                <select class="form-control form-white" data-placeholder="Catedrático" name="cat">
                                    <?php
                                    foreach ($cat as $key => $item) 
                                    {
                                        ?>
                                        <option value="<?php echo $item->id?>"><?php echo $item->Nombre;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div> 
                            <div class="col-md-6">
                                <label class="control-label">Seccion</label>
                                <div class="input-group">
                                    <input type="text" id="seccion" name="seccion" class="form-control" placeholder="Sección" required>
                                </div>
                            </div>                       
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Edificio</label>
                                <select class="form-control form-white" data-placeholder="Edificio" name="edificio">
                                    <option value="T-3">T-3</option>
                                    <option value="T-1">T-1</option>
                                    <option value="S12">S12</option>
                                </select>
                            </div>    
                            <div class="col-md-6">
                                <label class="control-label">Horario</label>
                                <select class="form-control form-white" data-placeholder="Horario" name="hora">
                                    <option value="7:10-8:50">7:10-8:50</option>
                                    <option value="7:10-8:00">7:10-8:00</option>
                                    <option value="8:00-8:50">8:00-8:50</option>
                                    <option value="9:00-10:40">9:00-10:40</option>
                                    <option value="9:00-9:50">9:00-9:50</option>
                                    <option value="9:50-10:40">9:50-10:40</option>
                                    <option value="10:50-11:40">10:50-11:40</option>
                                    <option value="13:10-14:00">13:10-14:00</option>
                                    <option value="14:00-14:50">14:00-14:50</option>
                                    <option value="14:50-15:40">14:50-15:40</option>
                                    <option value="14:50-16:30">14:50-16:30</option>
                                    <option value="15:40-16:30">15:40-16:30</option>
                                    <option value="16:30-17:20">16:30-17:20</option>
                                    <option value="17:20-18:10">17:20-18:10</option>
                                    <option value="18:10-19:50">18:10-19:50</option>
                                    <option value="18:10-19:00">18:10-19:00</option>
                                    <option value="19:00-20:40">19:00-20:40</option>
                                    <option value="19:00-19:50">19:00-19:50</option>
                                </select>
                            </div>                         
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Salón</label>
                                <div class="input-group">
                                    <input type="text" id="salon" name="salon" class="form-control" placeholder="Salón" required>
                                </div>
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
    <div class="modal fade none-border" id="add-aux">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Crear</strong> un Auxiliar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('aux.crear') }}">
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Auxiliar</label>
                                <div class="input-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre Completo" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Registro Estudiantil</label>
                                <div class="input-group">
                                    <input type="number" id="carne" name="carne" class="form-control" placeholder="Registro Estudiantil" required>
                                </div>
                            </div>                            
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">CUI</label>
                                <div class="input-group">
                                    <input type="number" id="cui" name="cui" class="form-control" placeholder="CUI" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Correo Electrónico</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                                </div>
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
    <div class="modal fade none-border" id="add-cat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Crear</strong> Catedrático</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('cat.crear') }}">
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Catedrático</label>
                                <div class="input-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre Completo" required>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <label class="control-label">Jefe</label>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="jefe" name="jefe" onclick="alertaChecked()">
                                    <label class="custom-control-label" for="jefe">Sí</label>
                                </div>
                            </div>                                                
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6">
                                <label class="control-label">Área</label>
                                <select class="form-control form-white" data-placeholder="Área" id ="area" name="area" disabled="true">
                                    <option value="Básica">Básica</option>
                                    <option value="Intermedia">Intermedia</option>
                                    <option value="Aplicadas/Cómputo">Aplicadas/Cómputo</option>      
                                </select>
                            </div> 
                            <div class="col-md-6">
                                <label class="control-label">Correo Electrónico</label>
                                <div class="input-group">
                                    <input type="email" id="email3" name="email" class="form-control" placeholder="Correo Electrónico" readonly="true">
                                </div>
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
    @endsection

    @section('script')
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="/dist/js/waves.js"></script>
    <script src="/dist/js/sidebarmenu.js"></script>
    <script src="/dist/js/custom.min.js"></script>
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>
    <script>

       
        var dataSet = [

        <?php
        $ind =0;
        $token = csrf_field();
        $token = str_replace("\"", "\\\"", $token);
        $ruta = route('curso.edit');
        $ruta = str_replace("\"", "\\\"", $ruta);
        foreach ($cursos as $key => $item) 
        {
            echo  
            "[ 
            \"".$item->auxiliar."\"
            , \"".$item->curso."\"
            , \"".$item->seccion."\"
            , \"".$item->horario."\"
            , \"".$item->Edificio."\"
            , \"".$item->salon."\"
            , \"".$item->Catedratico."\"
            , \"".$item->anio."\"
            , \"".$item->semestre."\"
            , \"<form method=\\\"POST\\\" id =\\\"edit".$ind."\\\" action=\\\"".$ruta."\\\"><input type=\\\"submit\\\" class=\\\"btn btn-success\\\" value=\\\"Editar\\\">".$token."<input type=\\\"hidden\\\" name=\\\"clase\\\" value=\\\"".$item->id."\\\"></form>\"],";
            $ind++;
        }
    ?>
    ];
    $(document).ready(function() {
        $('#estudiates').DataTable( {
            data: dataSet,
            language : {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller:    true,
            columns: [
            { title: "Auxiliar" },
            { title: "Curso" },
            { title: "Sección" },
            { title: "Horario" },
            { title: "Edificio" },
            { title: "Salón" },
            { title: "Catedrático" },
            { title: "Año" },
            { title: "Semestre" },
            { title: "Editar"}
            ]
        } );
        var myTable = $('#estudiates').DataTable();

        $('#estudiates').on( 'click', 'tbody td', function () {
            myTable.cell( this ).edit( 'bubble' );
        } );


        @if($errors->any())            
        toastr.error('{!!$errors->first('email',':message')!!}');   
        @endif

        @if(isset ($msg))              
        toastr.success("<?php echo $msg?>");
        @endif

        @if(isset ($msg2))              
        toastr.error("<?php echo $msg2?>");
        @endif

    } );
</script>
<script>
    function alertaChecked()
    {
        if(event.target.checked){ 
            document.getElementById('area').disabled=false;
            document.getElementById('email3').readOnly=false;
        }
        else
        { 
            document.getElementById('area').disabled=true;
            document.getElementById('email3').readOnly=true;
        } 
    }
</script>
@endsection