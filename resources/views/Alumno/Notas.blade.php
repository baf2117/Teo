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
         <span class="d-none d-md-block"><?php echo $nombrecurso." "; ?><i class="mdi mdi-menu"></i></span>
         <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form method="POST" action="{{ route('alumno.notas2') }}">
               <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
               <input type="submit" class="dropdown-item" value="Notas">
                {{ csrf_field() }}
            </form>
            <form method="POST" action="{{ route('alumno.recursos') }}">
               <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
               <input type="submit" class="dropdown-item" value="Recursos">
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
        echo "[";
        for ($x =0; $x < count($actividades); $x++) 
        {
            if($notas[$x+$j]->Nota<0){
                echo "0.00,";
            }else{
                echo $notas[$x+$j]->Nota.",";
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

@endsection