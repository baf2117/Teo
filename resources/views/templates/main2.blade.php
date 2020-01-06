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
        <link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
        @yield('head')
    </head>
    <body>
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
                        <li class="nav-item my-auto">
                            <div class="dropdown">
                                <a class="nav-link text-muted waves-effect waves-dark pro-pic dropdown-toggle" role="button" href="#" id="nosotrosMenu" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown">
                                    <i class=" font-24 md mdi mdi-calendar"></i><span class="ml-2">Horarios</span>
                                </a>
                                <div class="dropdown-menu bg-dark text-light border border-dark" aria-labelledby="nosotrosMenu">
                                    <a class="dropdown-item bg-dark text-light" href="/horarios">Clases</a>
                                    <a class="dropdown-item bg-dark text-light" href="#">Examen Final</a>
                                    <a class="dropdown-item bg-dark text-light" href="#">Primera Retrasada</a>
                                    <a class="dropdown-item bg-dark text-light" href="#">Segunda Retrasada</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item my-auto">
                            <div class="dropdown">
                                <a class="nav-link text-muted waves-effect waves-dark pro-pic dropdown-toggle" role="button" href="#" id="nosotrosMenu" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" >
                                    <i class=" font-24 md mdi mdi-hexagon-multiple"></i><span class="ml-2">Nosotros</span>
                                </a>
                                <div class="dropdown-menu bg-dark text-light border border-dark" aria-labelledby="nosotrosMenu">
                                    <a class="dropdown-item bg-dark text-light" href="/nosotros/objetivos">Objetivos</a>
                                    <a class="dropdown-item bg-dark text-light" href="/nosotros/misvis">Misión y Visión</a>
                                    <a class="dropdown-item bg-dark text-light" href="/nosotros/historia">Historia</a>
                                    <a class="dropdown-item bg-dark text-light" href="/nosotros/equipo">Personal</a>
                                </div>
                            </div>
                        </li>
                        <!--<li class="nav-item my-auto">
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic" href="#" aria-expanded="false" aria-haspopup="true" data-toggle="tooltip" data-placement="top" title="Documentos">
                                <i class=" font-24 md mdi mdi-package"></i><span class="ml-2"></span>
                            </a>
                        </li> -->
                        <li class="nav-item my-auto"> 
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic" href="/Recursos" aria-expanded="false" aria-haspopup="true" data-toggle="tooltip" data-placement="top" title="Recursos">
                                <i class=" font-24 md mdi mdi-library"></i><span class="ml-2"></span>
                            </a>
                        </li>
                        <li class="nav-item my-auto"> 
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic" href="/enlaces" aria-expanded="false" aria-haspopup="true" data-toggle="tooltip" data-placement="top" title="Enlaces">
                                <i class="my-auto font-24 md mdi mdi-link"></i><span class="ml-2 my-auto"></span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right"> 
                        <li class="nav-item my-auto"> 
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic " href="/login" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Login">
                                <i class="my-auto font-24 mdi mdi-account"></i><span class="ml-2 my-auto"></span>
                            </a>
                        </li> 
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
    </div>
        @yield('script')
    </body>
</html>
