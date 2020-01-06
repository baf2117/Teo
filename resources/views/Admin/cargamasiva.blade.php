@extends('templates.main')

@section('head')
<link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/dist/css/style.min.css" rel="stylesheet">
<link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
<div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Carga masiva</h5>
                            <form method="POST" action="{{ route('admin.cargamasiva') }}" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label style="margin-top:25px;" class="control-label">Seleccione período</label>
                                    </div>        
                                    <div class="col-md-2">
                                        <select style="margin-top:21px;" class="form-control form-white" data-placeholder="Actividad" name="Actividad">
                                            <option value="1">Primer semestre</option>
                                            <option value="2">Vacaciones de junio</option>
                                            <option value="3">Segundo semestre</option>
                                            <option value="4">Vacaciones de diciembre</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label style="margin-top:25px;" class="control-label">Seleccione archivo</label>
                                    </div>        
                                    <div class="col-md-4">
                                        <div class="custom-file" style="margin-top:21px;">
                                            <input type="file" class="custom-file-input" id="archivo" name="archivo" required>
                                            <label class="custom-file-label" for="archivo">Elegir archivo csv...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <button type="submit" data-toggle="modal" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                            <i class="mdi mdi-upload"></i> 
                                            Cargar archivo
                                        </button>\
                                    </div>
                                </div> 
                                {{ csrf_field() }}
                            </form>            
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
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>
@endsection