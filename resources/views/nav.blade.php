@if($type == 1)

	<nav class='navbar navbar-default navbar-static-top nav1'>

		<div class="container">

			<div class='row'>

				<a class="col-md-3 col-sm-4 col-xs-8 brand-logo" id="logo-container" href="/" >
					<i class="material-icons">fiber_manual_record</i>{{ config('app.name', 'Tiempo X Tiempo') }}</a>
	            <a class="loginBt col-md-3 col-md-offset-6  col-sm-3 col-sm-offset-5 col-xs-3 col-xs-offset-1" href="{{ url('login') }}">{{ trans('dictionary.login') }}</a>

			</div>

		</div>

 	 </nav>
@elseif($type == 2)

<!--Navbar-->
	<nav class="navbar navbar-default navbar-static-top nav2">
		<div class="container">
			<div class="row">
			
				<a id="logo-container" href="{{url('/home') }}" class="brand-logo col-md-2 col-sm-4 col-xs-8">
					<i class="material-icons">fiber_manual_record</i>
					<span>{{ config('app.name', 'Tiempo X Tiempo') }}</span>					 
				</a>
			
				<ul id='options-container'>
				
					<li><i class='material-icons'>access_time</i></li>
					<li></li>
					<li></li>
					<li></li>
					
				</ul>	
			
			</div>
			
			
			

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
						&nbsp;
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (!Auth::guest())
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<div>
										<svg class="imageProfileSmall iconProfile"  viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
											<defs>
												<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
													<image  xlink:href="{{ Auth::user()->avatar }}" x="-25" width="150" height="100" />
												</pattern>
											</defs>
											<polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
										</svg>
										<div class:"iconProfile">
											{{ Auth::user()->first_name}}
										</div>
									</div>
								</a>

								<ul class="dropdown-menu" role="menu">
									<li>
										 <a href="{{ url('profile') }}">Perfil</a>
										<a href="{{ url('/logout') }}"
												onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
												Cerrar Sesión
										</a>

										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
<!--/.Navbar-->


@endif
