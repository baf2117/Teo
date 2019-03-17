@extends('templates.main')

@section('content')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
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
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">MB1 A</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">MI2 B</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">MI3 P</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">                           
                                        <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                                                                <h6 class="text-white">Alumnos<br/>85</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>S12</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>404</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>7:10-8:50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Ma-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing. Ponciaono</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="profile" role="tabpanel">
                                    <div class="p-20">
                                        <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                                                                <h6 class="text-white">Alumnos<br/>57</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T3</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>110</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>7:10-8:50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Inga. Cano</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    <div class="p-20">
                                            <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                                                                <h6 class="text-white">Alumnos<br/>62</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
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
                               
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Aux1</h6>
                                        <span class="m-b-15 d-block">Actividad1 </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2016</span> 
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="../../assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">Alumno 1</h6>
                                        <span class="m-b-15 d-block">Comentario</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">May 10, 2016</span> 
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="../../assets/images/users/5.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Alumno2</h6>
                                        <span class="m-b-15 d-block">Comentario</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">August 1, 2016</span> 
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
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
                                <li class="d-flex no-block card-body">
                                    <i class="mdi mdi-bell-ring w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Inicio de clases</a>
                                        <span class="text-muted">Leccion inagural Auditorio</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">22</h5>
                                            <span class="text-muted font-16">Ene</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="mdi mdi-file w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Suficiencia</a>
                                        <span class="text-muted">Suficiencia de MB1 A</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">31</h5>
                                            <span class="text-muted font-16">Ene</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="mdi mdi-file w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Primer Parcial MB1 A</a>
                                        <span class="text-muted">S12 310</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">05</h5>
                                            <span class="text-muted font-16">Feb</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="mdi mdi-pencil-box-outline w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Revision</a>
                                        <span class="text-muted">Revision de parcial 1 MB1 A</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">13</h5>
                                            <span class="text-muted font-16">Feb</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="mdi mdi-send w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0"> Estadistica </a>
                                        <span class="text-muted">Envio de Estadisticas MB1 A</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">15</h5>
                                            <span class="text-muted font-16">Feb</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <footer class="footer text-center">
                Departamento de Matem&aacuteticas FIUSAC
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
    <script src="/assets/libs/flot/excanvas.js"></script>
    <script src="/assets/libs/flot/jquery.flot.js"></script>
    <script src="/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/pages/chart/chart-page-init.js"></script>
  @endsection