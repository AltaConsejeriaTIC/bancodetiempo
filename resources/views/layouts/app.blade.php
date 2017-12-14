<!DOCTYPE html>
<html lang="en">
    <head>
     	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('metas')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cambalachea</title>

        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro" rel="stylesheet">

        <!-- Custom styles -->
        <link href="{{ asset('/css/site.css?v'.\date('YmdHi')) }}" rel="stylesheet">
        <link href="{{ asset('/css/estilos.css?v'.\date('YmdHi')) }}" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        @include('partial.googleAnalytics')

    </head>

    <body >
    <button class="btn-notificationPush hide" id='btnPush' onclick="requestPermission()">
        Bogotá Cambalachea necesita tu permiso para habilitar las notificaciones de escritorio
    </button>
    <div id="fb-root"></div>
        @include('prependvarjs')
        <div id="app">
            @yield('content')
            @include('partial.messageAttainments')
            @if(!Auth::check())
           		@include('partial.registerModal')
           	@endif
           	@if(session('errorLogin'))
           	    @include('partial.errorLogin')
           	@endif
        </div>
        @include('footer')
    </body>

    <!--  Scripts-->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/app.js?v='.\date('Ymd')) }}"></script>

    <script>
        var date = new Date();
        var range = '1950:'+date.getFullYear();
        jQuery( ".datepick" ).datepicker({
            inline: true,
            dateFormat : 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: range
        });

        var aut = jQuery('.filter').autocomplete({
            source: '/query-services'
        });

        @foreach(Illuminate\Support\Facades\Session::get("filters.tags", []) as $tag)
            jQuery("a[tag='{{$tag->id}}']").css({'background-color':'#0f6783', 'border-color':'#0f6783', 'color':'#fff' })
        @endforeach

    </script>
    @if(Route::current()->getUri() == 'inbox')
        <script src="{{ asset('js/mapsFunctions.js') }}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPGPS5eThFsyJBtOl7RYlaFEp4HLRKKWA&libraries=places"></script>
    @endif
        <script src="{{ asset('js/sitio.js') }}"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js"></script>
        <script src="{{ asset('js/notifications.js') }}"></script>
</html>
