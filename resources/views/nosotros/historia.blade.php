@extends('templates.main2')

@section('content')

<main role="main" class="container">
    <div class="row justify-content-start mt-5">
        <div class="col-lg-12 mx-3">
            <h1>Historia</h1>
            <p> Para entender la existencia y el trabajo del Departamento de Matemáticas, habrá que dar por sentado que para los 
            ingenieros la matemática es su método de acción fundamental. No es su epistemología como lo puede ser para otras disciplinas
             profesionales. Para los ingenieros la matemática es acción práctica, es aplicación es: la dinámica que mueve el proceso de la 
             creación. No se queda en la esfera teórica, sino sirve de instrumento para concretar los proyectos formulados. </p> 
            <p>Sin apartarnos de la anterior proposición se dirá que los estudios matemáticos siempre tuvieron especial importancia 
            en la Facultad de Ingeniería, aunque no con la misma intensidad ni con los mismos objetivos. Desde la fundación de esta casa 
            de estudios en 1,875 hasta 1,967, la formación matemática se dirigía a la Ingeniería Civil y anteriormente a la Ingeniería 
            Topográfica y a la Ingeniería Química.</p>
            <p>A partir de 1967 se diversifican los estudios en variadas ramas como las ingenierías Industrial, Mecánica, Eléctrica 
            y otras más recientes, en Electrónica y Sistemas. Además esta facultad, en la década de los ochentas, incorporó las 
            licenciaturas en Matemática y Física aplicadas.</p>
            <p>Toda esta diversificación de la Ingeniería, lógicamente planteó una transformación en las currícula de formación 
            matemática que abarcaron diversos campos, cuyos objetivos y contenidos pueden apreciarse en los programas de cursos 
            especificos. </p>
            <p>A principios del siglo XX, los requerimientos matemáticos eran muy particulares dado el grado de 
            desarrollo de la ciencia y de la tecnología de aquella época. Un renombrado profesor de matemática de aquel período, 
            el ingeniero Lucas T. Cojulum, dividió las matemáticas en tres ramas:</p>
            <p>El ingeniero Cojulum, así como el ingeniero Francisco Vela Arango, autor del mapa en relieve de Guatemala, además de 
            prominentes profesionales especialmente en las áreas de la topografía, de la geodesia y de la ingeniería vial de principios 
            de siglo, fueron docentes de matemática en esta facultad. </p>
            <p>Entre las décadas de 1930 a 1960, ilustres ingenieros sientan verdadera cátedra de matemática en la universidad 
            nacional y especialmente en la Facultad de Ingeniería. Entre estos se puede mencionar a Diego O'Meany, Raúl Aguilar Batres, 
            Jorge Meani González, Jorge Arias de Blois que fué decano de la Facultad de Ingeniería y Rector de la Universidad de San 
            Carlos [1958 - 1966], Eduardo Martínez Balcells, Rodolfo Solís Hegel y otros. </p>
            <p>La instauración del Departamenteo de Estudios Básicos en 1964, a iniciativa del en ese entonces rector Jorge Arias 
            de Blois, bajo el modelo de la Universidad de Michigan, Estados Unidos y, el pratrocinio del fundación Kellogs, trajo 
            aires renovadores tanto al método como en concepto matemático, tal es el caso de la teoría de conjuntos de George Cantor, 
            al enfoque probabilístico y en la física. Esto requirió la formación de docentes especializados en estos campos. Pioneros en 
            esta nueva forma de enfocar la matemática fueron los eminentes profesores Federico Velasco, Eduardo Suger y Bernardo Morales, 
            quienes fueron formados en universidades extranjeras y quienes supieron influir en otros no menos eminentes formados en Guatemala 
            tales como los ingenieros Leonel Pinot, Mercedes Antillón (+), Alicia García (+), Arturo Batres y otros.</p>
            <p>Este nuevo enfoque que dieron los Estudios Básicos variaron sustancialmente los métodos del proceso de enseñanza aprendizaje 
            de la matemática en esta facultad, así como en otras unidades académica de la Universidad de San Carlos, calando su innegable 
            influencia en los otrso niveles de la educación nancional. Los Estudios Básicos fueron defenestrados y disueltos en 1968, por 
            un vigoroso movimiento estudiantil, debido a dos razones: por ser un implante no madurado en la realidad nacional y por la marcada 
            connotación metafísica de su área social.</p>
            <p>A principios de los años 60' la Facultad aquiere un ordenador IBM 1620, de discos magnéticos, que vino a agilizar 
            los procesos computacionales y a enfatizar en la enseñanza los métodos númeriocos para la solución de muchos de los problemas
             de la Ingeniería. Este aparato ordinariamente, era operado en el lenguaje Fortran II. De aqui se cimienta una larga tradición 
             informática que llega hasta nuestros días donde es cosa corriente el uso de computadores de la más variada índole.</p>
            <p>Para finalizar, diremos que en los últimos veinticinco años el Departamento de Matemáticas se ha significado por su 
            profesionalismo y su trabajo coordinado. No obstante, es necesario ensayar nuevas metodologías e introducir nuevos conceptos 
            que flexibilicen la ruta hacia la consecución de conocimientos que procuren conquistar tecnologías propias para que la Ingeniería 
            Nacional cumpla con su responsabilidad social.</p>
            <p>Ilustres Ingenieros como Piere Castillo Contoux y Jacinto Quan Chu impregnaron de sus conocimientos la estructura 
            académico administrativa del Departamento. Herbert Mendía, Luis Córdova, Rodolfo Samayoa, Hugo Rodas y Arturo Samayoa, 
            han tenido bajo su responsabilidad la conducción del Departamento de Matemáticas en la última década, el que se encargara de 
            surtir de un eficaz e imprescindible método de análisis y de trabajo a los futuros ingenieros de Guatemala.</p>
            <p>- Ing. Hector Antonio De León Sagastume</p>
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