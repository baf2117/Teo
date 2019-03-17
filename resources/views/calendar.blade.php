    @extends('templates.main')

    @section('head')
    <link href="/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="/dist/css/style.min.css" rel="stylesheet">
    @endsection
    @section('content')
    <div class="page-wrapper">

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

                                                    <button type="button" class="btn m-t-20 btn-block btn-danger waves-effect waves-light save-category" data-dismiss="modal" onclick="removeE()"><i class="mdi mdi-minus-box"></i> Eliminar</button>
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
                                <h4 class="modal-title"><strong>Crear</strong> un evento</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Nombre</label>
                                            <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Fecha Inicio</label>
                                            <div class="input-group">
                                                <input type="text" id="eventoF" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Fecha Fin</label>
                                            <div class="input-group">
                                                <input type="text" id="eventoF2" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Categoria</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Parcial</option>
                                                <option value="danger">Revision</option>
                                                <option value="info">Final</option>
                                                <option value="primary">Tarea</option>
                                                <option value="warning">Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal" onclick="addeventC()">Guardar</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                <a>Departamento de Matemática FIUSAC</a>.
            </footer>

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
        <script >         
            function addeventC() {
                evento = document.getElementById("eventoN").value;
                dateStr = document.getElementById("eventoF").value;
                dateStr2 = document.getElementById("eventoF2").value;
                var date = moment(dateStr);
                var date2 = moment(dateStr2);
                if (date.isValid()) {
                  $('#calendar').fullCalendar('renderEvent', {
                    title: evento,
                    start: date,
                    allDay: true,
                    id: dateStr+evento,
                    editable:false,
                    end: date2
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