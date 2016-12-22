@extends('layouts.app')
@section('content')

@include('nav', array('type'=>1)) 

<section class='banner'>

	<!-- <div class='fondo'>
	
		<img src="{{ asset('images/banner2.jpg') }}" alt="" />
		<div class="telon"></div>
	
	</div>-->
	
	<div class="container">
	
		{!! Form::open(['url' => '/profile/interest', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal r', 'role' => 'form']) !!}
		
		<div id="temasInteres" class='row'>
				
				@foreach($categories as $category)
					
					<div class='col-md-4 col-sm-4'>
						
						<div>
						
							{{ Form::checkbox('interets[]', $category->id, false, ['id' => str_replace(" ", "", $category->category)]) }}
							
							{{ Form::label(str_replace(" ", "", $category->category), $category->category) }}
						
						</div>
						
					</div>
				
				@endforeach
							

		</div>
		
		{{ Form::submit('guardar') }}
		
		{!! Form::close() !!}

	
	</div>

</section>

@endsection