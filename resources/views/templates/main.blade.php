    <!DOCTYPE html>
    <html dir="ltr" lang="es">

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
        @yield('head')
    </head>
    <body>
         <div class="row">
            <div class="col-12  align-items-center">
                <img src="/img/encabezado.png" style="width:100%; " class="img-fluid"> 
            </div>
        </div>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper">            
            <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-collapse" id="navbarSupportedContent" data-navbarbg="skin5">                        
                        <ul class="navbar-nav float-left mr-auto">  
                            <li class="nav-item d-none d-sm-none d-md-blocks"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/" aria-haspopup="true" aria-expanded="false">
                                    <i class="font-24"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic " href="/" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Inicio">
                                    <i class="font-24 mdi mdi-view-dashboard"></i>
                                </a>
                            </li> 
                            <?php
                            if($type!=1)
                                {
                                    ?>                           
                            <li class="nav-item"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic " href="/horarios_" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Horarios">
                                    <i class="font-24 mdi mdi-calendar"></i>
                                </a>
                            </li>    
                            <?php
                            }
                            ?>                         
                            <li class="nav-item"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="http://mate.ingenieria.usac.edu.gt/olimpiada/index.php" aria-expanded="false" aria-haspopup="true" data-toggle="tooltip" data-placement="top" title="Olimpiada">
                                    <i class=" font-24 md mdi mdi-trophy"></i>
                                </a>
                            </li> 
                            <?php
                            if($type==2)
                                {
                                    ?>
                            <li class="nav-item dropdown"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Clases">
                                    <i class=" font-24 mdi mdi-clipboard-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left user-dd animated">
                                    <?php
                                    foreach ($clases as $key => $item) 
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
                            
                            @yield('curso')

                            <?php
                            if($type==2)
                                {
                                    ?>

                            <li class="nav-item"> 
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/calendario" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Calendario">
                                    <i class="font-24 mdi mdi-calendar-clock"></i>
                                </a>
                            </li>
                            <?php
                            }
                             if($type==3)
                                {
                                    ?>
                                   <li class="nav-item">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/matricular" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Matricularse">
                                            <i class="font-24 fas fa-edit"></i>
                                        </a>
                                    </li>
                            <?php
                                }                            
                             if($type==1)
                                {
                                    ?>
                                    <li class="nav-item dropdown"> 
                                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="">
                                            <i class=" font-24 fas fa-edit"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left user-dd animated">
                                            <form method="POST" action="{{ route('admin.aux') }}">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="mdi mdi-clipboard-account m-r-5 m-l-5"></i>
                                                    Cursos
                                                </button>
                                            {{ csrf_field() }}
                                            </form> 
                                            <form method="POST" action="{{ route('admin.aux2') }}">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="mdi mdi-account-edit m-r-5 m-l-5"></i>
                                                    Auxiliares
                                                </button>
                                            {{ csrf_field() }}
                                            </form>  
                                            <form method="POST" action="{{ route('admin.user') }}">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="far fa-address-book m-r-5 m-l-5"></i>
                                                    Estudiantes
                                                </button>
                                            {{ csrf_field() }}
                                            </form> 
                                            <form method="POST" action="{{ route('admin.cat') }}">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fab fa-black-tie m-r-5 m-l-5"></i>
                                                    Catedráticos
                                                </button>
                                            {{ csrf_field() }}
                                            </form> 
                                        </div>
                                    </li>
                            <?php
                                }
                            ?>
                        </ul>
                        <ul class="navbar-nav float-right">    
                            <?php
                            if($type==2)
                                {
                                    ?>                    
                            <li class="nav-item">
                                 <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="/noticia" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Noticias"><i class="font-24 mdi mdi-comment-processing"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Próximos Eventos"> <i class="font-24 mdi mdi-alarm"></i>
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
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" data-toggle="dropdown" data-toggle="tooltip" data-placement="top" title="<?php echo Session::get('username');?>" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-account font-24"></i></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                    <form method="POST" action="{{ route('perfil') }}">
                                           <button class="dropdown-item" type="submit" >
                                            <i class="ti-user m-r-5 m-l-5"></i> 
                                            Perfil
                                        </button>
                                            {{ csrf_field() }}
                                    </form> 
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{route ('logout')}}">
                                        <button class="dropdown-item" type="submit" >
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> 
                                            Logout
                                        </button>
                                        {{ csrf_field() }}
                                    </form>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            
        @yield('content')

        <footer class="footer text-center">
                Departamento de Matem&aacutetica FIUSAC<br/>
                Brayan Alexander Flores<br/>
                César Estuardo Morales Toledo<br/>
                Versión 1.0.0
        </footer>
        </div>

    </div>

        @yield('script')
      
    </body>
    </html>
