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
        @hasSection('styles')
            @yield('styles')
        @else    
            <link href="{{ asset('/css/site.css?v'.\date('YmdHi')) }}" rel="stylesheet">
            <link href="{{ asset('/css/estilos.css?v'.\date('YmdHi')) }}" rel="stylesheet">   
        @endif
        
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

    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
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
    <script src="{{ asset('js/sitio.js') }}"></script>
    @yield('script')
</html>
