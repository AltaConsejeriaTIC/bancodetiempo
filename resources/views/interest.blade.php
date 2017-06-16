@extends('layouts.app')
@section('content')

@include('nav', array('type' => 1))

<section class='bannerInterest row'>
        <br><br><br>
      <div class="row">
            <div class="col-xs-6 col-xs-offset-3" id='credits'>
                <p class="paragraph1 text-white text-center"><strong>{{ trans('register.initialCredits') }}</strong></p>
                <p class="paragraph1 text-white text-center"> <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image>
                    {{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? trans('nav.credit') : trans('nav.credits') }}</p>
            </div>
	   </div>

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
				<p class="paragraph1 col-xs-12">Elige <strong>al menos tres</strong> categorías de interés para sugerirte ofertas.</p>
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
