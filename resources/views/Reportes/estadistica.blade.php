@extends('templates.main3')

@section('head')
<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/dist/css/style.min.css" rel="stylesheet">
<link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
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
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estadísticas</h5>
                        <form method="POST" action="{{ route('estadistica.parcial') }}">
                        <div class="row">
                          <div class="col-md-1">
                              <label style="margin-top:25px;" class="control-label">Exámenes</label>
                          </div>        
                          <div class="col-md-3">
                              <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="Actividad">
                                  <?php
                                  foreach ($examenes as $key => $item) {
                                  ?>
                                  <option value="<?php echo "$item->idactividad";?>"><?php echo "$item->nombre";?></option>
                                  <?php
                                  }
                                  ?>
                              </select>
                          </div> 
                          <div class="col-md-2">
                              <button type="submit" data-toggle="modal" class="btn m-t-20 btn-danger waves-effect waves-light">
                                  <i class="mdi mdi-download"></i> 
                                  Seleccionar
                              </button>
                          </div>
                        </div>
                        {{ csrf_field() }}
                        </form>
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
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-4">
                          <form method="POST" action="{{ route('estadistica.generacion') }}">
                              <input type="hidden" name="idcurso" value="<?php echo "$idcurso"; ?>">
                              <div class="row">
                                  <div class="col-md-2">
                                      <label style="margin-top:25px;" class="control-label">Estadística</label>
                                  </div>        
                                  <div class="col-md-3">
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
                                  <div style="margin-top:25px;" class="custom-control custom-checkbox mr-sm-2">
                                      <input type="checkbox" class="custom-control-input" id="portemas" name="portemas">
                                      <label class="custom-control-label" for="portemas">Generar por temas</label>
                                  </div>
                                  <div class="col-md-2">
                                      <button type="submit" data-toggle="modal" class="btn m-t-20 btn-danger waves-effect waves-light">
                                          <i class="mdi mdi-download"></i> 
                                          Generar
                                      </button>
                                  </div>
                              </div> 
                              {{ csrf_field() }}
                          </form> 
                        </div>
                          <div class="col-md-2">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
                                  <i class="mdi mdi-library-plus"></i> 
                                  Actividad
                              </a>
                          </div> 
                          <div class="col-md-2">            
                            <button type="button" class="btn m-t-20 btn-block btn-warning " onclick="save()">
                                <i class="mdi mdi-content-save"></i> 
                                Guardar
                            </button>
                        </div>
                      </div>  


                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>    
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Crear</strong> Tema</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('estadistica.crear') }}">
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="nombre" required />
                        </div>  
                        <div class="col-md-6">
                            <label class="control-label">Puntos</label>
                            <input class="form-control form-white" id ="puntos" placeholder="Ingrese un valor" type="number" name="puntos" step="0.01" required/>
                        </div>                       
                    </div>

                    <div class="row card-body">
                      <div class="col-md-6">
                              <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="Actividad">
                                  <?php
                                  foreach ($examenes as $key => $item) {
                                  ?>
                                  <option value="<?php echo "$item->idactividad";?>"><?php echo "$item->nombre";?></option>
                                  <?php
                                  }
                                  ?>
                              </select>
                          </div>    
                    </div>
                    <div class="row card-body">
                      <div class="col-md-6">
                            <input  type="submit" class="btn btn-danger" value="Guardar" type="submit" required/>
                        </div> 
                      {{ csrf_field() }}
                      <div>
                        <input type="hidden" name="idcurso" value="<?php echo $idcurso;?>">
                      </div>
                    </div>
                    <input type="hidden" name="id_padre" value="<?php echo "$id_padre"; ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div style="display: none">
    <form id="notasend" name="notasend" method="POST" action="{{ route('save.notas.parcial') }}"  target="_blank">
        <input type="text" name="claves" id="claves">
        {{ csrf_field() }}
    </form>
         
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
<script>

  var dataSet = [
    <?php

    try {
        $tama = count($notas)/count($actividades);
    } catch (Exception $e) {
        $tama = 0;
    }
      
    $j = 0;
    $zona = 0;
    $final = 0;
    $existefinal = 0;
    if($tama>0){
        for ($i = 0; $i <$tama; $i++) 
        {
            $zona =0;
            $final =0;
            echo "[ \"".$notas[$j]->Carnet."\", \"".$notas[$j]->Nombre."\"";
            for ($x =0; $x < count($actividades); $x++) 
            {
              if($notas[$x+$j]->Escritura==1)
              {
                  if($notas[$x+$j]->Nota<0)
                  {
                      echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"0.00\\\"></div>\"";
                  }
                  else
                  {
                      echo ",\"<div class=\\\"row\\\"><input id= \\\"nota".$notas[$x+$j]->id_act_alumno."\\\"type=\\\"text\\\" class=\\\"form-control form-control-lg\\\" placeholder=\\\"Nota\\\" aria-label=\\\"Nota\\\" aria-describedby=\\\"basic-addon1\\\" onchange=\\\"cambios(".$notas[$x+$j]->id_act_alumno.")\\\" value =\\\"".$notas[$x+$j]->Nota."\\\"></div>\"";
                      $zona+=$notas[$x+$j]->Nota;
                  }
              }
              else
              {
                  if($notas[$x+$j]->Nota<0){
                      echo ",0.00";
                  }else{
                      echo ",".$notas[$x+$j]->Nota;
                      $zona+=$notas[$x+$j]->Nota;
                  }
              }
            }

            echo ",\"".$zona."\"],";
            $j= $j + count($actividades); 
        }
    }else{
        $tama = count($notas);
        for ($i = 0; $i <$tama; $i++) 
        {
            echo "[ \"".$notas[$j]->Carnet."\", \"".$notas[$j]->Nombre."\" ],";
        }
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
            { title: "Registro" },
            { title: "Nombre" },
            <?php
            foreach ($actividades as $key => $item) 
            {
              $texto =$item->Nombre;
              $texto = str_replace(" ", "_", $texto);
              $texto = $texto." ".$item->Ponderacion."pts";
              echo "{ title: \"$texto\" },"; 
            }
            ?>
            { title: "Total" },
            ]
        } );

    } );
</script>
<script>  
    var cambios_notas = new Array(); 
    function cambios(id_actividad)
    {
        var val = document.getElementById("nota"+id_actividad).value;
        var cambio = new Object();
        cambio.nota = val;
        cambio.id = id_actividad;
        cambios_notas.push(cambio);
    }
</script>

<script >
  function save()
    {
        var padre = document.getElementById("notasend");
        var keys = document.getElementById("claves");
        for (i=0;i<cambios_notas.length;i++) 
        {
            var input = document.createElement("INPUT");
            input.type = 'text';  
            input.setAttribute("id", "nota"+cambios_notas[i].id);
            input.setAttribute("name", "nota"+cambios_notas[i].id);
            input.setAttribute("value", cambios_notas[i].nota);
            padre.appendChild(input);
            var val = keys.value+"nota"+cambios_notas[i].id;
            keys.setAttribute("value", val);
        }
        document.notasend.submit();
        padre.innerHTML = '{{ csrf_field() }}';
        var input = document.createElement("INPUT");
            input.type = 'text';  
            input.setAttribute("id", "claves");
            input.setAttribute("name", "claves");
            padre.appendChild(input);
        cambios_notas = [];
    }

</script>

@if($errors->any())
        <script type="text/javascript">
        $(document).ready(function() {                
        toastr.error('{!!$errors->first('msg',':message')!!}');
        } );    
        </script>
@endif
    

@endsection