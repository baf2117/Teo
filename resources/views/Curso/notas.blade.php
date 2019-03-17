    @extends('templates.main')

    @section('head')
    <link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    @endsection

    @section('curso')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="d-none d-md-block">MB1 A<i class="fa fa-angle-down"></i></span>
           <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/curso">Lista de Estudiantes</a>
        <a class="dropdown-item" href="">Gestionar Actividad</a>            
        <a class="dropdown-item" href="/notas">Gestionar Notas</a>
        <a class="dropdown-item" href="#">Noticias</a>
        <a class="dropdown-item" href="#">Recursos</a>
    </div>
</li>
@endsection
@section('content')
<div class="page-wrapper">
   <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">MB1 A</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Notas</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Listado de Estudiates</h5>
                    <div class="table-responsive" id="tabla1">
                        <table id="notas" class="table table-striped table-bordered">                                   
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                <i class="mdi mdi-library-plus"></i> Actividad</a>
            </div>
        </div>
    </div>
    <div class="modal fade none-border" id="add-new-event">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Crear</strong> una Actividad</h4>
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
                                <select class="form-control form-white" data-placeholder="Tipo actividad" name="category-color">
                                    <option value="success">Parcial</option>
                                    <option value="danger">Revision</option>
                                    <option value="info">Final</option>
                                    <option value="primary">Tarea</option>
                                    <option value="warning">Otros</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Nombre</label>
                                <input class="form-control form-white" id ="eventoN" placeholder="Ingrese un nombre" type="text" name="category-name" />
                            </div>                                       
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal" onclick="nueva()">Guardar</button>
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
<script>
   function addeventC() {
       var table =  $('#notas').DataTable();
       table.row.add( [
        'actividad1',
        'adsf'
        ] ).draw( false );
   }
</script>

<script>
    var dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ]
    ];

    $(document).ready(function() {
        $('#notas').DataTable( {
            data: dataSet,
            columns: [
            { title: "Name" },
            { title: "Position" },
            { title: "Office" },
            { title: "Extn." },
            { title: "Start date" },
            { title: "Salary" }
            ]
        } );
    } );
</script>
<script>
   function nueva() {
    var dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800","ab"]
    ];

    var table1 = document.getElementById("tabla1");
    table1.innerHTML = '';

    var tb3 = document.createElement("table"); 
    tb3.setAttribute("id", "notas");
    tb3.setAttribute("class","table table-striped table-bordered");
    table1.appendChild(tb3);  

    $(document).ready(function() {
        $('#notas').DataTable( {
            data: dataSet,
            columns: [
            { title: "Name" },
            { title: "Position" },
            { title: "Office" },
            { title: "Extn." },
            { title: "Start date" },
            { title: "Salary2" },
            { title: "nueva" }
            ]
        } );
    } );
}
</script>
@endsection