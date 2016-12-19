@extends('layouts.app')

@section('banner')
<div id="index-banner" class="parallax-container">
	<div class="section no-pad-bot">
	      <div class="container">
	        	<div class="botonesRegistro">
	        	
	        	<p>{{ trans('dictionary.registrationMessage') }}</p>
	        	<a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a><br>
	        	<a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a><br>
	        	<a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>
	        	
	        	</div>
	      </div>
	</div>
	<div class="banner"><img src="{{asset('images/banner.jpg')}}" alt="Unsplashed background img 1"></div>
</div>
@endsection

@section('content')

 <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
 </form>

@endsection