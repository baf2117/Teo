@extends('templates.main')

@section('head')
	<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/dist/css/style.min.css" rel="stylesheet">
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
                                <h5 class="card-title">Listado de Estudiates</h5>
                                <div class="table-responsive">
                                    <table id="estudiates" class="table table-striped table-bordered display">                                   
                                    </table>
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
    <script>
        var dataSet = [

         <?php
            //for ($i=0; $i < 100 ; $i++) { 
                foreach ($alumnos as $key => $item) 
                {
                echo "[ \"".$item->Nombre."\", \"".$item->Carnet."\", \"".$item->CUI."\", \"".$item->email."\"],";
                }
            //}
        ?>
    ];
    $(document).ready(function() {
        $('#estudiates').DataTable( {
            data: dataSet,
            scroller:    true,
            columns: [
            { title: "Nombre" },
            { title: "Registro" },
            { title: "CUI" },
            { title: "Correo" },
            ]
        } );
        var myTable = $('#estudiates').DataTable();

        myTable.fixedHeader.enable();

        $('#estudiates').on( 'click', 'tbody td', function () {
            myTable.cell( this ).edit( 'bubble' );
        } );

    } );
    </script>
@endsection