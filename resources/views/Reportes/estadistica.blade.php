@extends('templates.main')

@section('head')
<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/dist/css/style.min.css" rel="stylesheet">
@endsection

@section('curso')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span class="d-none d-md-block"><?php echo $nombrecurso; ?><i class="fa fa-angle-down"></i></span>
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
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span class="d-none d-md-block">Actividad<i class="fa fa-angle-down"></i></span>
       <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
   </a>
   <!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="#">Primer Parcial</a>          
    <a class="dropdown-item" href="#">Segundo Parcial</a>
    <a class="dropdown-item" href="#">Tercer Parcial</a>
    <a class="dropdown-item" href="#">Final</a>
    <a class="dropdown-item" href="#">Informe Curso</a>
    <a class="dropdown-item" href="#">Primera Retrasada</a>-->
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
                    <h5 class="card-title">Descargar plantilla para carga</h5>
                        <form method="POST" action="{{ route('estadistica.generacion') }}">
                            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="margin-top:25px;" class="control-label">Seleccione la estadística que desea generar</label>
                                </div>        
                                <div class="col-md-4">
                                    <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="Actividad">
                                        <?php
                                        foreach ($examenes as $key => $item) {
                                        ?>
                                        <option value="<?php echo "$item->idactividad";?>"><?php echo "$item->nombre";?></option>
                                        <?php
                                        }
                                        ?>
                                        <option value="Nota Final">Nota final</option>
                                    </select>
                                </div> 
                                <div class="col-md-2">
                                    <button type="submit" data-toggle="modal" class="btn m-t-20 btn-danger waves-effect waves-light">
                                        <i class="mdi mdi-download"></i> 
                                        Generar
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
<script type="text/javascript">
    

@endsection