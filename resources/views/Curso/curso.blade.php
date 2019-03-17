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
            <a class="dropdown-item" href="#">Gestionar Actividad</a>            
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
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Carnet</th>
                                                <th>Cui</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Carlos Muralles</td>
                                                <td>201807572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Mario Estrada</td>
                                                <td>201507572</td>
                                                <td>278673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Esteban Duran</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>abc@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>201507572</td>
                                                <td>268673999440101</td>
                                                <td>xyz@gmail.com</td>                                            
                                            </tr>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Carnet</th>
                                                <th>Cui</th>
                                                <th>Email</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection