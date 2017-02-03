@extends('layouts.app')

@section('content')

@include('nav', array('type' => 1))

	<section class='bannerService row'>
		<div class="container">	
			<article class='hidden-xs hidden-sm col-md-4'>	
				<div class='row'>		
					<div class='col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
						<div class="col-xs-12 col-sm-12">
							@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#0f6784', 'borderSize' => '3px'))							
						</div>				
					</div>	
				</div>			
				<div class="row">
					<div class='col-xs-6 col-xs-offset-3  col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
						<h2 class='title3 text-center col-xs-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
					</div>
				</div>		
			</article>				
			<article class="col-xs-12 col-sm-12 col-md-4">		
				<div class='row'>
					<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
						<h2 class='not-padding title1 text-white col-xs-12 col-sm-12 col-md-12'>¡Bienvenido a nuestra comunidad!</h2>
					</div>				
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
						<p class="not-padding paragraph1 text-white col-xs-12 col-sm-12 col-md-12">Para empezar, cuéntanos, que quieres ofrecer, recuerda que puedes ofertar cualquier habilidad, servicio o destreza. Puedes editar y crear nuevas ofertas más adelante.</p>
					</div>
				</div>
			</article>
		</div>
	</section>

<section  id='pass' class='not-padding-bottom'>
		<div class="container">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">
				@include('partial/pass', array("pass1" => Illuminate\Support\Facades\Session::get('registerPass1'), "pass2" => Illuminate\Support\Facades\Session::get('registerPass2'), "pass3" => Illuminate\Support\Facades\Session::get('registerPass3')))
				
			</div>
		</div>
</section>
	 
		<section class='row not-overflow' id='service'>	
			<div class="container">	
				<div class='row'>
					<article class='visible-xs visible-sm col-xs-12'>	
						<div class='row'>		
							<div class='col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4'>
								<div class="not-padding col-xs-12 col-sm-12">
									@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id))										
								</div>				
							</div>	
						</div>			
						<div class="row">
							<div class='not-padding col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3'>
								<h2 class='title1 text-center col-xs-12 col-sm-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
							</div>
						</div>		
					</article>	
					
					<article class='hidden-xs hidden-sm col-md-4 relative not-padding'>			
						<div class='relative scrollFixed'>
							<div class='relative col-md-12 not-padding'>
								<div class='service-box'>		 
									<span class='category'>@{{myData.category}}</span>
									<div class="cover">								 
										<img :src="myData.imageService" alt="" />									 
									</div>
									<div class='avatar'>
										<avatar :cover='myData.cover'>                	
	                		<template scope="props">
	                			@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' =>Auth::user()->id, 'border' => '#fff', 'borderSize' => '3px', 'extra' => array('image' => ':xlink:href=props.cover')))
	                  		</template>                  	
	                  </avatar>
	                </div>
	                <div class="content">
										<h3 class='title title2'>@{{myData.serviceName}}</h3>
										<div class='ranking'>											
											<div>											
												@for($cont = 1 ; $cont <= 5 ; $cont++)												
													@if($cont <= Auth::user()->ranking)
														<span class='material-icons paragraph8'>grade</span>
													@else
														<span class='material-icons paragraph8 star'>fiber_manual_record</span>
													@endif												
												@endfor												
											</div>		
										</div>
										<div class="space15">										
										</div>											
										<p class='paragraph2'>@{{myData.descriptionService}}</p>									
										<div class='tags'>										
											<a class='button7'>#Palabraclave</a>																					
											
										</div>
									</div>
								</div>		
							</div>	
						</div>						
					</article>
	
					<article class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">	
						<div class="col-xs-12  not-padding ">					
							<h1 class="title1 text-centernot-margin-top">¿Qué&nbsp;deseas&nbsp;ofrecer?</h1>
				        </div>		
		      	<div class="row col-xs-12">					
		          	<p class="paragraph10 text-bold text-opacity not-margin-y">Si no sabes qué compartir,</p>
		          	<a href="/test" class='link2'>realiza nuestro test de habilidades</a>
		      	</div>
		      	<div class='space'></div>            	
		      	{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}             
		      		<firstservice></firstservice>
						{!! Form::close() !!}	        
					</article>	
				</div>		
			</div>
		</section>
		
		
@endsection