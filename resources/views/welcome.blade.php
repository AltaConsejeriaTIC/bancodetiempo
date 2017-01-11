@extends('layouts.app')

@section('content')

	@include('nav', array('type' => 1))	

	<section class='bannerHome row'>
		<div class='cap'></div>
		<div class="container">
		
			<article class='col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0'>
				
				<div class='row'>
				
					<div class='col-xs-5 col-sm-4 col-md-4'>
						@include('partial/imageProfile', array('cover' => 'images/foto_camila.jpg', 'id' => 'foto_camila', 'border' => '#fff', 'borderSize' => '3px'))
					</div>
					<div class='col-xs-7 col-sm-8 col-md-5'>
						<h4 class='title3'>Camila (Abogada)</h4>
						<p class='paragraph7'>Recibió una hora de cuentería de Juan</p>
					</div>
					
				</div>
				<div class='row'>
				
					<div class='col-xs-5 col-sm-4 col-md-4'>
						@include('partial/imageProfile', array('cover' => 'images/foto_juan.jpg', 'id' => 'foto_juan', 'border' => '#fff', 'borderSize' => '3px'))
					</div>
					<div class='col-xs-7 col-sm-8 col-md-5'>
						<h4 class='title3'>Juan (Cuentero)</h4>
						<p class='paragraph7'>Obtuvo una asesoría en derecho penal de Camila</p>
					</div>
					
				</div>
				
			</article>
			<article class='col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-5 col-md-offset-1'>
				
				<div class="row">
					<h1 class='title1 text-white'>¿Para qué el dinero si puedes usar tu tiempo?</h1>
				</div>
				
				<div class="row space40">
					<p class="paragraph1 text-white not-padding col-xs-10" >Invierte tus habilidades para obtener lo que otros ofrecen</p>
				</div>
				
				<div class="row space40">
					<button class='button1 background-active-color col-xs-12 col-md-12'>Regístrate para empezar</button>
				</div>
			
			</article>
		</div>
	</section>

	<section>
		<div class="container">
		
			<h2 class='title1 text-center'>Ofertas Recientes</h2>
		 
		 	<article class='space40'>
		 		
		 		@foreach($lastServices as $key => $service)
		
					<div class='col-md-4 col-xs-12 col-sm-6 not-padding'>
						@include('partial/serviceBox', array("service" => $service))
					</div>
			
				@endforeach
		 	
		 		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 not-padding">
		 			<button class='button1 background-active-color col-xs-12 col-md-12'>Explorar más ofertas</button>
		 		</div>		 			
		 	
		 	</article>
		 	
		 	
	 	
	 	</div>
		
	
	</section>
	
	<section class='boxRegister row'>
		<div class="cap"></div>
	
		<div class="container">
				
				<div class='row'>
					<h2 class='title1 text-white text-center col-xs-12 col-md-12'>¡Únete!</h2>
				</div>
				
				<div class='row'>
					<p class='paragraph2 text-white col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4'>Regístrate y comienza a ser parte de nuestra gran comunidad</p>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<a href="{{ url('loginRedes/facebook') }}" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 button6 social-button facebook">Regístrate con Facebook <i class="fa fa-facebook"></i></a>
					</div>
					
				</div>
				<div class="row">
					<div class="col-xs-12">
						<a href="{{ url('loginRedes/google') }}"  class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 button6 social-button google">Regístrate con Google <i class="fa fa-google"></i></a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<a href="{{ url('loginRedes/linkedin') }}"  class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 button6 social-button linkedin">Regístrate con Linkedin <i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				
		</div>
	
	</section>

		

@endsection
