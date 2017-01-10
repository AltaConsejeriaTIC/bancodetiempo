<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Banco de Tiempo Bogotá</title>    
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ripples.min.css') }}">
    <!-- Custom styles -->
    <link href="{{ asset('/css/styleAdmin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Disable Cache Browsers -->
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="cache-control" content="must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

</head>
<body>
    <div id="app">
      <!--Navbar-->
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">

              <!-- Collapsed Hamburger -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <!-- Branding Image -->
              <a class="navbar-brand titleNav" href="{{ url('/homeAdmin') }}">
                Banco de Tiempo de Bogotá
              </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  &nbsp;
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (!Auth::guest())                  
                    <li class="dropdown">                        
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">                      
                        <i class="material-icons"><i class="material-icons">account_circle</i></i><span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{url('changePassword')}}">Cambiar Contraseña</a>
                        </li>
                        <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Cerrar Sesión
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                      </ul>
                    </li>
                @endif
              </ul>
            </div>
          </div>
        </nav>
      <!--/.Navbar-->

        @yield('content')
    </div>

    <!-- Scripts -->    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>  
    <script src="{{ asset('/js/material.min.js') }}"></script>   
    <script src="{{ asset('/js/ripples.min.js') }}"></script>   
    <script src="{{ asset('/js/script.js') }}"></script>        
</body>
</html>
