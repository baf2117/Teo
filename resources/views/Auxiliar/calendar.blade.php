        @extends('templates.main')

        @section('head')
        <link href="/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
        <link href="/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
        <link href="/dist/css/style.min.css" rel="stylesheet">
        @endsection
        @section('content')
        <div>

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Calendario de Actividades</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-2 border-right p-r-0">
                                        <div class="card-body border-bottom">
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                                        <i class="mdi mdi-library-plus"></i> Crear</a>
                                                    </div>
                                                </div>                                                                                  
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-event" class="btn m-t-20 btn-danger btn-block waves-effect waves-light">
                                                        <i class="mdi mdi-minus-box"></i> Eliminar</a>          
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-9">
                                            <div class="card-body b-l calender-sidebar">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal none-border" id="my-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Agregar Evento</strong></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Crear</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-new-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Crear</strong> una Actividad</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('calendar.registro') }}" >
                                        <div class="row card-body">
                                            <div class="col-md-6">
                                                <label class="control-label">Nombre</label>
                                                <input class="form-control form-white" id ="nombre" name="nombre" placeholder="Nombre de la Actividad" type="text" required=""/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Fecha Entrega</label>
                                                <div class="input-group">
                                                    <input type="text" id="fecha" name="fecha" class="form-control mydatepicker" placeholder="mm/dd/yyyy" required="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row card-body">
                                            <div class="col-md-6">
                                                <label class="control-label">Cursos</label>
                                                <select class="form-control form-white" id="clase" name="clase" required="">
                                                    <?php
                                                    foreach ($cursos as $item)
                                                    {
                                                        echo "<option value=\"$item->id_clase\">$item->Nombre $item->seccion</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Categoria</label>
                                                <select class="form-control form-white" id="tipoa" name="tipoa" required="">
                                                    <option value="Parcial">Parcial</option>
                                                    <option value="Revision">Revision</option>
                                                    <option value="Final">Final</option>
                                                    <option value="Tarea">Tarea</option>
                                                    <option value="HT">HT</option>
                                                    <option value="Lab">Laboratorio</option>
                                                    <option value="Retrasada">Retrasada</option>
                                                    <option value="Otro">Otros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row card-body">
                                             <div class="col-md-6">
                                                <label class="control-label">Tipo</label>
                                                <select class="form-control form-white" id="ponderada" name="ponderada" required="">
                                                    <option value="1">Ponderada</option>
                                                    <option value="2">No Ponderada</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Puntos</label>
                                                <input class="form-control form-white" id ="puntos" placeholder="Ingrese un valor" type="number" name="puntos" step="0.01"/>
                                            </div> 
                                        </div>
                                        <div class="row card-body">
                                            <div class="col-md-6">
                                                <input class="btn btn-danger" value="Guardar" type="submit"/>
                                            </div>
                                        </div> 
                                        {{ csrf_field() }}                                       
                                    </form>
                                </div>
                                <div class="modal-footer">                                 
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade none-border" id="delete-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Eliminar</strong> una Actividad</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('calendar.eliminar') }}" >
                                        <div class="row card-body">
                                            <div class="col-md-9">
                                                <label class="control-label">Cursos</label>
                                                <select class="form-control form-white" id="actividad" name="actividad" required="">
                                                    <?php
                                                    foreach ($actividades as $item)
                                                    {
                                                        echo "<option value=\"$item->id_actividad\">$item->Nombre-$item->curso $item->seccion</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                                <div class="col-md-3">
                                                     <input class="btn btn-danger" value="Eliminar" type="submit"/>
                                                </div>
                                            </div>  
                                        </div>                                                        
                                        {{ csrf_field() }}                                       
                                    </form>
                                </div>
                                <div class="modal-footer">                                 
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
            @section('script')
            <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="/dist/js/jquery.ui.touch-punch-improved.js"></script>
            <script src="/dist/js/jquery-ui.min.js"></script>
            <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
            <script src="/dist/js/waves.js"></script>
            <script src="/dist/js/sidebarmenu.js"></script>
            <script src="/dist/js/custom.min.js"></script>
            <script src="/assets/libs/moment/min/moment.min.js"></script>
            <script src="/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
            <script src="/dist/js/pages/calendar/cal-init.js"></script>
            <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
            <script src="/dist/js/pages/mask/mask.init.js"></script>
            <script src="/assets/libs/select2/dist/js/select2.full.min.js"></script>
            <script src="/assets/libs/select2/dist/js/select2.min.js"></script>
            <script src="/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
            <script src="/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
            <script src="/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
            <script src="/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
            <script src="/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script src="/assets/libs/quill/dist/quill.min.js"></script>
            <script>
               $(document).ready(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    navLinks: true,
                    eventLimit: true,
                    events: [
                    <?php
                    $colors = array('red','green','blue','skyblue','orange');
                    foreach ($actividades as $item)
                    {
                     $index = rand(0,4); 
                     $color = $colors[$index];
                     echo "{
                        title: '$item->Nombre',
                        start: '$item->Fecha',
                        end: '$item->Fecha',
                        allDay: true,
                        editable:false,
                        id:'$item->id_actividad',
                        color: '$color'
                    },\n";
                }
                ?>
                ]
            });
            });
        </script>
        <script >         
            function addeventC() {
                evento = document.getElementById("eventoN").value;
                dateStr = document.getElementById("eventoF").value;
                var date = moment(dateStr);
                if (date.isValid()) {
                  $('#calendar').fullCalendar('renderEvent', {
                    title: evento,
                    start: date,
                    allDay: true,
                    id: dateStr+evento,
                    editable:false,
                    end: date
                },true);
              } else {
                  alert('Fecha invalida');
              }
          }
      </script>
      <script >
        function removeE () {
            var id = prompt("ingrese id");

            $('#calendar').fullCalendar('removeEvents', id);
        }
    </script>
    <script>
        $(".select2").select2();

        $('.demo').each(function() {

            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>

    @endsection