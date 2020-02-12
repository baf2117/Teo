@extends('templates.main')

 @section('head')
    <link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <link href="/assets/extra-libs/DataTables/scroller.bootstrap4.min.css" rel="stylesheet">
    <link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
    @endsection

@section('curso')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span class="d-none d-md-block"><?php echo $nombrecurso; ?> <i class="mdi mdi-menu"></i></span>
       <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
   </a>
   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <form method="POST" action="{{ route('curso.listado') }}">
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
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Permisos</h5>
                        <form method="POST" action="{{ route('permisos.edit') }}">
                            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                            <div class="row">
                                <div class="col-md-3">
                                </div>        
                                <div class="col-md-2">
                                    <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="actividad">
                                        <option value="1">Parcial</option>
                                        <option value="2">Tema de examen</option>
                                        <option value="3">Revision</option>
                                        <option value="4">Final</option>
                                        <option value="5">Tarea</option>
                                        <option value="6">HT</option>
                                        <option value="7">Laboratorio</option>
                                        <option value="8">Retrasada</option>
                                        <option value="9">Otros</option>
                                    </select>
                                </div> 
                                <div class="col-md-2">
                                    <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Permisos" name="permisos">
                                        <option value="Lectura">Lectura</option>
                                        <option value="Escritura">Escritura</option>
                                        <option value="Eliminacion">Eliminaci&oacute;n</option>
                                        <option value="Creacion">Creaci&oacute;n</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Permisos" name="permiso">
                                        <option value="1">Otorgar</option>
                                        <option value="0">Quitar</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" data-toggle="modal" class="btn m-t-20 btn-success waves-effect waves-light">
                                        Permiso
                                    </button>
                                </div>
                            </div> 
                            {{ csrf_field() }}
                        </form>            
                </div>
            </div>
        </div>
    </div>
     <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Permisos</h5>
                        <div class="table-responsive">
                            <table id="permisost" class="table table-striped table-bordered display">  </table>
                        </div>
                    </div>
                </div>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="/assets/libs/toastr/build/toastr.min.js"></script>
<script>
    var dataSet = [
    <?php
       foreach ($permisos as $key => $item) 
        {
            echo  
            "[ 
            \"".$item->Actividad2."\"
            ,\"<i class=\\\"".$item->Escritura2."\\\"></i>\"
            ,\"<i class=\\\"".$item->Eliminacion2."\\\"></i>\"
            ,\"<i class=\\\"".$item->Creacion2."\\\"></i>\"],";
        }
    ?>
    ];
    $(document).ready(function() {
        $('#permisost').DataTable( {
            data: dataSet,
             language : {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
            columns: [
            { title: "Actividad" },
            { title: "Escritura" },
            { title: "Eliminaci&oacute;n" },
            { title: "Creaci&oacute;n" },
            ]
        } );

    } );
</script>

@endsection