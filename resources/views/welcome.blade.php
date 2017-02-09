@extends('layouts.app')

@section('content')

	@include('nav', array('type' => 1))	

	<section class='bannerHome row'>
		<div class='cap'></div>
		<div class="container">
		
			<article class='col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0'>
				
				<div class='row'>
					<div class='col-xs-4 col-sm-3 col-md-3'>
						<section></section>
					</div>
					<div class='col-xs-7 col-sm-8 col-md-8'>
					<section></section>
					</div>
					<div class='col-xs-4 col-sm-3 col-md-3'>
						@include('partial/imageProfile', array('cover' => 'images/foto_camila.png', 'id' => 'foto_camila', 'border' => '#fff', 'borderSize' => '0px'))
					</div>
					<div class='col-xs-7 col-sm-8 col-md-8'>
						<h4 class='title3'>Camila (Abogada)</h4>
						<p class='paragraph7'>Recibió una hora de cuentería de Juan</p>
					</div>
					
				</div>|
				<div class='row'>
				
					<div class='col-xs-4 col-sm-3 col-md-3'>
						@include('partial/imageProfile', array('cover' => 'images/foto_juan.png', 'id' => 'foto_juan', 'border' => '#fff', 'borderSize' => '0px'))
					</div>
					<div class='col-xs-7 col-sm-8 col-md-8'>
						<h4 class='title3'>Juan (Cuentero)</h4>
						<p class='paragraph7'>Obtuvo una asesoría en derecho penal de Camila</p>
					</div>
					
				</div>
				
			</article>
			<article class='col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2'>
				
				<div class="row">
					<h1 class='title1 text-white'>¿PARA QUÉ EL DINERO SI PUEDES USAR TU TIEMPO?</h1>
				</div>
				
				<div class="row space40">
					<p class="paragraph1 text-white not-padding col-xs-10" >Invierte tus habilidades para obtener lo que otros ofrecen</p>
				</div>
				
				<div class="row space40">
					<button class='button1 background-active-green-color col-xs-12 col-md-12' data-toggle="modal" data-target="#login">Regístrate para empezar</button>				
				</div>
			
			</article>
		</div>
	</section>

	<section>
		<div class="container">
		
			<h2 class='title1 text-center'>OFERTAS RECIENTES</h2>
		 
		 	<article class='space40'>
		 		
		 		@foreach($lastServices as $key => $service)
		
					<div class='col-md-4 col-xs-12 col-sm-6'>
						@include('partial/serviceBox', array("service" => $service))
					</div>
			
				@endforeach
		 	
		 		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 not-padding ">
					<a href="guest"  class='button1 background-active-color col-xs-12 col-md-4 col-md-offset-1 text-center'>Explorar más ofertas</a>
		 		</div>
		 	
		 	</article>
		 	
		 	
	 	
	 	</div>
		
	
	</section>
	
	<section class='boxRegister row'>
		<div class="cap"></div>

		<div class="container">
				
				<div class='row'>
					<h2 class='title1 text-white text-center col-xs-12 col-md-12'>¡ÚNETE!</h2>
				</div>
				
				<div class='row'>
					<p class='paragraph2 text-white col-xs-12 col-sm-12 col-md-12 text-center'>Regístrate y comienza a ser parte de nuestra gran comunidad</p>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-md-4" >
						<a href="{{ url('loginRedes/facebook') }}" class="col-xs-12 col-sm-12 col-md-12 button6 social-button facebook">Regístrate con Facebook <i class="fa fa-facebook"></i></a>
					</div>

					<div class="col-xs-12 col-md-4" >
						<a href="{{ url('loginRedes/google') }}"  class="col-xs-12 col-sm-12 col-md-12 button6 social-button google"> Regístrate con          Google  <i class="fa fa-google"></i></a>
					</div>

					<div class="col-xs-12 col-md-4" >
						<a href="{{ url('loginRedes/linkedin') }}"  class="col-xs-12 col-sm-12 col-md-12 button6 social-button linkedin">Regístrate con Linkedin <i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				
		</div>
	
	</section>



@endsection
