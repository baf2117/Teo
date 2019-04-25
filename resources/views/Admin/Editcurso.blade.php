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
                        <form class="form-horizontal" id="infop" name="infop" method="POST" action="{{ route('curso.edit2') }}" >
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="control-label">Auxiliar</label>
                                    <select class="form-control form-white" data-placeholder="Auxiliar" name="aux" id="aux" disabled="true">
                                        <option value="<?php echo $actual->aux_id;?>"><?php echo $actual->aux;?></option>
                                        <?php
                                        foreach ($auxs as $key => $item) 
                                        { 
                                            if ($item->id!=$actual->aux_id) {
                                           
                                            ?>

                                            <option value="<?php echo $item->id?>"><?php echo $item->Nombre;?></option>
                                            <?php
                                           }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Curso</label>
                                    <select class="form-control form-white" data-placeholder="Curso" name="curso" id="curso" disabled="true">
                                        <option value="<?php echo $actual->curso_id;?>"><?php echo $actual->curso;?></option>
                                        <?php
                                        foreach ($cursos2 as $key => $item) 
                                        { 
                                            if ($item->id!=$actual->curso_id) {
                                           
                                            ?>
                                            <option value="<?php echo $item->id?>"><?php echo $item->Nombre;?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Catedrático</label>
                                    <select class="form-control form-white" data-placeholder="Catedrático" name="cat" id="cat" required disabled="true">
                                       <option value="<?php echo $actual->catedratico_id;?>"><?php echo $actual->catedratico;?></option>
                                        <?php
                                        foreach ($cat as $key => $item) 
                                        { 
                                            if ($item->id!=$actual->catedratico_id) {
                                           
                                            ?>
                                            <option value="<?php echo $item->id?>"><?php echo $item->Nombre;?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Seccion</label>
                                    <div class="input-group">
                                        <input type="text" id="seccion" name="seccion" class="form-control" placeholder="Sección" required readonly="true" value="<?php echo $actual->seccion;?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Edificio</label>
                                    <select class="form-control form-white" data-placeholder="Edificio" name="edificio" id="edificio" required disabled="true">
                                        <option value="<?php echo $actual->edificio;?>"><?php echo $actual->edificio;?></option>
                                        <?php 
                                        if(strcmp($actual->edificio,"T-3")!=0)
                                        {
                                        ?>
                                        <option value="T-3">T-3</option>
                                        <?php
                                        }
                                        if(strcmp($actual->edificio,"T-1")!=0)
                                        {
                                        ?>
                                        <option value="T-1">T-1</option>
                                        <?php
                                        }
                                        if(strcmp($actual->edificio,"S-12")!=0)
                                        {
                                        ?>
                                        <option value="S-12">S-12</option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Horario</label>
                                    <select class="form-control form-white" data-placeholder="Horario" name="hora" id="hora" required disabled="true">
                                    <option value="<?php echo $actual->horario;?>"><?php echo $actual->horario;?></option>
                                    <option value="7:10-8:50">7:10-8:50</option>
                                    <option value="7:10-8:00">7:10-8:00</option>
                                    <option value="8:00-8:50">8:00-8:50</option>
                                    <option value="9:00-10:40">9:00-10:40</option>
                                    <option value="9:00-9:50">9:00-9:50</option>
                                    <option value="9:50-10:40">9:50-10:40</option>
                                    <option value="10:50-11:40">10:50-11:40</option>
                                    <option value="13:10-14:00">13:10-14:00</option>
                                    <option value="14:00-14:50">14:00-14:50</option>
                                    <option value="14:50-15:40">14:50-15:40</option>
                                    <option value="14:50-16:30">14:50-16:30</option>
                                    <option value="15:40-16:30">15:40-16:30</option>
                                    <option value="16:30-17:20">16:30-17:20</option>
                                    <option value="17:20-18:10">17:20-18:10</option>
                                    <option value="18:10-19:50">18:10-19:50</option>
                                    <option value="18:10-19:00">18:10-19:00</option>
                                    <option value="19:00-20:40">19:00-20:40</option>
                                    <option value="19:00-19:50">19:00-19:50</option>
                                </select>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Salón</label>
                                    <div class="input-group">
                                        <input type="text" id="salon" name="salon" class="form-control" placeholder="Salón" required readonly="true" value="<?php echo $actual->salon;?>">
                                    </div>          
                                </div>
                                <input type="text" hidden="true" class="form-control" readonly="true" name="id" id="id" value="<?php echo $actual->id;?>">
                            </div>
                            {{ csrf_field() }}
                        </form>
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
            document.getElementById('aux').disabled=false;
            document.getElementById('curso').disabled=false;
            document.getElementById('seccion').readOnly=false;
            document.getElementById('salon').readOnly=false;
            document.getElementById('edificio').disabled=false;
            document.getElementById('hora').disabled=false;
            document.getElementById('cat').disabled=false;
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