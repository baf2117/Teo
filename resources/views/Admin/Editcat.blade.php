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
                        <form class="form-horizontal" id="infop" name="infop" method="POST" action="{{ route('cat.edit2') }}" >
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" readonly="true" name="name" id="name" value="<?php echo $actual->nombre;?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Jefe</label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-white" data-placeholder="Área" id ="area" name="area" disabled="true" required>
                                        <option value="<?php echo $actual->area;?>"><?php echo $actual->area;?></option>
                                        <?php
                                            if(strcmp($actual->area,"Básica")!=0){
                                        ?>
                                        <option value="Básica">Básica</option>
                                        <?php 
                                            }
                                            if(strcmp($actual->area,"Intermedia")!=0){
                                        ?>
                                        <option value="Intermedia">Intermedia</option>
                                        <?php 
                                            }
                                            if(strcmp($actual->area,"Aplicadas/Cómputo")!=0){
                                        ?>
                                        <option value="Aplicadas/Cómputo">Aplicadas/Cómputo</option>      
                                        <?php 
                                            }
                                            if(strcmp($actual->area,"")!=0){
                                        ?>
                                        <option value=""></option>  
                                        <?php
                                            }
                                        ?>
                                </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Correo</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" readonly="true" value="<?php echo $actual->correo;?>">
                                    </div>
                                </div>
                                <input type="text" hidden="true" class="form-control" readonly="true" name="id" id="id" value="<?php echo $actual->id;?>">
                            </div>
                            {{ csrf_field() }}

                        </form >
                        <div class="border-top">
                            <div class="row">
                                 <div class="col-3"></div>
                                <div class="col-2">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" onclick="enviar()">Guardar</button>
                                    </div>
                                    
                                </div>
                                <div class="col-2">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-success" onclick="editable()">Editar</button>
                                    </div>                                    
                                </div>
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
    <script src="/assets/libs/flot/excanvas.js"></script>
    <script src="/assets/libs/flot/jquery.flot.js"></script>
    <script src="/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>
    <script>        
        function editable()
        {
            document.getElementById('name').readOnly=false;
            document.getElementById('area').disabled=false;
            document.getElementById('email').readOnly=false;
        }
    </script>
    <script >
        function eliminaraux()
        {
            document.eliminar.submit();
        }
    </script>
    <script>
        function enviar()
        {
            document.infop.submit();
        }
    </script>
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