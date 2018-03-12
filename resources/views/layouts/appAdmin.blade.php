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
    <link rel="stylesheet" href="/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin/core.css">
    <link rel="stylesheet" href="/css/admin/sidebar.css">
    <link rel="stylesheet" href="/css/styleAdmin.css">
    @yield('estilos')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    @include("admin/nav/sidebar")
    <div class="container-admin">
        @include("admin.nav.nav")
        @yield('content')
    </div>
    <script src="/js/jquery-1.12.3.min.js" ></script>
    <script src="/js/tether.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="/js/lib/bootstrap.min.js"></script>
     @yield('script')
</body>
</html>
