@extends('templates.main')
@section('news')

@endsection
@section('content')
    <div>
         <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Inicio</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">   
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">              
               
                 <div class="row">
                    <div class="col-12  align-items-center">
                    <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <?php
                                $cont = 0;
                                foreach ($clases as $key => $item) {
                                ?>     
                                <li class="nav-item"> <a class="<?php if ($cont==0) {echo("nav-link active"); $cont++;} else { echo("nav-link"); } ?>" data-toggle="tab" href="#<?php echo "$item->IdClase";?>" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"><?php 
                                    $nombrecurso = $item->NombreClase." ".$item->Seccion;
                                    $iniciales = explode(" ", $nombrecurso);
                                    $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];
                                    echo $nombrecurso;
                                ?></span></a> </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <?php
                                $cont = 0;
                                foreach ($clases as $key => $item) {
                                ?>
                                <div class="<?php if ($cont==0) {echo("tab-pane active"); $cont++;} else { echo("tab-pane"); } ?>" id="<?php echo "$item->IdClase";?>" role="tabpanel">
                                    <div class="p-20">                           
                                        <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <a href="/curso">
                                                            <div class="card card-hover">
                                                                <div class="box bg-cyan text-center" href="/curso">
                                                                    <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                                                                    <h6 class="text-white">Alumnos<br/><?php echo "$item->CantAlumnos";?></h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/><?php echo "$item->Edificio";?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salón<br/><?php echo "$item->Salon";?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/><?php echo "$item->horario";?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <?php if (($item->NombreClase=='Matemática Básica 1')||($item->NombreClase=='Matemática Básica 2')||($item->NombreClase=='Matemática Intermedia 1')||($item->NombreClase=='Matemática Intermedia 2')||($item->NombreClase=='Matemática Intermedia 3')){?>
                                                                <h6 class="text-white">Días<br/>L-Ma-Mi-V</h6>
                                                                <?php }else{?>
                                                                <h6 class="text-white">Días<br/>L-Mi-V</h6>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/><?php echo "$item->Catedratico";?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">&Uacuteltimas Noticias</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <?php
                                foreach ($news as $key => $item2) {
                                ?>
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?php echo "$item2->Nombre"; echo " - "; echo "$item2->Clase"; echo "\""; echo "$item2->Seccion"; echo"\"";?></h6>
                                        <span class="m-b-15 d-block"><?php echo "$item2->Titulo";?></span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?php echo "$item2->Fecha";?></span> 
                                            <button type="button" class="btn btn-cyan btn-sm">Editar</button>
                                            <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>                      
                    </div>
                    <!-- column -->

                    <div class="col-lg-6">                
                        <!-- Tabs -->
                       <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0">Eventos</h4>
                            </div>
                            <ul class="list-style-none">
                                <?php
                                foreach ($activis as $key => $item) {
                                ?>
                                <li class="d-flex no-block card-body">
                                    <i class="mdi mdi-bell-ring w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0"><?php echo "$item->Actividad";?></a>
                                        <span class="text-muted"><?php echo "$item->Clase"; echo " \""; echo "$item->Seccion"; echo"\"";?></span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0"><?php echo "$item->Dia";?></h5>
                                            <span class="text-muted font-16"><?php echo "$item->Mesfin";?></span>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
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
    <script src="/assets/libs/flot/excanvas.js"></script>
    <script src="/assets/libs/flot/jquery.flot.js"></script>
    <script src="/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/pages/chart/chart-page-init.js"></script>
  @endsection