@extends('templates.main2')

@section('content')

<main role="main" class="container">
    <div class="row justify-content-start mt-5">
        <div class="col-lg-12 mx-3">
            <h1>Objetivos del Departamento de Matemática</h1>
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark"> Que el estudiante de ingeniería recuerde y reconozca
                 los conceptos, procedimientos y métodos matemáticos involucrados en las ciencias de Ingeniería </li> 
                 <li class="list-group-item list-group-item-dark mt-3"> Que el estudiante de ingeniería emplee y maneje los conceptos
                  y métodos matemáticos para la formulación de modelos en Ingeniería, los juzgue y resuelva adecuadamente </li>
                  <li class="list-group-item list-group-item-dark mt-3"> Orientar al estudiante en el uso de nuevos programas de matemática </li>
                  <li class="list-group-item list-group-item-dark my-3"> Apoyar actividades que fomenten y divulguen la importancia 
                  de la matemática en el desarrollo del ser humano </li>
            </ul>
        </div>
    </div>
</main>


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