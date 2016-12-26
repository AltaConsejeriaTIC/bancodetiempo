@extends('layouts.app')

@section('content')

@include('nav', array('type'=>1)) 

<section class='banner''>
	
	<div class='fondo'>
	
		<img src="images/banner.jpg" alt="" />
		<div class="telon"></div>
	
	</div>
	<div class='clearfix mTop-250 visible-lg visible-md'><br></div>
	<div class="container">
	
		<article class='row'>
			<div class="clearfix mTop-150 visible-xs visible-sm"></div>        
		    <div class="botonesRegistro col-md-4 col-md-offset-4 col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
		      <p></p>
		      <a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a>
		      <a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a>
		      <a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>
		   </div>
		   
		</article>   
	
	</div>

	
</section> 
@endsection
