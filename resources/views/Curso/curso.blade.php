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

    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="col-md-2">
            <form method="POST" action="{{ route('curso.descargarListado') }}">
                <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                <button type="submit" data-toggle="modal" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
                    <i class="mdi mdi-download"></i> 
                    Descargar listado
                </button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

<div style="display: none">
    <form id="notasend" name="notasend" method="POST" action="{{ route('curso.eliminarEstudiante') }}">
        <input type="text" name="idcurso" id="idcurso">
        <input type="text" name="idrecurso" id="idrecurso">
        {{ csrf_field() }}
    </form>
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
        function postear(idcurso, idrecurso){
            var padre = document.getElementById("notasend");
            var varidcurso = document.getElementById("idcurso");
            var varidrecurso = document.getElementById("idrecurso");
            console.log(idcurso);
            console.log(idrecurso);
            varidcurso.setAttribute("value", idcurso);
            varidrecurso.setAttribute("value", idrecurso);

            document.notasend.submit();
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
            //for ($i=0; $i < 100 ; $i++) { 
                foreach ($alumnos as $key => $item) 
                {
                echo "[ \"".$item->Carnet."\", \"".$item->Nombre."\", \"".$item->CUI."\", \"".$item->email."\", \"<button onclick=\\\"postear('".$idcurso."','".$item->id."')\\\" data-toggle=\\\"modal\\\" class=\\\"btn btn-danger btn-block waves-effect waves-light\\\"><i class=\\\"mdi mdi-delete\\\"></i> Desmatricular</button>\"],";
                }111
            //}
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
            { title: "Registro" },
            { title: "Nombre" },
            { title: "CUI" },
            { title: "Correo" },
            { title: "Desmatriculación" },
            ]
        } );
        var myTable = $('#estudiates').DataTable();


        $('#estudiates').on( 'click', 'tbody td', function () {
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
    } );
    </script>
@endsection