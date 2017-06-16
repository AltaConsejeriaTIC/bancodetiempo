<section class='bannerService row'>
    <div class="container">
        <article class='hidden-xs hidden-sm col-md-4'>
            <div class='row'>
                <div class='col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
                    <div class="col-xs-12 col-sm-12">
                        @include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-xs-6 col-xs-offset-3  col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
                    <h2 class='title3 text-center col-xs-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
                </div>
            </div>
        </article>
        <article class="col-xs-12 col-sm-12 col-md-4">
            <div class='row'>
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
                    <h2 class='not-padding title1 text-white col-xs-12 col-sm-12 col-md-12'>{{ trans("register.welcome") }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
                    <p class="not-padding paragraph1 text-white col-xs-12 col-sm-12 col-md-12">{{trans("register.textWelcome")}}</p>
                </div>
            </div>
            <div class="row">
	            <div class="col-xs-6 col-xs-offset-3" id='credits'>
	                <p class="paragraph1 text-white text-center"><strong>{{ trans('register.initialCredits') }}</strong></p>
	                <p class="paragraph1 text-white text-center"> <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image>
                        {{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? trans('nav.credit') : trans('nav.credits') }}</p>
	            </div>
	        </div>
        </article>
    </div>
</section>
