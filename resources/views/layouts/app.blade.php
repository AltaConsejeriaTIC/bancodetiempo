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
        <link rel="stylesheet" type="text/css" href="{{asset('/css/fonts.css')}}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">

        <!-- Bootstrap Material Design-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-material-design.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/ripples.min.css') }}">

        <!-- Custom styles -->
        <link href="{{ asset('/css/style.css?v1') }}" rel="stylesheet">
        <link href="{{ asset('/css/style-mobile.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/modal.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        @if($_ENV['ENVIRONMENT']=='production')
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-100857967-1', 'auto');
                ga('send', 'pageview');

                @php($GAEvent = Session('GAEvent'))

                @if($GAEvent)
                        @if($GAEvent['event'] == 'login')
                    ga('send', 'event', 'Login', 'Login Success', '{{$GAEvent['provider']}}', '1');
                @endif
                @if($GAEvent['event'] == 'signup')
                    ga('send', 'event', 'Signup', 'Signup Success', '{{$GAEvent['provider']}}', '1');
                @endif
                    console.log('{{$GAEvent['provider']}}');
                @php(Session::forget('GAEvent'))
                @endif
            </script>
        @endif

        @if($_ENV['ENVIRONMENT']=='production')
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-100857967-1', 'auto');
            ga('send', 'pageview');

            @php($GAEvent = Session('GAEvent'))

            @if($GAEvent)
                    @if($GAEvent['event'] == 'login')
                        ga('send', 'event', 'Login', 'Login Success', '{{$GAEvent['provider']}}', '1');
                    @endif
                    @if($GAEvent['event'] == 'signup')
                        ga('send', 'event', 'Signup', 'Signup Success', '{{$GAEvent['provider']}}', '1');
                    @endif
                    console.log('{{$GAEvent['provider']}}');
                    @php(Session::forget('GAEvent'))
            @endif
        </script>
        @endif

    </head>

    <body >
    <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1808137372794214',
                    autoLogAppEvents: true,
                    xfbml: false,
                    version: 'v2.9'
                });
                FB.AppEvents.logPageView();
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_LA/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        @include('prependvarjs')
        <div id="app">
            @yield('content')
            @include('partial.messageAttainments')
            @if(!Auth::check())
           		@include('partial.loginModal')
           		@include('partial.registerModal')
           	@endif
        </div>
        @include('footer')
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

        var aut = jQuery('.filter').autocomplete({
            source: '/query-services'
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
