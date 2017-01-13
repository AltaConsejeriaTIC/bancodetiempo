@extends('layouts.app')
@section('content')

<nav class='navbar-default navbar-static-top nav1 bannerInterest'>

	<div class="container">
		<div class='row'>

			<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-3 ">
				<a href="/"> <img src="{{ asset('images/logo.png') }}" alt="Logo" />
				</a>
			</div>

		</div>
	</div>

</nav>
<section class='row'>
	
	<div class="container">
		
		<article class="col-xs-12">
		
			<div class="row">
		
				<h2 class='title1 col-xs-12'>¿Cuáles son tus intereses?</h2>
			
			</div>
			<div class="row">
				<p class="paragraph1 col-xs-12">Elige <strong>tres</strong> categorías de interés para sugerirte ofertas.</p>
			</div>
			<div class="row"></div>
		
		</article>
		
		
	
	
		{!! Form::open(['url' => '/profile/interest', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-custom col-xs-12', 'role' => 'form']) !!}
				
		<div id="temasInteres" class='row'>
				
				@foreach($categories as $i => $category)
					
					<div class=''>
						
						<div>
						
							{{ Form::checkbox('interets[]', $category->id, false, ['id' => str_replace(" ", "", $category->category)]) }}
							
							{{ Form::label(str_replace(" ", "", $category->category), $category->category) }}
						
						</div>
						
					</div>
				
				@endforeach
							

		</div>
		
		{{ Form::submit('Enviar', ['class' => '']) }}
		
		{!! Form::close() !!}

	
	</div>

</section>

@endsection