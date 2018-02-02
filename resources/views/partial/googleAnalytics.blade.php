@if(env('ENVIRONMENT', "dev") == 'production')
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
