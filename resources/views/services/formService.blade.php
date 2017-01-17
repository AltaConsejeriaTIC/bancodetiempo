@extends('layouts.app')

@section('content')

@include('nav', array('type' => 1))

	<section class='bannerService row'>
		<div class="container">	
			<article class='hidden-xs hidden-sm col-md-4'>	
				<div class='row'>		
					<div class='col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
						<div class="col-xs-12 col-sm-12">
							@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id))
							<input type="hidden" v-model='avatar' value='{{Auth::user()->avatar}}' />						
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

	<section class='row' id='service'>	
		<div class="container">	
			
			<article class='visible-xs visible-sm col-xs-12'>	
				<div class='row'>		
					<div class='col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4'>
						<div class="not-padding col-xs-12 col-sm-12">
							@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id))
							<input type="hidden" v-model='avatar' value='{{Auth::user()->avatar}}' />						
						</div>				
					</div>	
				</div>			
				<div class="row">
					<div class='not-padding col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3'>
						<h2 class='title1 text-center col-xs-12 col-sm-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
					</div>
				</div>		
			</article>	
			
			<article class='hidden-xs hidden-sm col-md-4 relative not-padding'>			
				<div class='fixed'>
					<div class='relative col-md-12 not-padding'>
						<div class='service-box '>
			 
							<span class='category'>@{{category}}</span>
									 
								<div class="cover">
									 
									<img src="@{{image}}" alt="" />
									 
								</div>
									 
							<div class='avatar'>
									@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#fff', 'borderSize' => '2px'))
							</div>
							<div class="content">
									 
									<h3 class='title title2'>@{{serviceName|truncate '14'}}</h3>
									 
									<p class='paragraph2'>@{{description|truncate '100'}}</p>
									 
									<div class='ranking'>
												
										<div>
												
											@for($cont = 1 ; $cont <= 5 ; $cont++)
													
												@if($cont <= Auth::user()->ranking)
													<span class='material-icons paragraph1'>grade</span>
												@else
													<span class='material-icons paragraph6 star'>fiber_manual_record</span>
												@endif
													
											@endfor	
												
										</div>		
								
									</div>
											
									<div class='tags'>
											
										<a class='button7'>numero 1</a>
												
										<a class='button7'>numero 2</a>
												
										<a class='button7'>numero 3</a>
											
									</div>
										 
							</div>
						</div>		
					</div>	
				</div>						
			</article>
			<article class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">	
				<div class="row col-xs-12">
					@include('partial.errors')
                	<h1 class="paragraph1 text-bold">¿Qué deseas ofrecer?</h1>
            	</div>		
            	<div class="row col-xs-12">					
                	<p class="paragraph1 text-bold text-opacity not-margin-y">Si no sabes qué compartir,</p>
                	<a href="#" class='link2'>realiza nuestro test</a>
            	</div>
            	<div class='space'></div>
            	<div class="row col-sm-12">
            		@include("services/partial/newServiceForm") 		
            	</div>		
				
			</article>			
		</div>
	</section>
<script src='{{asset("js/components/service.js")}}'></script>
@endsection