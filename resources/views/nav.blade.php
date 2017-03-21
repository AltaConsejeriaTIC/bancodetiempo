<modal>
</modal>
@if($type == 1)

	<nav class='navbar navbar-default navbar-static-top nav1'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-9  col-sm-4 col-sm-offset-4 col-md-3 col-md-offset-0">
					<a href="/index" >
						<img src="{{ asset('images/logo.png') }}" alt="Logo" />
					</a>
				</div>
				@if((Auth::guest()))
			        <div class="hidden-xs col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-5  text-right" id="container-nav-buttons">	    
			        	<button class="button5" data-toggle="modal" data-target="#login">{{ trans('dictionary.login') }}</button>          	
			        	<button class="button4 hidden-xs" data-toggle="modal" data-target="#login">Registrarse</button>          		          
			        </div>
			        <ul class="menuMobile visible-xs col-xs-2 col-xs-offset-1">
			            <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                          <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#login">{{ trans('dictionary.login') }}</a></li>
                            <li><a data-toggle="modal" data-target="#login">Registrarse</a>  </li>
                          </ul>
                        </li>
			        </ul>
				@elseif((!Auth::guest()))
					<div class="hidden-xs col-sm-6 col-sm-offset-5 col-md-6 col-md-offset-7 text-right">												
						<p class="col-xs-5 align-right">
							<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image> 
							{{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? "Dorado" : "Dorados" }}
						</p>
						<p class="col-xs-1 line-nav">|</p>
						<a class="col-xs-5 align-left" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
					</div>
					<a class='visible-xs fa fa-sign-out icon text-right col-xs-2 col-xs-offset-1' href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
					</form>
				@endif
			</div>
		</div>

 	 </nav>
 	 
@elseif($type == 2)


<!--Navbar-->
	<nav class='navbar navbar-default navbar-static-top nav2'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-9 col-sm-2 padding-top col-md-2">
					<a href="/index" >
						<img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo" />
					</a>
				</div>
				<div class='hidden-xs hidden-sm padding-top col-md-3'>
					{!! Form::open(['url' => 'filter', 'method' => 'get']) !!}
						<input type='text' class='filter col-md-12' name='filter' value='{{ Session::get("filters.text") }}' id='filter1' placeholder='Encuentra ofertas, palabras clave y más...'>
						<label for="filter1" class=" fa fa-search "></label>
					{!! Form::close() !!}
				</div>
				
				<div class="hidden-xs col-md-4 col-md-offset-0 padding-top col-sm-4 col-sm-offset-1 not-padding not-margin text-right">
					<div class="flex-center">
						<div class="col-md-7 col-sm-7 padding-top not-margin bolsa-de-tiempo text-left">
							<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav text-center col-sm-2  col-md-2 "></image>
							<p class="paragraph4 textpadding col-md-10 col-sm-7 text-white">Bolsa de tiempo:<br>{{ Auth::user()->credits }} Dorados</p>
						</div>
						<div class="col-md-1 col-sm-1 not-padding " onclick='location.href="/inbox#received"'>
							<i class="fa fa-envelope icon-nav notification"><span>{{App\Helpers::getNotificationsUser()}}</span></i>
						</div>
						<!--<div class="col-md-4 col-sm-4 not-padding hidden-xs hidden-sm hidden-md text-center">
							<button class="button9 newservice" data-toggle="modal" data-target="#NewService">
							<p>Nueva oferta</p>
							</button>							 
						</div><-->
					</div>
					
				</div>
				<div class=' hidden-xs col-xs-1 col-sm-1 col-sm-1 col-md-1 text-right icon-profile'>
					@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class=' hidden-xs col-xs-2 col-sm-2 padding-top menu  col-sm-2 col-md-2 text-right dropdown'>
					<a class='dropdown-toggle flex-center ' data-toggle="dropdown">
						<div class='col-xs-12 not-padding menu '>
							<span class='not-padding not-margin paragraph4  text-white'>{{Auth::user()->first_name}}</span>
								<i class='iconmenu menu fa fa-angle-down'></i>
						</div>

						<ul class="dropdown-menu">	
						    <li>
						    	<a href="{{ url('profile') }}">Perfil</a>
						    </li>
						    <li>
						        <a href="/inbox">Notificaciones <span>{{App\Helpers::getNotificationsUser()}}</span></a>
						    </li>
						    <li>
						    	<a href="{{ url('/logout') }}"  class="link1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
							</li>
						</ul>
					</a>
				</div>
				
				<ul class="menuMobile visible-xs col-xs-2 col-xs-offset-1">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url('profile') }}">Perfil</a></li>
                        <li>
						        <a href="/inbox">Notificaciones <span>{{App\Helpers::getNotificationsUser()}}</span></a>
						    </li>
                        <li><a href="{{ url('/logout') }}"  class="link1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>  </li>
                      </ul>
                    </li>
                </ul>

			</div>
			
		</div>

 	 </nav>


@elseif($type == 3)

	<!--Navbar-->
	<nav class='navbar navbar-default navbar-static-top nav2'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-2 col-sm-2 col-md-offset-1  padding-top col-md-2">
					<a href="/index" >
						<img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo" />
					</a>
				</div>
				<div class='hidden-xs hidden-sm col-md-offset-1 padding-top col-md-3'>
					<input type='text' class='filter col-md-12' name='filter' id='filter1' placeholder='Encuentras personas, habilidades y más ... '>
					<label for="filter1" class=" fa fa-search "></label>
				</div>
				<div class="text-right col-md-4" id="container-nav-buttons">
					<button class="button5" data-toggle="modal" data-target="#login">{{ trans('dictionary.login') }}</button>
					<button class="button9 buttonStart hidden-xs" data-toggle="modal" data-target="#login">Registrarse</button>
				</div>

			</div>



		</div>

	</nav>
<!--/.Navbar-->


@endif
