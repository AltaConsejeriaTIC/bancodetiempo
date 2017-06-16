@extends('layouts.app') 

@section('content')

@include('nav', array('type' => 1))

	<section class='bannerRegister row'>
	    <div class="container">
	        <div class='row'>
	            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	                <h2 class='title1 not-padding text-white col-xs-12 col-sm-12 col-md-12'>{{ trans('register.thank') }}</h2>
	            </div>
	        </div>
	        <div class="space"></div>
	        <div class="row">
	            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	                <p class="paragraph2 not-padding text-white col-xs-12 col-sm-12 col-md-12">{!!trans('register.descriptionBanner')!!}</p>
	            </div>
	        </div>
	        <br>
	        <div class="row">
	            <div class="col-xs-6 col-xs-offset-3" id='credits'>
	                <p class="paragraph1 text-white text-center"><strong>{{ trans('register.initialCredits') }}</strong></p>
	                <p class="paragraph1 text-white text-center"> <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image>
                        {{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? trans('nav.credit') : trans('nav.credits') }}</p>
	            </div>
	        </div>
	        <div class="space"></div>
	    </div>
	</section>
	
	<section  id='pass' class='not-padding-bottom'>
		<div class="container">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">				
				@include('partial/pass')
			</div>
		</div>
	</section>

	<section class='row' id='profile'>
	    <div class="container">
	    	<div class='row'>
		        <article class='col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-0'>
		            <div class='row'>
		                <div class='col-xs-6 col-xs-offset-3 col-sm-8 col-sm-offset-2'>
		                    <div class="col-xs-12" >
		                    
		                    	<avatar :cover='myData.cover'>
			                    	
			                    		<template scope="props">
			                    			@include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#0f6784', 'borderSize' => '3px', 'extra' => array('image' => ':xlink:href=props.cover')))
		                        		</template>
		                        	
		                        </avatar>
		                        <p class="avatarMsg hidden">El peso màximo de la imagen debe ser de 3 Megas.</p>
		                     </div>              
		                </div>    
	
		            </div>
					<div class="space"></div>
		            <div class="row">
		                <div class='col-xs-6 col-xs-offset-3  col-sm-8 col-sm-offset-2'>
		                    <label for='avatar' class='button1 background-active-color col-xs-12 text-center'>Actualizar Foto</label>
		                </div>
		            </div>
	
		            
		        </article>
	            <div class="clearfix visible-sm"></div>
		        <article class='col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0 not-padding'>
		        	{!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form', 'form-validation' => '']) !!}
						<input type="file" name='avatar' id='avatar' class='hidden validation' @change='this.previewPhoto' data-validations='["maxFile:2500000"]'/>
			        	<register profile='0'>	
			        					    
			        	</register>
			        {!! Form::close() !!}
				</article>
			
			</div>
	    </div>
	</section>

@endsection

