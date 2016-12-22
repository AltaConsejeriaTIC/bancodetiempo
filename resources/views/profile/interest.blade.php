@extends('layouts.app')
@section('content')

@include('nav', array('type'=>1)) 

<section class='banner'>

	<div class='fondo'>
	
		<img src="{{ asset('images/banner2.jpg') }}" alt="" />
		<div class="telon"></div>
	
	</div>
	
	<div class="container">
	
		{!! Form::open(['url' => '/profile/interest', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal r', 'role' => 'form']) !!}
		
		<div id="temasInteres" class='row'>

							

		</div>
		
		{!! Form::close() !!}

	
	</div>

</section>

@endsection