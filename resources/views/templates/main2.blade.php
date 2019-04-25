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
                         <li class="nav-item"> 
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic " href="/horarios" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Horarios">
                                <i class="font-24 mdi mdi-calendar"></i>
                            </a>
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="http://mate.ingenieria.usac.edu.gt/olimpiada/index.php" aria-expanded="false" aria-haspopup="true" data-toggle="tooltip" data-placement="top" title="Olimpiada">
                                <i class=" font-24 md mdi mdi-trophy"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right"> 
                        <li class="nav-item"> 
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic " href="/login" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Login">
                                <i class="font-24 mdi mdi-account"></i>
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
