@extends('layouts.app')

@section('content')

@include('nav', array('type'=>1))

<section class='banner'>

	<div class='fondo'>

		<img src="images/banner.jpg" alt="" />
		<div class="telon"></div>

	</div>
	<div class='clearfix mTop-250 visible-lg visible-md'><br></div>
	<div class="container">

		<article class='row'>

			<div class="col-md-4 col-md-offset-1 col-sm-6 col-md-offset-0 col-xs-12">
	                 <div style='height: 250px'></div>
	        </div>

		    <div class="botonesRegistro col-md-4 col-md-offset-2  col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
		      <p>{{ trans('dictionary.registrationMessage') }}</p>
		      <a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a>
		      <a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a>
		      <a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>
		   </div>

		</article>
	   <div class='clearfix mTop-50 hidden-xs hidden-md'><br></div>
	   <div class='clearfix mTop-250 hidden-xs hidden-sm hidden-lg'><br></div>
	   <article class='row'>

			<h3 class='col-md-12 col-sm-12 col-xs-10 col-xs-offset-1 white-text visible-xs'>- descrubre<br> - aprende<br> - ense�a<br> - comparte</h3>
			<h2 class='col-md-12 col-sm-12 text-center white-text hidden-xs'>descrubre - aprende - ense�a - comparte</h2>

	   </article>


	</div>


</section>



<section >

	<div class="container">

		<h2 class='col-md-12 col-sm-12 col-xs-12 text-second-color text-center'>!VIVE NUEVAS EXPERIENCIAS</h2>

		<article class='row'>

			<div class='col-md-4 col-md-offset-1 col-sm-4  col-xs-12'></div>

			<div class='col-md-6 col-sm-8  col-xs-12'>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis unde neque in nisi ea accusamus accusantium dolores fuga natus tenetur maiores nam eveniet ad quo commodi suscipit qui at. Odio.</p>

			</div>

		</article>

	</div>


</section>

<section class='white-bk'>

	<div class="container">

		<h2 class='col-md-12 text-second-color text-center'>SERVICIOS DESTACADOS</h2>

	<article class='row'>

		<div class="service col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-0  col-xs-10 col-xs-offset-1">
			<div></div>
		</div>
		<div class="service col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-0  col-xs-10 col-xs-offset-1">
			<div></div>
		</div>
		<div class="service col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
			<div></div>
		</div>
		<div class="service col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 hidden-xs col-xs-offset-1">
			<div></div>
		</div>
		<div class="service col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 hidden-xs col-xs-offset-1">
			<div></div>
		</div>
		<div class="service col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 hidden-xs col-xs-offset-1">
			<div></div>
		</div>

	</article>

	</div>

</section>

<section>

	<div class="container">

		<h2  class='col-md-12 col-sm-12 col-xs-12 text-second-color text-center'>UNETE</h2>
		<h4 class='col-md-12 col-sm-12 col-xs-12  text-second-color text-center'>Comienza a ser parte de nuestra gran comunidad</h4>

		<article class='row col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0  col-xs-10 col-xs-offset-1 '>

			<div class="col-md-4 text-center col-md-offset-0  col-sm-6 col-sm-offset-3 "><a href="" class='registroFacebook'></a></div>
			<div class="col-md-4 text-center col-md-offset-0  col-sm-6 col-sm-offset-3 "><a href="" class='registroGoogle'></a></div>
			<div class="col-md-4 text-center col-md-offset-0  col-sm-6 col-sm-offset-3 "><a href="" class='registroLinkedin'></a></div>

		</article>

	</div>

</section>

@endsection
