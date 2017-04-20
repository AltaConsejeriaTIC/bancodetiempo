@extends('layouts.app')

@section('content')

	@include('nav', array('type' => 1))	

	<section class='bannerHome row'>
		<div class='carousel'>
		    <div class="banner1">
		        <img src="/images/banner/people1.png" alt="">
		        <div class="description hidden">{{ trans('home.titleBanner1') }}</div>
		    </div>
		    <div class="banner2">
		        <img src="/images/banner/people2.png" alt="">
		        <div class="description hidden">{{ trans('home.titleBanner2') }}</div>
		    </div>
		    <div class="banner3">
		        <img src="/images/banner/people3.png" alt="">
		        <div class="description hidden">{{ trans('home.titleBanner3') }}</div>
		    </div>
		</div>
		<div class="container">
		
			<article class='col-xs-12  col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0'>

			</article>
			<article class='col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2'>
				
				<div class="row">
					<h1 class='title1 text-white col-xs-12' id='bannerDescription'>{{ trans('home.titleBanner') }}</h1>
				</div>
				
				<div class="row">
					<p class="paragraph1 text-white col-xs-12">{{ trans('home.descriptionBanner') }}</p>
				</div>
				<div class="space"></div>
				<div class="row">
				    <div class="col-xs-12 col-md-12">
				        <button class='button1 background-active-green-color col-xs-12' data-toggle="modal" data-target="#login">{{ trans('home.buttonBanner') }}</button>
				    </div>

				</div>
			
			</article>
		</div>
	</section>

	<section>
		<div class="container">
		
			<h2 class='title1 text-center'>{{ trans('home.title') }}</h2>
		 
		 	<article class='space40'>
		 		
		 		@foreach($lastServices as $key => $service)
		
					<div class='col-md-4 col-xs-12 col-sm-6'>
						@include('partial/serviceBox', array("service" => $service))
					</div>
			
				@endforeach
		 	
		 		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 not-padding ">
					<a href="home"  class='button1 background-active-color col-xs-12 col-md-4 col-md-offset-1 text-center'>{{ trans('home.button1') }}</a>
		 		</div>
		 	
		 	</article>
		 	
		 	
	 	
	 	</div>
		
	
	</section>
	
	<section class='boxRegister row'>
		<div class="cap"></div>

		<div class="container">
				
				<div class='row'>
					<h2 class='title1 text-white text-center col-xs-12 col-md-12'>{{ trans('home.titleLower') }}</h2>
				</div>
				
				<div class='row'>
					<p class='paragraph2 text-white col-xs-12 col-sm-12 col-md-12 text-center'>Regístrate y comienza a ser parte de nuestra gran comunidad</p>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-md-4" >
						<a href="{{ url('loginRedes/facebook') }}" class="col-xs-12 col-sm-12 col-md-12 button6 social-button social-button-facebook facebook">{{ trans('home.registerFacebook') }}<i class="fa fa-facebook"></i></a>
					</div>

					<div class="col-xs-12 col-md-4" >
						<a href="{{ url('loginRedes/google') }}"  class="col-xs-12 col-sm-12 col-md-12 button6 social-button social-button-google google">{{ trans('home.registerGoogle') }}<i class="fa fa-google"></i></a>
					</div>

					<div class="col-xs-12 col-md-4" >
						<a href="{{ url('loginRedes/linkedin') }}"  class="col-xs-12 col-sm-12 col-md-12 button6 social-button social-button-linkedin linkedin">{{ trans('home.registerLinkedin') }}<i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				
		</div>
	
	</section>



@endsection
