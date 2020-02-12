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
                                <h5 class="card-title">Horarios</h5>
                                <div class="table-responsive">
                                    <table id="estudiates" class="table table-striped table-bordered display">                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none">
                <form id="descarga" name="descarga" method="POST" action="{{ route('recursos.descargar') }}">
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

    function descargar(idrecurso){
        var padre = document.getElementById("descarga");
        var varidrecurso = document.getElementById("idrecurso");
        varidrecurso.setAttribute("value", idrecurso);
        document.descarga.submit();
    }
        var dataSet = [
        <?php
        $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        for ($i = 0; $i <count($recursos); $i++) 
        {
            if($recursos[$i]->Tipo==0){
                echo "[ \"".$recursos[$i]->Nombre."\",
                \"".$recursos[$i]->Descripcion."\",
                \"".$recursos[$i]->nombrecurso."\",
                \"".$recursos[$i]->seccion."\",
                \"".$recursos[$i]->periodo."\",
                \"".$recursos[$i]->anio."\",
                \"<button onclick=\\\"descargar('".$recursos[$i]->NombreArchivo."')\\\" data-toggle=\\\"modal\\\" class=\\\"btn btn-success btn-block waves-effect waves-light\\\"><i class=\\\"mdi mdi-download\\\"></i> Descargar</button>\"
                ],";
            }else{
                $variable2 = str_replace("https://youtu.be/","https://www.youtube.com/embed/",$recursos[$i]->NombreArchivo);
                $variable = str_replace("watch?v=","embed/",$variable2);

                echo "[ \"".$recursos[$i]->Nombre."\",
                \"".$recursos[$i]->Descripcion."\",
                \"".$recursos[$i]->nombrecurso."\",
                \"".$recursos[$i]->seccion."\",
                \"".$recursos[$i]->periodo."\",
                \"".$recursos[$i]->anio."\",
                \"<iframe width=\\\"400\\\" height=\\\"275\\\" src=\\\"" . $variable . "\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen></iframe>\"
                ],";
            }
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
                { title: "Nombre Recurso" },
                { title: "Descripción" },
                { title: "Clase" },
                { title: "Sección" },
                { title: "Periodo" },
                { title: "Año" },
                { title: "Descarga o visualización" }
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