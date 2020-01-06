@extends('templates.main2')

@section('content')
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-image: url('/img/fondo3.jpg'); background-repeat: no-repeat;background-size: cover;">
            <div class="auth-box bg-dark border-top border-dark">
                <div id="loginform">
                    <form class="form-horizontal m-t-20"  method="POST" action="{{ route('login') }}">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white" id="basic-addon1" style="background-color: #1C9DCF"><i class="ti-user"></i></span>
                                    </div>
                                    <input id="email" name="email" type="email" value ="{{old('email')}}"class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1" required="">                                    
                                </div>                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white" id="basic-addon2" style="background-color: #1C9DCF"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">                                    
                                        <div class="p-t-20">                                        
                                            <button class="btn btn-block btn-lg text-white" style="background-color: #15418B" type="submit">Iniciar Sesion</button>
                                        </div>                                    
                                </div>
                            </div>
                        </div>
                         {{ csrf_field() }}
                    </form>
                    <a href="/registro" class="font-light text-white">Registrarse</a>
                    <a href="#" class="font-light text-white float-right" id="to-recover">¿Contraseña perdida?</a>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Ingrese su e-mail y le enviaremos instrucciones para que puedar recuperar su conraseña</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" method="POST" action="{{ route('recuperar') }}">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input id="email" name="email" type="text" class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="email" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Login</a>
                                    <button class="btn btn-info float-right" type="submit" name="action">Recuperar</button>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>     
@endsection
@section('script')

    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>

    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
    @if(isset($msg))
        <script type="text/javascript">
           $(document).ready(function() {                
            console.log('{{$msg}}')
            } );    
        </script>
    @endif

    @if($errors->any())
        <script type="text/javascript">
        $(document).ready(function() {                
        toastr.error('{!!$errors->first('email',':message')!!}');
        } );    
        </script>
    @endif

    @if(isset ($msg))      
          <script type="text/javascript">      
        toastr.error("<?php echo $msg?>");
        </script>
    @endif

    @if(isset ($msg2))      
          <script type="text/javascript">      
        toastr.info("<?php echo $msg2?>");
        </script>
    @endif


    
@endsection