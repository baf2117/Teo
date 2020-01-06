@extends('templates.main2')

@section('head')
	<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/dist/css/style.min.css" rel="stylesheet">
@endsection

@section('content')
       <div> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Catedráticos del Departamento</h2>
                                <div class="table-responsive">
                                    <table id="equipo" class="table table-striped table-bordered display">                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Auxiliares del Departamento</h2>
                                <div class="table-responsive">
                                    <table id="auxiliares" class="table table-striped table-bordered display">                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                    Departamento de Matem&aacutetica FIUSAC
            </footer>
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

                foreach ($miembros as $key => $item) 
                {
                    echo "[ \"".$item->Nombre."\", \"".$item->email."\" ],";
                }
        ?>
    ];
    $(document).ready(function() {
        $('#equipo').DataTable( {
            data: dataSet,
             language : {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller:    true,
            columns: [
            { title: "Nombre" },
            { title: "Correo Electrónico" },
            ]
        } );
        var myTable = $('#equipo').DataTable();

        myTable.fixedHeader.enable();

        $('#equipo').on( 'click', 'tbody td', function () {
            myTable.cell( this ).edit( 'bubble' );
        } );

    } );
    </script>

<script>
        var dataSet2 = [

         <?php

                foreach ($auxiliares as $key => $item) 
                {
                    echo "[ \"".$item->Nombre."\", \"".$item->email."\" ],";
                }
        ?>
    ];
    $(document).ready(function() {
        $('#auxiliares').DataTable( {
            data: dataSet2,
             language : {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller:    true,
            columns: [
            { title: "Nombre" },
            { title: "Correo Electrónico" },
            ]
        } );
        var myTable = $('#auxiliares').DataTable();

        myTable.fixedHeader.enable();

        $('#auxiliares').on( 'click', 'tbody td', function () {
            myTable.cell( this ).edit( 'bubble' );
        } );

    } );
    </script>
@endsection