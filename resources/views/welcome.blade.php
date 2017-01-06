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
			<div class="row ">
          <div class=" col-md-4">
            @include('partial.errorsUser')
          </div>
      </div>
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

			<h3 class='col-md-12 col-sm-12 col-xs-10 col-xs-offset-1 white-text visible-xs'>- descrubre<br> - aprende<br> - ense&ntilde;a<br> - comparte</h3>
			<h2 class='col-md-12 col-sm-12 text-center white-text hidden-xs'>Descrubre - Aprende - Ense&ntilde;a - Comparte</h2>

	   </article>


	</div>


</section>



<section class='white-bk'>

	<div class="container">
		<p class="titulo1">Ofertas Recientes</p>
		<article class='row'>

			@foreach($lastServices as $key => $service)

		          <div class='col-md-4 col-xs-12 col-sm-6'>

			          @include('partial/serviceBox', array("service" => $service))

		          </div>

		    @endforeach


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
