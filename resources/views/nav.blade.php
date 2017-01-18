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
			        	<button id="show-modal" @click="showModal = true" class="button5">{{ trans('dictionary.login') }}</button>          	
			        	<button id="show-modal" @click="showModal = true" class="button4 hidden-xs">Registrarse</button>          		          
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
	<nav class='navbar navbar-default navbar-static-top nav2'>
		<div class="container">
			<div class='row'>

				<div class="col-xs-7 col-sm-4 col-md-2">
					<a href="/" >
						<img src="{{ asset('images/logo.png') }}" alt="Logo" />
					</a>
				</div>
				<div class='hidden-xs hidden-sm col-md-4'>
					<input type='text' class='filter col-md-12' name='filter' id='filter1' placeholder='Encuentras personas, habilidades y más'>
					<label for="filter1" class=' fa fa-search'></label>
				</div>
				
				<div class="hidden-xs col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-1 not-padding text-right">
					<div class="flex-center">
						<div class="col-lg-6 col-md-10 col-sm-10 not-padding text-left">
							<i class="fa fa-clock-o not-padding icon-nav text-center col-sm-3 col-sm-offset-2 col-md-3 col-md-offset-2"></i>
							<p class="paragraph4 not-padding  col-md-7 col-sm-7">Bolsa de tiempo:<br>8 Horas</p>
						</div>
						<div class="col-md-2 col-sm-2 not-padding ">
							<i class="fa fa-envelope icon-nav notification"><span>2</span></i>
						</div>
						<div class="col-md-5 col-sm-5 hidden-xs hidden-sm hidden-md text-center">
							<a href="" class="button9">Nueva oferta</a>				
						</div>
					</div>
					
				</div>
				
				<div class='col-xs-5 col-sm-5 col-sm-3 col-md-2 text-right dropdown'>
					<a class='dropdown-toggle flex-center' data-toggle="dropdown">
						<div class="col-xs-4 col-xs-offset-2 not-padding">
							@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#fff', 'borderSize' => '5px'))
						</div>
						<div class='col-xs-6 not-padding'>
							<span class='col-xs-12 not-padding paragraph4'>{{Auth::user()->first_name}} <i class='fa fa-angle-down'></i></span>	
						</div>					
						
						<ul class="dropdown-menu">	
						    <li>
						    	<a href="{{ url('profile') }}">Perfil</a>
						    </li>
						    <li>
						    	<a href="{{ url('/logout') }}"  class="link1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
							</li>
						</ul>
					</a>
				</div>
				
			</div>
			
			<div class='row visible-xs'>
			
				<div class='flex-center'>
					<div class=' col-xs-7 '>
						<i class='fa fa-clock-o not-padding icon-nav text-center col-xs-3'></i>
						<p class='paragraph4 not-padding  col-xs-7'>Bolsa de tiempo:<br>8 Horas</p>
					</div>
					<div class='col-xs-1 not-padding '>
						<i class="fa fa-envelope icon-nav notification"><span>2</span></i>
					</div>
					<div class='col-xs-4 text-center not-padding '>
						<a href='' class='button9'>Nueva oferta</a>				
					</div>
				</div>
			
			</div>
			
		</div>

 	 </nav>
 	 
 	 
<!--/.Navbar-->


@endif
