@extends('templates.main2')

@section('content')
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-image: url('/img/fondo3.jpg'); background-repeat: no-repeat;background-size: cover;">
            <div class="auth-box bg-dark border-top border-dark">
                <div>
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('registro.crearUsuario') }}">
                        <div class="row p-b-30">
                         <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input id="nombre" name="nombre" type="text" value ="{{old('nombre')}}"class="form-control form-control-lg" placeholder="Nombre Completo" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="mdi mdi-account-card-details"></i></span>
                                </div>
                                <input id="carne" name="carne" type="number" value ="{{old('carne')}}" class="form-control form-control-lg" placeholder="Registro Estudiantil" aria-label="Registro Estudiantil" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="mdi mdi-credit-card"></i></span>
                                </div>
                                <input id="cui" name="cui" type="number" value ="{{old('cui')}}" class="form-control form-control-lg" placeholder="CUI" aria-label="CUI" aria-describedby="basic-addon1" required>
                            </div>
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input id="email" name="email" type="email" value ="{{old('email')}}" class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input id="password2" name="password2" type="password" class="form-control form-control-lg" placeholder=" Confirmar Contraseña" aria-label="Password" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button class="btn btn-block btn-lg btn-info" type="submit">Registrarse</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
                <a href="/login" class="font-light text-white">Login</a>
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
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

@if($errors->any())
<script type="text/javascript">
   $(document).ready(function() {                
    toastr.error('{{ $errors->first() }}');
} );    
</script>
@endif
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
</script>
    
@endsection