<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tiempo X Tiempo') }}</title>    
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-material-design.min.css">
    <link rel="stylesheet" type="text/css" href="css/ripples.min.css">
    <!-- Custom styles -->
    <link href="css/styleAdmin.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
      <!--Navbar-->
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">          
              <!-- Branding Image -->
              <a class="navbar-brand" href="{{ url('/admin') }}">
                Banco de Tiempo
              </a>
            </div>
          </div>
        </nav>
      <!--/.Navbar-->

        @yield('content')
    </div>

    <!-- Scripts -->    
    <script src="js/app.js"></script>       
    <script src="js/material.min.js"></script>   
    <script src="js/ripples.min.js"></script>   
    <script src="js/script.js"></script>        
</body>
</html>
