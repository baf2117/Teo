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
                    <h3 class="card-title">Informe de <?php echo $nomex;?></h3>   
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
                      <td>Inscritos</td>
                      <td><?php echo $inscritos[0]->ninscritos;?></td>
                  </tr>
                  <tr>
                      <td>Examinados</td>
                      <td><?php echo $examinados[0]->nexaminados;?></td>
                  </tr>
                  <tr>                                    
                      <td>Número de Aprobados</td>
                      <td><?php echo $aprobados[0]->naprobados;?></td>
                  </tr>
                  <tr>
                      <td>(%) Aprobados/inscritos</td>
                      <td><?php echo $porcaproinscri;?>%</td>
                  </tr>
                  <tr>
                      <td>(%) Aprobados/inscritos</td>
                      <td><?php echo $porcaproexa;?>%</td>
                  </tr>
                  <tr>                                    
                      <td>Número de reprobados</td>
                      <td><?php echo $reprobados[0]->nreprobados;?></td>
                  </tr>
                  <tr>
                      <td>(%) Reprobados/examinados</td>
                      <td><?php echo $porcrepro;?>%</td>
                  </tr>
                  <tr>
                      <td>Número de ausentes</td>
                      <td><?php echo $ausentes[0]->nausentes;?></td>
                  </tr>
                  <tr>                                    
                      <td>(%) Ausentes/inscritos</td>
                      <td><?php echo $porcausentes;?>%</td>
                  </tr>
                  <tr>
                      <td>Estudiantes con nota cero</td>
                      <td><?php echo $cero[0]->ncero;?></td>
                  </tr>
                  <tr>
                      <td>Nota Promedio</td>
                      <td><?php echo $promedio[0]->npromedio;?></td>
                  </tr>
                  <tr>                                    
                      <td>Desviación Típica</td>
                      <td><?php echo $desv[0]->ndesv;?></td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
  <div class="col-md-6 align-items-center">
    <div class="card">
        <div class="card-body">
            <h5>Temas</h5>                                
        </div>
        <table class="table">
          <tbody>
            <?php
            foreach ($temaspromedio as $key => $item) {
            ?>
            <tr>
              <td><?php echo "$item->nombre";?></td>
              <td><?php echo "$item->npromedio";?></td>
            </tr>
            <?php
            }
            ?>                           
      </tbody>
  </table>
</div>
<div class="card">  
    <div id="columnchart_values" style="height: 500px;"></div>                          
</div>
</div>
</div>
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-2">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-success btn-block waves-effect waves-light">
            <i class="mdi mdi-library-plus"></i> 
            Tema
        </a>
    </div>
    <div class="col-md-2">            
        <button type="button" class="btn m-t-20 btn-block btn-warning ">
            <i class="mdi mdi-content-save"></i> 
            Guardar
        </button>
    </div>
    <div class="col-md-2">            
        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit-tema" class="btn m-t-20 btn-secondary btn-block waves-effect waves-light">
            <i class="mdi mdi-table-edit"></i> 
            Editar
        </a>
    </div>
    <div class="col-md-2">
        <a href="javascript:void(0)" data-toggle="modal" data-target="" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
            <i class="mdi mdi-send"></i> 
            Enviar
        </a>
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
<!--<div class="row">
    <div class="col-md-12">
        <h1></h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Temas</h5>
                <div class="table-responsive" id="tabla1">
                    <table id="temas" class="table table-striped table-bordered">                                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>-->
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
<div class="modal fade none-border" id="edit-tema">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Editar</strong> un Tema</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Evento</label>
                            <select class="form-control form-white" data-placeholder="Tipo actividad" name="category-color">
                                <option value="success">Ley de Toricelli</option>
                                <option value="success">"Salmuera de Tanque"</option>
                                <option value="success">"Ley de Enfrieamiento de Newton"</option>
                                <option value="success">"Ecuaciones Diferenciales"</option>
                            </select>
                        </div>                          
                        <div class="col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="category-name" />
                        </div>                            
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <label class="control-label">Puntos</label>
                            <input class="form-control form-white" id ="PuntosE" placeholder="Ingrese un valor" type="number" name="category-name" />
                        </div>                             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal" onclick="">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
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
<script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Promedio", { role: "style" } ],
            <?php
            foreach ($temaspromedio as $key => $item) {
            ?>
            ["<?php echo "$item->nombre";?>", <?php echo "$item->npromedio";?>, "#7b7fb7"],
            <?php
            }
            ?> 
        ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
         { calc: "stringify",
         sourceColumn: 1,
         type: "string",
         role: "annotation" },
         2]);

      var options = {
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
        hAxis: {
            direction:-1,
            slantedText:true,
            slantedTextAngle:90
        }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
}
</script>
<script>
    var dataSet = [
    [ "Brayan Flores", "201403564" ]
    ];

    $(document).ready(function() {
        $('#temas').DataTable( {
            data: dataSet,
            scroller:       true,
            columns: [
            { title: "Nombre" },
            { title: "Carnet" }
            ]
        } );
        var myTable = $('#temas').DataTable();

        $('#temas').on( 'click', 'tbody td', function () {
            myTable.cell( this ).edit( 'bubble' );
        } );

    } );

    
</script>
<script>
 function temaadd() {
    var dataSet = [
    [ "Brayan Alexander Flores", "201403564","<div class=\"row\"><input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Nota\" aria-label=\"Nota\" aria-describedby=\"basic-addon1\" required=\"\"><div>"],
    [ "Brayan Alexander Flores", "201503564","<div class=\"row\"><input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Nota\" aria-label=\"Nota\" aria-describedby=\"basic-addon1\" required=\"\"><div>"]
    ];
    evento = document.getElementById("eventoN").value;
    puntos = document.getElementById("PuntosE").value;

    var contenido = evento.concat("/"+puntos+"pts")

    var table1 = document.getElementById("tabla1");
    table1.innerHTML = '';

    var tb3 = document.createElement("table"); 
    tb3.setAttribute("id", "temas");
    tb3.setAttribute("class","table table-striped table-bordered");
    table1.appendChild(tb3);  

    $(document).ready(function() {
        $('#temas').DataTable( {
            data: dataSet,
            deferRender:    true,
            scroller:       true,
            columns: [
            { title: "Nombre" },
            { title: "Carnet" },            
            { title: contenido },
            ]
        } );
    } );
}
</script>

@endsection