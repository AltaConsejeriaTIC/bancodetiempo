<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Banco de Tiempo Bogotá</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/lib/bootstrap.min.css" >
  
    <link href="css/styleAdmin.css" rel="stylesheet">
  
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="loginAdmin">
     
        @yield('content')
    </div>
    <script src="/js/jquery-1.12.3.min.js" ></script>
    <script src="/js/tether.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
    <script src="/js/bootstrap.min.js" ></script>
</body>
</html>
