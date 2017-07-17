<nav class='navbar navbar-default navbar-static-top nav1'>
    <div class="container">
        <div class='row'>

            <div class="col-xs-8 col-sm-5 col-md-3">
                <a href="/index" class='logo text-center'>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"/>
                </a>
            </div>
            <!--Nav desktop-->
            <div class="hidden-xs text-right col-sm-7 col-md-9">
                <br>
                <button class="button5" @click='myData.login = true'>{{ trans('nav.login') }}</button>
                <button id="open-register-popup" class="button4 hidden-xs" @click='myData.register = true'>{{ trans('nav.register') }}</button>
            </div>
            <!--Nav mobile-->
            <div class="col-xs-3 col-xs-offset-1 visible-xs not-padding-right">
                <ul class="menuMobile">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu">
                            <li><a id="open-register-popup2"  @click='myData.register = true'><i class="fa fa-sign-in" aria-hidden="true"></i> {{ trans('nav.register') }}</a></li>
                            <li><a @click='myData.login = true'><i class="fa fa-id-card" aria-hidden="true"></i> {{ trans('nav.login') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
