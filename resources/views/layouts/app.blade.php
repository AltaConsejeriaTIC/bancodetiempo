<!DOCTYPE html>
<html lang="en">
    <head>
     	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
        <meta http-equiv="Pragma" content="no-cache"/>
        <meta http-equiv="Expires" content="0"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cambalachea</title>

        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/fonts.css')}}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">

        <!-- Bootstrap Material Design-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-material-design.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/ripples.min.css') }}">

        <!-- Custom styles -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/modal.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
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

        @foreach(Illuminate\Support\Facades\Session::get("filters.tags", []) as $tag)
            jQuery("a[tag='{{$tag->id}}']").css({'background-color':'#0f6783', 'border-color':'#0f6783', 'color':'#fff' })
        @endforeach

    </script>
    @if(Route::current()->getUri() == 'conversation/{conversation_id}')
        <script src="{{ asset('js/mapsFunctions.js') }}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPGPS5eThFsyJBtOl7RYlaFEp4HLRKKWA&libraries=places"></script>
    @endif
</html>
