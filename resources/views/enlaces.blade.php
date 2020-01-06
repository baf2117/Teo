@extends('templates.main2')

@section('content')

<div class="container">

    <div class="row justify-content-md-center mt-5">
        <div class="card mb-3 bg-dark text-light rounded" style="max-width: 725px">
            <div class="row"> 
                <div class="col-md-4 mr-0 rounded">
                    <a href="https://www.usac.edu.gt/" target="_blank"><img class="card-img" src="/img/usaclogo.png" alt="USAC"></a>
                </div>
                <div class="ml-0 col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">USAC</h5>
                        <p class="card-text">Sitio oficial de la Universidad de San Carlos de Guatemala</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center mt-5">
        <div class="card mb-3 rounded bg-dark text-light" style="max-width: 725px"> 
            <div class="row">
                <div class="col-md-4">
                    <a href="https://portal.ingenieria.usac.edu.gt/" target="_blank"><img class="card-img" src="/img/fiusac.png" alt="USAC"></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">FIUSAC</h5>
                        <p class="card-text">Sitio oficial de la Facultad de Ingeniería</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center mt-5">
        <div class="card mb-3 rounded bg-dark text-light" style="max-width: 725px"> 
            <div class="row">
                <div class="col-md-4">
                    <a href="http://mate.ingenieria.usac.edu.gt/olimpiada/index.php" target="_blank"><img class="card-img" src="/img/einstein.jpg" alt="USAC"></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Olimpiadas</h5>
                        <p class="card-text">Sitio oficial de la Olimpiada Interuniversitaria de Ciencia y Tecnología</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center mt-5">
        <div class="card mb-3 rounded bg-dark text-light" style="max-width: 725px"> 
            <div class="row">
                <div class="col-md-4">
                    <a href="http://mate.ingenieria.usac.edu.gt/comeval/index.php" target="_blank"><img class="card-img" src="/img/comeval2.png" alt="USAC"></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Comeval</h5>
                        <p class="card-text">Sitio oficial de la Comisión de Evaluación Docente de FIUSAC, responsable del proceso de evaluación del desempeño laboral y capacitación de los docentes</p>
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