@extends('layouts.app')
@section('content')

@include('nav', array('type'=>1)) 

<section class='banner'>

	<div class='fondo'>
	
		<img src="{{ asset('images/banner2.jpg') }}" alt="" />
		<div class="telon"></div>
	
	</div>
	
	<div class="container">
	
		{!! Form::open(['url' => '/profile/interest', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal  col-md-8 col-md-offset-2', 'role' => 'form']) !!}
		
		<div class='clearfix mTop-50 visible-xs visible-sm'></div>
		
		<div class='clearfix mTop-250 visible-md  visible-lg'><br></div>
		
		<div id="temasInteres" class='row'>
				
				@foreach($categories as $i => $category)
					
					<div class='col-xs-10 col-xs-offset-1 col-sm-5 {{ ($i % 2) == 0 ? "col-sm-offset-2" : "col-sm-offset-0" }} col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0'>
						
						<div>
						
							{{ Form::checkbox('interets[]', $category->id, false, ['id' => str_replace(" ", "", $category->category)]) }}
							
							{{ Form::label(str_replace(" ", "", $category->category), $category->category) }}
						
						</div>
						
					</div>
				
				@endforeach
							

		</div>
		
		{{ Form::submit('Enviar', ['class' => 'col-xs-12 col-xs-offset-0 col-sm-7 col-sm-offset-4 col-md-6 col-md-offset-3 submit']) }}
		
		{!! Form::close() !!}

	
	</div>

</section>

@endsection