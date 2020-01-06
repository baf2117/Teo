<!DOCTYPE html>
<html dir="ltr" lang="es" style="position: relative;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Teo</title>
        <link href="/assets/libs/flot/css/float-chart.css" rel="stylesheet">
        <link href="/dist/css/style.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="/img/escudo.ico" />
        <link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
        @yield('head')
    </head>
    <body style="margin-bottom: 150px; margin: 0;">
        <div class="row">
            <div class="col-12  align-items-center">
                <img src="/img/BANNER.jpg" style="width:100%; " class="img-fluid"> 
            </div>
        </div>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper">            
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> 
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic " href="/" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Inicio">
                                <i class="font-24 mdi mdi-view-dashboard"></i><span class="ml-2">Inicio</span>
                            </a>
                        </li>
                        <?php
                            if(Session::get('tipo')!=1)
                            {
                        ?>                           
                            <li class="nav-item d-none d-sm-none d-md-blocks"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic " href="/horarios_" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Horarios">
                                    <i class="font-24 mdi mdi-calendar"></i>
                                </a>
                            </li>    
                        <?php
                            }
                        ?>
                        <?php
                            if(Session::get('tipo')==2|| Session::get('tipo')>3)
                            {
                        ?>
                            <li class="nav-item dropdown"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" data-toggle="dropdown" aria-haspopup="true" data-target="#navbarDropdown" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Clases">
                                    <i class=" font-24 mdi mdi-clipboard-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left user-dd animated">
                                    <?php
                                    foreach ( Session::get('clases') as $key => $item) 
                                    {
                                    ?>                                    
                                        <form method="POST" action="{{ route('curso.listado') }}">
                                           <input type="hidden"  class="dropdown-item" name="idcurso" value="<?php echo "$item->IdClase"; ?>">
                                           <input type="hidden"  class="dropdown-item" name="nombre" value="<?php echo "$item->NombreClase $item->Seccion"; ?>">
                                           <input type="submit" class="dropdown-item" value=" 
                                                <?php 
                                                echo "$item->NombreClase $item->Seccion";
                                                ?>
                                            ">
                                            {{ csrf_field() }}
                                        </form>                                        
                                    <?php
                                    }
                                    ?>
                                </div>
                            </li>
                        <?php
                            }
                        ?>
                        <?php
                            if(Session::get('tipo')==3)
                            {
                        ?>
                            <li class="nav-item dropdown"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#navbarDropdown" data-toggle="tooltip" data-placement="top" title="Clases">
                                    <i class=" font-24 mdi mdi-clipboard-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left user-dd animated">
                                    <?php
                                    foreach ( Session::get('clases') as $key => $item) 
                                    {
                                    ?>                                    
                                        <form method="POST" action="{{ route('alumno.notas') }}">
                                           <input type="hidden"  class="dropdown-item" name="idcurso" value="<?php echo "$item->IdClase"; ?>">
                                           <input type="hidden"  class="dropdown-item" name="nombre" value="<?php echo "$item->NombreClase $item->Seccion"; ?>">
                                           <input type="submit" class="dropdown-item" value=" 
                                                <?php 
                                                echo "$item->NombreClase $item->Seccion";
                                                ?>
                                            ">
                                            {{ csrf_field() }}
                                        </form>                                        
                                    <?php
                                    }
                                    ?>
                                </div>
                            </li>
                        <?php
                        }
                        ?>  
                        @yield('curso')

                        <?php
                            if(Session::get('tipo')==0)
                            {
                        ?>
                            <li class="nav-item"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/calendario" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Calendario">
                                    <i class="font-24 mdi mdi-calendar-clock"></i>
                                </a>
                            </li>
                        <?php
                            }
                            if(Session::get('tipo')==3 && Session::get('activo')=='1' )
                            {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/matricular" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Matricularse">
                                    <i class="font-24 fas fa-edit"></i>
                                </a>
                            </li>
                        <?php
                            }                            
                            if(Session::get('tipo')==1)
                            {
                        ?>
                            <li class="nav-item dropdown my-auto"> 
                                <a class="nav-link text-muted waves-effect waves-dark pro-pic dropdown-toggle" role="button" href="#" id="adminMenu" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"  title="Nosotros">
                                    <i class=" font-24 fas fa-edit"></i><span class="ml-2">Administrar</span>
                                </a>
                                <div class="dropdown-menu bg-dark text-light border border-dark" aria-labelledby="adminMenu">
                                    <a class="dropdown-item bg-dark text-light" href="/admin/aux">Clases</a>
                                    <a class="dropdown-item bg-dark text-light" href="/admin/aux2">Auxiliares</a>
                                    <a class="dropdown-item bg-dark text-light" href="/admin/user">Catedráticos</a>
                                    <a class="dropdown-item bg-dark text-light" href="/admin/cat">Estudiantes</a>
                                    <a class="dropdown-item bg-dark text-light" href="#">Horarios</a>
                                </div>    
                            </li>
                        <?php
                            }
                        ?>
                        </ul>
                        <ul class="navbar-nav float-right"> 
                            <?php
                                if(Session::get('tipo')!=1)
                                {
                            ?>                    
                                <li class="nav-item my-auto">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/noticia" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Noticias"><i class="font-24 mdi mdi-comment-processing"></i></a>
                                </li>
                                <li class="nav-item dropdown my-auto">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Próximos Eventos">
                                        <i class="font-24 mdi mdi-alarm"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="">
                                                    <?php 
                                                        $cont = 0;
                                                        $colors = array('danger','warning','success','info','primary');
                                                        foreach (Session::get('activis2') as $key => $item) 
                                                        {
                                                            if($cont<4)
                                                                $index = rand(0,4); 
                                                            $color = $colors[$index];
                                                        { 
                                                    ?>
                                                    <a href="javascript:void(0)" class="link border-top">
                                                        <div class="d-flex no-block align-items-center p-10">
                                                            <span class="btn btn-<?php echo $color;?> btn-circle"><i class="ti-calendar"></i></span>
                                                                <div class="m-l-10">
                                                                    <h5 class="m-b-0"><?php echo $item->titulo;?></h5>
                                                                    <h6 class="m-b-0"><?php echo $item->clase;?></h6> 
                                                                    <span class="mail-desc"><?php echo $item->aviso;?></span> 
                                                                </div>
                                                        </div>
                                                    </a>
                                                    <?php
                                                        }
                                                        $cont= $cont+1;
                                                        }
                                                    ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php
                                }
                                if (Session::get('tipo')==1) {

                                    if (Session::get('activo')=='1') {
                            ?>
                            <li class="nav-item mr-3 my-auto">
                                <a class="col-md-1 col-sm-12">
                                    <button id="activar" title="Matriculación activa" data-toggle="tooltip" type="button" class="btn btn-sm btn-block btn-outline-success" onclick="fin_periodo()">Fin Matricular</button>
                                </a>
                            </li>
                            <?php
                                    }else{
                            ?>
                            <li class="nav-item mr-3 my-auto">
                                <a class="col-md-1 col-sm-12">
                                    <button id="activar" title="Matriculación inactiva" data-toggle="tooltip" type="button" class="btn btn-sm btn-block btn-outline-danger" onclick="activar_periodo()">Matricular</button>
                                </a>
                            </li>
                            <?php
                                    }
                                }
                            ?>
                            <li class="nav-item dropdown my-auto border-dark">
                                <a class="nav-link text-muted waves-effect waves-dark pro-pic" data-toggle="dropdown" data-toggle="tooltip" data-placement="top" title="<?php echo Session::get('username');?>" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-account font-24 dropdown-toggle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated bg-dark text-light border-dark">
                                    <form method="POST" action="{{ route('perfil') }}">
                                           <button class="dropdown-item bg-dark text-light" type="submit" >
                                            <i class="ti-user m-r-5 m-l-5"></i> 
                                            Perfil
                                        </button>
                                            {{ csrf_field() }}
                                    </form> 
                                    <form method="POST" action="{{route ('logout')}}">
                                        <button class="dropdown-item bg-dark text-light" type="submit" >
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> 
                                            Cerrar Sesión
                                        </button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </nav>
            <div style="display: none">
                <form id="matricular" name="matricular" method="POST" action="{{ route('activar.matricular')}}"  target="_blank">
                    {{ csrf_field() }}
                </form>                    
            </div>
            
        @yield('content')
        
        <footer class="footer text-center" style="bottom: 0 !important; bottom: -1px; background-image: url('/img/pie.png'); background-repeat: no-repeat; background-size: cover; min-height: 150px; background-position: center; width: 100%;">
            Departamento de Matem&aacutetica FIUSAC<br/>
                Brayan Alexander Flores<br/>
                César Estuardo Morales Toledo<br/>
                Versión 1.0.0<br/>
                2019
                <!--<div class="img-fluid align-items-center" style="background-image: url('/img/pie.png'); background-repeat: no-repeat; background-size: cover; min-height: 150px; background-position: center; width: 100%;">      
                </div>-->
        </footer>
        </div>
    </div>

        @yield('script')
        <?php
        if (Session::get('tipo')==1) {
        ?>

        <script>
            function activar_periodo() {
                document.matricular.submit();
                var bot = document.getElementById("activar");
                bot.innerHTML="fin Matricular";
                bot.removeAttribute("class");
                bot.removeAttribute("onclick");
                bot.removeAttribute("title");
                bot.removeAttribute("data-toggle");
                bot.removeAttribute("data-original-title");
                bot.setAttribute("class", "btn btn-sm btn-block btn-outline-success");
                bot.setAttribute("onclick","fin_periodo()");
                bot.setAttribute("data-original-title","Matriculación activa")
                bot.setAttribute("data-toggle","tooltip");
            }
        </script>
         <script>
            function fin_periodo() {
                document.matricular.submit();
                var bot = document.getElementById("activar");
                bot.innerHTML="Matricular";
                bot.removeAttribute("class");
                bot.removeAttribute("onclick");
                bot.removeAttribute("title");
                bot.removeAttribute("data-toggle");
                bot.removeAttribute("data-original-title");
                bot.setAttribute("class", "btn btn-sm btn-block btn-outline-danger");
                bot.setAttribute("onclick","activar_periodo()");
                bot.setAttribute("data-original-title","Matriculación inactiva")
                bot.setAttribute("data-toggle","tooltip");
            }
        </script>

        <?php
        }
        ?>  
    </body>
</html>