<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Banco de Tiempo Bogotá</title>    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/colegios/estilos.css">
    <link rel="stylesheet" href="/css/footer.css">
    @yield('estilos')

</head>
<body>
    
    <div class="container-colegio">
        @yield('content')
    </div>
    
    <script src="/js/jquery-1.12.3.min.js" ></script>
    <script src="/js/tether.min.js" ></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/colegios/app.js"></script>
     @yield('script')
</body>
</html>
