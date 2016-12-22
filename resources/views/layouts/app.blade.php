<!DOCTYPE html>
<html lang="en">
<head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tiempo X Tiempo') }}</title>

    <!-- Material Design fonts-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Material Design-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ripples.min.css') }}">
    <!-- Custom styles -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- Fonts -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>

  @yield('content')



  @include('footer')

</body>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/materialize.js') }}"></script>

</html>
