@extends('layouts.app')
@section('content')

@include('nav', array('type' => 1))

@if(session('response') and Auth::user()->credits == 1)
	<generalmodal  name='winCoin' :state='myData.winCoin' state-init='true'>
		<div slot="modal" class='box-animation row'>			
			<img class="animation" src="images/AnimacionDorados.gif">
		</div>
	</generalmodal>
	<modaltimeoff name="winCoin">
	</modaltimeoff>
@endif

<section class='bannerRegister row'>
	 
</section>

<section id='pass' class='not-padding-bottom'>
		<div class="container">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">
				@include('partial/pass',array('pass1','pass2','pass3'))
			</div>
		</div>
</section>

<section class='row'>
	
	<div class="container">
		
		<article class="col-xs-12" id='interestForm'>
		
			<div class="row">
		
				<h2 class='title1 col-xs-12'>¿Cuáles son tus intereses? </h2>
				
			</div>
			<div class="row">
				<p class="paragraph1 col-xs-12">Elige <strong>tres</strong> categorías de interés para sugerirte ofertas.</p>
			</div>
			
			{!! Form::open(['url' => '/interest', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-custom row validation', 'role' => 'form']) !!}
											
					@foreach($categories as $i => $category)
						<interest val='{{$category->id}}' title='{{$category->category}}'></interest>	
					@endforeach					
				
				<div class='crearfix'></div>
				<p class="msg col-xs-11 " v-if='myData.validation < 3'>Recuerda que debes seleccionar al menos tres categorías  para continuar con el proceso de registro.</p>
				
				<div class="space"></div>
				
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					{{ Form::submit('Siguiente', ['class' => 'button1 background-active-color col-xs-12', ':class' => '{inactive: this.myData.validation < 3}']) }}
				</div>			
		
			{!! Form::close() !!}
		
		</article>
		

	
	</div>

</section>


@endsection