@extends('templates.main2')

@section('content')

<main role="main" class="container">
    <div class="row justify-content-start mt-5">
        <div class="col-lg-12 mx-3">
            <h1>Misión</h1>
            <p>Proporcionar al estudiante de ingeniería los conocimientos matemáticos necesarios que le sirvan 
            de fundamento a cualquier especialización técnico-científica y una mentalidad abierta a cualquier cambio y adaptación futura. 
            Fomentar la importancia de la matemática, como la ciencia básica</p>
        </div>
    </div>
    <div class="row justify-content-start mt-5">
        <div class="col-lg-12 mx-3">
            <h1>Visión</h1>
            <p> La enseñanza integral de la matemática a alumnos de la Facultad de Ingeniería relacionándola con otras 
            áreas de las ciencias. Mejorar y actualizar la enseñanza de la Matemática en la Facultad de Ingeniería como la base 
            fundamental de las carreras científicas</p>
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