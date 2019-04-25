@extends('templates.main')
@section('news')
<ul class="list-style-none">
    <li>
        <div class="">
            <a href="javascript:void(0)" class="link border-top">
                <div class="d-flex no-block align-items-center p-10">
                    <span class="btn btn-danger btn-circle"><i class="ti-calendar"></i></span>
                    <div class="m-l-10">
                        <h5 class="m-b-0">Recoger Tarea1</h5> 
                        <span class="mail-desc">Hoy</span> 
                    </div>
                </div>
            </a>
            <a href="javascript:void(0)" class="link border-top">
                <div class="d-flex no-block align-items-center p-10">
                    <span class="btn btn-warning btn-circle"><i class="ti-calendar"></i></span>
                    <div class="m-l-10">
                        <h5 class="m-b-0">Parcial 1</h5> 
                        <span class="mail-desc">En 3 días</span> 
                    </div>
                </div>
            </a>
            <!-- Message -->
            <a href="javascript:void(0)" class="link border-top">
                <div class="d-flex no-block align-items-center p-10">
                    <span class="btn btn-primary btn-circle"><i class="ti-calendar"></i></span>
                    <div class="m-l-10">
                        <h5 class="m-b-0">Recoger Tarea2</h5> 
                        <span class="mail-desc">Próxima Semana</span> 
                    </div>
                </div>
            </a>
        </div>
    </li>
</ul>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">                                
                            <div class="bars"  id="curve_chart" style="height: 400px;"></div>
                        </div>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Actividad');
      data.addColumn('number', 'MB1 A');
      data.addColumn('number', 'MI2 B');
      data.addColumn('number', 'MI3 P');

      data.addRows([
        ['Tarea1',  37.8, 80.8, 41.8],
        ['Tarea2',  30.9, 69.5, 32.4],
        ['Tarea3',  25.4,   57, 25.7],
        ['Tarea4',  11.7, 18.8, 10.5],
        ['Tarea5',  11.9, 17.6, 10.4],
        ['Parcial1',   8.8, 13.6,  7.7],
        ['Parcial2',   7.6, 12.3,  9.6],
        ['Parcial3',  12.3, 29.2, 10.6],
        ['HT1',  16.9, 42.9, 14.8],
        ['HT2', 12.8, 30.9, 11.6],
        ['HT1',  5.3,  7.9,  4.7],
        ['Laboratorio',  6.6,  8.4,  5.2],
        ['Proyecto1',  4.8,  6.3,  3.6],
        ['Proyecto2',  4.2,  6.2,  3.4]
      ]);

      var options = {
        chart: {
          title: 'Promedio de Actvidades del Semestre',
          subtitle: 'Auxiliar 1'
        }
      };

      var chart = new google.charts.Line(document.getElementById('curve_chart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
      }
    </script>
  @endsection