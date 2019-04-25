@extends('templates.main')

@section('head')
<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/dist/css/style.min.css" rel="stylesheet">
@endsection

@section('content')
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

@endsection