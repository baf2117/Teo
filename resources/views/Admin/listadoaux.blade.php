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
        $ruta = route('aux.edit');
        $ruta = str_replace("\"", "\\\"", $ruta);
        foreach ($auxs as $key => $item) 
        {
            echo  
            "[ 
            \"".$item->Nombre."\"
            , \"".$item->email."\"
            , \"".$item->CUI."\"
            , \"".$item->Carnet."\"
            , \"<form method=\\\"POST\\\" id =\\\"edit".$ind."\\\" action=\\\"".$ruta."\\\"><input type=\\\"submit\\\" class=\\\"btn btn-success\\\" value=\\\"Editar\\\">".$token."<input type=\\\"hidden\\\" name=\\\"aux\\\" value=\\\"".$item->id."\\\"></form>\"],";
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
            { title: "Nombre" },
            { title: "Correo" },
            { title: "CUI" },
            { title: "Registro" },
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