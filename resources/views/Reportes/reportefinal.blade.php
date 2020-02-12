@extends('templates.main3')

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
   <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><?php echo $nombrecurso; ?></h4>
        </div>
    </div>
</div> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12 align-items-center">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Informe final del curso</h3>   
                    <h4><?php echo $datos[0]->nombrecurso;?>, sección <?php echo $datos[0]->seccion;?></h4>
                    <h5><?php echo $datos[0]->semestre;?> Semestre, <?php echo $datos[0]->anio;?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 align-items-center">
            <div class="card">
                <div class="card-body">
                    <h5>Cat. <?php echo $datos[0]->nombrecatedratico;?></h5>
                    <h5>Aux. <?php echo $datos[0]->nombreaux;?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 align-items-center">                
            <div class="card">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Asignados</td>
                      <td><?php echo $asignados[0]->nasignados;?></td>
                  </tr>
                  <tr>
                      <td>Con zona mínima</td>
                      <td><?php echo $zonaminima[0]->zonaminima;?></td>
                  </tr>
                  <tr>                                    
                      <td>Examinados en final</td>
                      <td><?php echo $examinados[0]->nexaminados;?></td>
                  </tr>
                  <tr>
                      <td>Aprobados en el curso</td>
                      <td><?php echo $aprobados[0]->zonaminima;?></td>
                  </tr>
                  <tr>
                      <td>% con zona mínima/asignados</td>
                      <td><?php echo $porczminas;?>%</td>
                  </tr>
                  <tr>                                    
                      <td>% examinados/asignados</td>
                      <td><?php echo $porcexas;?>%</td>
                  </tr>
                  <tr>
                      <td>% aprobados/asignados</td>
                      <td><?php echo $porcaproas;?>%</td>
                  </tr>
                  <tr>
                      <td>% aprobados/examinados</td>
                      <td><?php echo $porcaproex;?>%</td>
                  </tr>
                  <tr>
                      <td>Nota Promedio</td>
                      <td><?php echo $promedio[0]->promedio;?></td>
                  </tr>
                  <tr>                                    
                      <td>Desviación Típica</td>
                      <td><?php echo $desviacion[0]->promedio;?></td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-4">
    </div>
    <!--<div class="col-md-2">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
            <i class="mdi mdi-library-plus"></i> 
            Tema
        </a>
    </div>-->
    <!--<div class="col-md-2">            
        <button type="button" class="btn m-t-20 btn-block btn-warning ">
            <i class="mdi mdi-content-save"></i> 
            Guardar
        </button>
    </div>-->
    <!--<div class="col-md-2">            
        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit-tema" class="btn m-t-20 btn-secondary btn-block waves-effect waves-light">
            <i class="mdi mdi-table-edit"></i> 
            Editar
        </a>
    </div>-->
    <div class="col-md-2">
        <form method="POST" action="{{ route('estadistica.envio') }}">
        <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                            <input type="hidden" name="Actividad" value="<?php echo "$examen"; ?>">
                              <button type="submit" data-toggle="modal" data-target="" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                  <i class="mdi mdi-send"></i> 
                                  Enviar
                              </button>
                            {{ csrf_field() }}
      </form>
    </div>
    <div class="col-md-2">
      <form method="POST" action="{{ route('estadistica.descarga') }}">
                            <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                            <input type="hidden" name="Actividad" value="<?php echo "$examen"; ?>">
                              <button type="submit" data-toggle="modal" data-target="" class="btn m-t-20 btn-danger btn-block waves-effect waves-light">
                                  <i class="mdi mdi-cloud-download"></i> 
                                  Descargar
                              </button>
                            {{ csrf_field() }}
                        </form>       
    </div>
</div>

<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Crear</strong> una Tema</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="category-name" />
                        </div>                         
                        <div class="col-md-6">
                            <label class="control-label">Puntos</label>
                            <input class="form-control form-white" id ="PuntosE" placeholder="Ingrese un valor" type="number" name="category-name" />
                        </div>                             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal" onclick="temaadd()">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
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
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

@if($errors->any())
<script type="text/javascript">
   $(document).ready(function() {                
    toastr.error('{{ $errors->first() }}');
} );    
</script>
@endif
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
</script>
@endsection