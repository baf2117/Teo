@extends('templates.main')
@section('head')
<link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
@endsection
@section('content')
    <div>
         <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Datos</h4>
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
                <div class="col-6  align-items-center">
                    <div class="card">
                        <form class="form-horizontal" id="infop" name="infop" method="POST" action="{{ route('perfil.save') }}" >
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  name="name" id="name" value="<?php echo Session::get('username');?>" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Registro Estudiantil</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="carnet" name="carnet" readonly="true" value="<?php echo $carnet;?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">CUI</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="cui" name="cui" readonly="true" value="<?php echo $cui;?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Correo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email2" name="email2" value="<?php echo $correo;?>" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contraseña Actual</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Ingrese su contraseña actual" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contraseña Nueva</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password2" name="password2"  placeholder="Ingrese una nueva contraseña">
                                    </div>
                                </div>
                                <input type="text" hidden="true" class="form-control" readonly="true" name="email" id="email" value="<?php echo Session::get('email');?>">
                            </div>
                            {{ csrf_field() }}
                            <div class="row border-top border-secondary">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <div class="form-group">                                    
                                            <div class="p-t-20">                                        
                                                <button class="btn  btn-primary btn-block text-white" type="submit">Guardar</button>
                                            </div>                                    
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script src="/assets/libs/flot/excanvas.js"></script>
    <script src="/assets/libs/flot/jquery.flot.js"></script>
    <script src="/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>
    @if(isset ($mensaje))
        <script type="text/javascript">
        $(document).ready(function() {                
        toastr.error("<?php echo $mensaje?>");
        } );    
        </script>
    @endif
    @if(isset ($mensaje2))
        <script type="text/javascript">
        $(document).ready(function() {                
        toastr.success("<?php echo $mensaje2?>");
        } );    
        </script>
    @endif
  @endsection