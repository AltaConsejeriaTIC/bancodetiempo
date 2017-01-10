<!DOCTYPE html>
<html lang="en">
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
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- Fonts -->
||  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>

  <nav class="" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><i class="material-icons">fiber_manual_record</i>{{ config('app.name', 'Tiempo X Tiempo') }}</a>

      @if (Auth::guest())
          <a class="loginBt" href="{{ url('login') }}">{{ trans('dictionary.login') }}</a>
     @else
       	<li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

             		{{ Auth::user()->first_name . " " . Auth::user()->last_name }} <span class="caret"></span>

 				</a>

              <ul class="dropdown-menu" role="menu">
                    <li>

                    	   <a href="{{ url('profile') }}">Perfil</a>

                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                             Logout
                        </a>

 						<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                   </li>
              </ul>
        </li>
        @endif

    </div>
  </nav>

  @yield('content')

  @yield('footer')

          <!--  Scripts-->
          <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          <script src="{{ asset('js/bootstrap.min.js') }}"></script>  
          <script src="{{ asset('js/materialize.js') }}"></script>
          <script src="{{ asset('js/init.js') }}"></script>

          </body>
        </html>
