@extends('layouts.app')
@section('content')

<nav class='navbar-default navbar-static-top nav1 bannerInterest'>
	<div class="cap"></div>
	<div class="container">
		<div class='row'>

			<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-3 col-md-offset-0 ">
				<a href="/"> <img src="{{ asset('images/logo.png') }}" alt="Logo" />
				</a>
			</div>
		@if((Auth::guest()))
			<div class="hidden-xs col-sm-6 col-sm-offset-2 col-md-2 col-md-offset-7" id="container-nav-buttons">	    
			     <button id="show-modal" @click="showModal = true" class="button5">{{ trans('dictionary.login') }}</button>          	
			     <button id="show-modal" @click="showModal = true" class="button4 hidden-xs">Registrarse</button>          		          
			</div>

		@elseif((!Auth::guest()))
			<a class="hidden-xs col-sm-4 col-sm-offset-5 col-md-2 col-md-offset-7" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		@endif

		</div>
	</div>

</nav>
<section class='row'>
	
	<div class="container">
		
		<article class="col-xs-12" id='interestForm'>
		
			<div class="row">
		
				<h2 class='title1 col-xs-12'>¿Cuáles son tus intereses? <i class="fa fa-check-circle done" v-if='this.totalInterest >= 3'></i></h2>
			
			</div>
			<div class="row">
				<p class="paragraph1 col-xs-12">Elige <strong>tres</strong> categorías de interés para sugerirte ofertas.</p>
			</div>
			
			{!! Form::open(['url' => '/profile/interest', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-custom row', 'role' => 'form']) !!}
											
					@foreach($categories as $i => $category)
						<div class='col-xs-12 col-md-4'>
							{{ Form::checkbox('interets[]', $category->id, false, ['id' => str_replace(" ", "", $category->category), 'class' => 'boxCheck', '@click' => 'addInterest('.$i.')']) }}								
							<label for="{{ str_replace(' ', '', $category->category) }}"><i class='fa fa-circle'></i>{{ $category->category }}</label>					
						</div>	
					@endforeach
				
				<div class='crearfix'></div>
		
				<div class="space40 col-xs-12 col-md-6 col-md-offset-3">
					{{ Form::submit('Enviar', ['class' => 'button1 background-active-color col-xs-12', ':class' => '{inactive: this.totalInterest < 3}']) }}
				</div>			
		
			{!! Form::close() !!}
		
		</article>
		

	
	</div>

</section>

 <script src="{{ url('js/components/interest.js') }}"></script> 

@endsection