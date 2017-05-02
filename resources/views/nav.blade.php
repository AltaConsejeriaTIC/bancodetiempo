@if($type == 1)

	<nav class='navbar navbar-default navbar-static-top nav1'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-9  col-sm-4 col-sm-offset-4 col-md-5 col-md-offset-0">
					<a href="/index" class='logo text-center'>
						<img src="{{ asset('images/logo.png') }}" alt="Logo" />
					</a>
				</div>
				@if((Auth::guest()))
			        <div class="hidden-xs col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-3  text-right" id="container-nav-buttons">
			        	<button class="button5"  @click='myData.login = true'>{{ trans('nav.login') }}</button>
			        	<button class="button4 hidden-xs"  @click='myData.login = true'>{{ trans('nav.register') }}</button>
			        </div>
			        <ul class="menuMobile visible-xs col-xs-2 col-xs-offset-1">
			            <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                          <ul class="dropdown-menu">
                            <li><a @click='myData.login = true'>{{ trans('nav.login') }}</a></li>
                            <li><a @click='myData.login = true'>{{ trans('nav.register') }}</a>  </li>
                          </ul>
                        </li>
			        </ul>
				@elseif((!Auth::guest()))
					<div class="hidden-xs col-sm-6 col-sm-offset-5 col-md-5 col-md-offset-2 text-right">
						<p class="col-md-6 col-md-offset-2 align-right">
							<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image> 
							{{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? trans('nav.credit') : trans('nav.credits') }}
						</p>
						<a class="col-md-4 align-right" href="{{ url('/validateLogout') }}">{{ trans('nav.logout') }}</a>
					</div>
					<a class='visible-xs fa fa-sign-out icon text-right col-xs-2 col-xs-offset-1' href="{{ url('/validateLogout') }}"></a>
				@endif
			</div>
		</div>

 	 </nav>
 	 
@elseif($type == 2)


<!--Navbar-->
	<nav class='navbar navbar-default navbar-static-top nav2'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-7  col-sm-3  col-md-3 padding-top">
					<a href="/index" >
						<img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo" />
					</a>
				</div>
				<div class='hidden-xs hidden-sm padding-top col-md-3'>
					{!! Form::open(['url' => 'filter', 'method' => 'get']) !!}
						<input type='text' class='filter col-md-12' name='filter' value='{{ Session::get("filters.text") }}' id='filter1' placeholder='{{ trans("nav.inputFind") }}'>
						<label for="filter1" class=" fa fa-search "></label>
					{!! Form::close() !!}
				</div>
				
				<div class="hidden-xs col-md-3 col-md-offset-0 padding-top col-sm-3 col-sm-offset-1 not-padding not-margin text-right">
					<div class="flex-center">
						<div class="col-md-7 col-sm-7 padding-top not-margin bolsa-de-tiempo text-left">
							<div class="space4"></div>
							<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav text-center col-sm-2  col-md-2 "></image>

							<p class="paragraph4 textpadding col-md-9 col-sm-7 text-white">{{ Auth::user()->credits }} {{ trans('nav.credits') }}</p>
						</div>
						<div class="col-md-2 col-sm-2 not-padding " onclick='location.href="/inbox#received"'>
							@if(App\Helpers::getNotificationsUser()>0)
								<i class="fa fa-envelope icon-nav notification text-left"><span>{{App\Helpers::getNotificationsUser()}}</span></i>
							@else
								<i class="fa fa-envelope icon-nav notification text-left"></i>
							@endif
						</div>
						<div class="col-md-3 col-sm-4 not-padding hidden-xs hidden-sm hidden-md text-center">
							<button class="button9 newservice" data-toggle="modal" data-target="#NewService">{{ trans('nav.newOffer') }}</button>
						</div>
					</div>
					
				</div>
				<div class=' hidden-xs col-xs-1 col-sm-1 col-sm-1 col-md-1 text-right icon-profile'>
					@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class=' hidden-xs col-xs-2 col-sm-2 padding-top menu  col-sm-2 col-md-2 text-right dropdown'>

						<div class='col-xs-12  not-padding menu dropdown-toggle flex-center ' data-toggle="dropdown">

                                <span class='not-padding not-margin paragraph4  text-white'>{{Auth::user()->first_name}}</span>
                                <i class='iconmenu menu fa fa-angle-down'></i>

						</div>

						<ul class="dropdown-menu">	
						    <li>
						    	<a href="{{ url('profile') }}">{{ trans('nav.profile') }}</a>
						    </li>
						    <li>
								<a href="{{ url('/validateLogout') }}" class="link1">{{ trans('nav.logout') }}</a>
							</li>
						</ul>

				</div>
				
                <ul class="menuMobile visible-xs col-xs-2 col-xs-offset-3">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('profile') }}">{{ trans('nav.profile') }}</a>
                            </li>
                            <li>
                                <a href="/inbox">{{ trans('nav.notifications') }} <span>{{App\Helpers::getNotificationsUser()}}</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/validateLogout') }}"  class="link1">{{ trans('nav.logout') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
			</div>
		</div>
 	 </nav>

{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation']) !!}
	  <newservice :categories='this.myData.categories' :tags-service='this.myData.tags'></newservice>
{!! Form::close() !!}
<div class="clearfix"></div>

@elseif($type == 3)

	<!--Navbar-->
	<nav class='navbar navbar-default navbar-static-top nav2'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-7  col-sm-3  col-md-3 padding-top">
					<a href="/index" >
						<img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo" />
					</a>
				</div>
				<div class='hidden-xs hidden-sm col-md-offset-1 padding-top col-md-3'>
					<input type='text' class='filter col-md-12' name='filter' id='filter1' placeholder='{{ trans("nav.inputFind") }}'>
					<label for="filter1" class=" fa fa-search "></label>
				</div>
				<div class="text-right col-md-4" id="container-nav-buttons">
					<button class="button5"  @click='myData.login = true'>{{ trans('nav.login') }}</button>
					<button class="button9 buttonStart hidden-xs"  @click='myData.login = true'>{{ trans('nav.register') }}</button>
				</div>

			</div>
		</div>

	</nav>
<!--/.Navbar-->


@endif
