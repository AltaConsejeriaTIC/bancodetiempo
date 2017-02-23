<!DOCTYPE html>
<html lang="en">
    <head>
     	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Banco de Tiempo Bogotá</title>

        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/fonts.css')}}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">

        <!-- Bootstrap Material Design-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-material-design.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/ripples.min.css') }}">
       
        <!-- Custom styles -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/modal.css') }}" rel="stylesheet">
       
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>       
           
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

    </head>

    <body >   
        @include('prependvarjs')
        <div id="app">
            @yield('content')        
            @include('footer')
            @include('partial.messageAttainments')
        </div>
    </body>

    <!--  Scripts-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>         
    <script src="{{ asset('js/materialize.js') }}"></script>        
    <script src="{{ asset('js/app.js') }}"></script>       
    
</html>
