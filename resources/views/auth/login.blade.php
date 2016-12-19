@extends('layouts.app')

@section('content')
<div id="index-banner" class="parallax-container">
	<div class="section no-pad-bot">
	      <div class="container">
	        	<div class="botonesLogin">

	        	<p>Iniciar sesión</p>
	        	<a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a>
	        	<a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a>
	        	<a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>
						<div>

						</div>
	        	</div>
	      </div>
	</div>
	<div class="banner"><img src="{{asset('images/banner.jpg')}}" alt="Unsplashed background img 1"></div>
</div>
@endsection
