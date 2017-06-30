<nav class='navbar navbar-default navbar-static-top nav1'>
    <div class="container">
        <div class='row'>

            <div class="col-xs-8 col-sm-4 col-sm-offset-0 col-md-5 col-md-offset-0">
                <a href="/index" class='logo text-center'>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"/>
                </a>
            </div>
            @if((Auth::guest()))
                <div class="hidden-xs col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-3  text-right">
                	<br>
                    <button class="button5" @click='myData.login = true'>{{ trans('nav.login') }}</button>
                    <button class="button4 hidden-xs" @click='myData.login = true'>{{ trans('nav.register') }}</button>
                </div>
                <ul class="menuMobile visible-xs col-xs-2 col-xs-offset-2 not-padding">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu">
                            <li><a @click='myData.login = true'><i class="fa fa-id-card" aria-hidden="true"></i> {{ trans('nav.register') }}</a></li>
                            <li><a @click='myData.login = true'><i class="fa fa-sign-in" aria-hidden="true"></i> {{ trans('nav.login') }}</a></li>
                        </ul>
                    </li>
                </ul>
            @elseif((!Auth::guest()))
                <div class="visible-md visible-lg col-sm-6 col-sm-offset-5 col-md-5 col-md-offset-2 text-right">
                    <br>
                    <p class="col-md-6 col-md-offset-2 align-right">
                        <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image>
                        {{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? trans('nav.credit') : trans('nav.credits') }}
                    </p>
                    <a class="col-md-4 align-right"
                       href="{{ url('/validateLogout') }}">{{ trans('nav.logout') }}</a>
                </div>
                <div class="hidden-md hidden-lg  col-xs-2 col-xs-offset-2 col-sm-offset-7 col-sm-1">
                    <br>
                    <a class='fa fa-sign-out icon text-right' href="{{ url('/validateLogout') }}"></a>
                </div>

            @endif
        </div>
    </div>

</nav>
