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
         <span class="d-none d-md-block">MB1 A<i class="fa fa-angle-down"></i></span>
         <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <form method="POST" action="{{ route('curso.listado') }}">
               <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
               <input type="submit" class="btn btn-block btn-lg btn-light" value="Listado de Alumnos"></input> 
                {{ csrf_field() }}
            </form> 
            <form method="POST" action="{{ route('curso.notas') }}">
               <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
               <input type="submit" class="text-white btn btn-block btn-lg btn-dark" value="Gestionar Notas"></input> 
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
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">MB1 A</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Notas</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Descargar plantilla para carga</h5>
                        <form method="POST" action="{{ route('curso.plantilla') }}">
                            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <label style="margin-top:25px;" class="control-label">Seleccione actividad</label>
                                </div>        
                                <div class="col-md-2">
                                    <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="Actividad">
                                        <?php
                                        foreach ($actividades as $key => $item) {
                                        ?>
                                        <option value="<?php echo "$item->Nombre";?>"><?php echo "$item->Nombre";?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div> 
                                <div class="col-md-2">
                                    <button type="submit" data-toggle="modal" class="btn m-t-20 btn-danger waves-effect waves-light">
                                        <i class="mdi mdi-download"></i> 
                                        Descargar plantilla
                                    </button>\
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
                    <h5 class="card-title">Carga masiva</h5>
                        <form method="POST" action="{{ route('curso.cargamasiva') }}" enctype="multipart/form-data">
                            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <label style="margin-top:25px;" class="control-label">Seleccione archivo</label>
                                </div>        
                                <div class="col-md-4">
                                    <div class="custom-file" style="margin-top:21px;">
                                        <input type="file" class="custom-file-input" id="archivo" name="archivo" required>
                                        <label class="custom-file-label" for="archivo">Elegir archivo...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <button type="submit" data-toggle="modal" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                        <i class="mdi mdi-download"></i> 
                                        Cargar archivo
                                    </button>\
                                </div>
                            </div> 
                            {{ csrf_field() }}
                        </form>            
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer text-center">
    Departamento de Matem&aacuteticas FIUSAC
</footer> 
<div style="display: none">
    <form id="notasen">
        
    </form>
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