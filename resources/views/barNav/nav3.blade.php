<nav class='navbar navbar-default navbar-static-top nav2'>
    <div class="container">
        <div class='row flex-center'>

            <div class="col-xs-7  col-sm-3  col-md-3">
                <a href="/index">
                    <img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo"/>
                </a>
            </div>
            <div class='hidden-xs hidden-sm col-md-offset-1 col-md-3'>
                {!! Form::open(['url' => 'filter', 'method' => 'get']) !!}
                <input type='text' class='filter col-md-12' name='filter' id='filter1'
                       placeholder='{{ trans("nav.inputFind") }}'>
                <label for="filter1" class=" fa fa-search "></label>
                {!! Form::close() !!}
            </div>
            <div class="text-right col-md-4 col-xs-5" id="container-nav-buttons">
                <button id="open-register-popup" class="button4 margin-vertical-12" @click='myData.register = true'>{{ trans('nav.register') }}</button>
            </div>

        </div>
    </div>

</nav>
