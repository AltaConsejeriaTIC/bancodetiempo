@if($type == 1)

	<nav class='navbar navbar-default navbar-static-top nav1'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-3 col-md-offset-0">
					<a href="/" >
						<img src="{{ asset('images/logo.png') }}" alt="Logo" />
					</a>
				</div>
				@if((Auth::guest()))
			        <div class="hidden-xs col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-5  text-right" id="container-nav-buttons">	    
			        	<button id="show-modal" @@click="showModal = true" class="button5">{{ trans('dictionary.login') }}</button>          	
			        	<button id="show-modal" @@click="showModal = true" class="button4 hidden-xs">Registrarse</button>          		          
			        </div>
				@elseif((!Auth::guest()))
					<a class="hidden-xs col-sm-4 col-sm-offset-5 col-md-4 col-md-offset-5  text-right" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
					</form>
				@endif
			</div>
		</div>

 	 </nav>
 	 
@elseif($type == 2)

<!--Navbar-->
	<nav class="navbar navbar-default navbar-static-top nav2">
		<div class="container">
			<div class="row">

				<a id="logo-container" href="{{url('/home') }}" class="brand-logo col-md-2 col-sm-4 col-xs-5">
				</a>

				<ul id='options-container'  class="col-md-4 col-md-offset-6 col-sm-5 col-sm-offset-3 col-xs-7">

					<li><i class='material-icons'>access_time</i></li>
					<li><i class='material-icons'>wb_incandescent</i></li>
					<li><i class='material-icons'>mail</i></li>
					<li class="dropdown">
						@if (!Auth::guest())
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<svg class=""  viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
										<defs>
											<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
												<image  xlink:href="{{ Auth::user()->avatar }}" x="-25" width="150" height="100" />
											</pattern>
										</defs>
									<polygon id="hex" stroke='#fff !important' points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
								</svg>
								<div class="iconProfile">
									{{ Auth::user()->first_name}}
								</div>
							</a>
							<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('profile') }}">Perfil</a>
										<a href="{{ url('/logout') }}"  class="link1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
									</li>
							</ul>
						@endif
					</li>

				</ul>

			</div>
		</div>
	</nav>
<!--/.Navbar-->


@endif
