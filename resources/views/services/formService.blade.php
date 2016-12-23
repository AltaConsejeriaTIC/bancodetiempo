@extends('layouts.app')

@section('content')

@include('nav', array('type' => 1))

<section class='banner2' >

	<div class='fondo'>
	
		<img src="{{ asset('images/banner3.jpg') }}" alt="" />
		<div class="telon"></div>
	
	</div>
	
	<div class="container">
		
		<div class="row">
			<div class='clearfix mTop-50 visible-xs'></div>
			<div class='clearfix mTop-100 visible-sm'></div>
			<div class='clearfix mTop-100 visible-md visible-lg'></div>
			<div class='col-xs-12 col-sm-3 col-md-4 col-lg-4'>
			
				<div class='row'>
					 <svg class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2" viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                          <image  xlink:href="{{ $user->avatar }}" x="-25" width="150" height="100" />
                        </pattern>
                      </defs>
                      <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                    </svg>
				</div>
				
				<div class='row'>
					<h3 class='white-text col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2' style='text-transform:capitalize'>{{ $user->first_name . " " . $user->last_name }}</h3>
				</div>
				
			</div>
			<div class='white-text col-xs-12 col-sm-6  col-md-4 col-lg-4'>
			
				<h3>Bienvenido a nuestra comunidad</h3>
				
				<p>Para empezar, cuentanos, que quieres ofrecer. Recuerda que puedes ofertar una habilidad, servicio o destreza y puedes editar y crear nuevas ofertas mas adelante</p>
			
			</div>
			<div class='col-xs-12 col-sm-3  col-md-4 col-lg-4'></div>
		
		</div>
	
	</div>

</section>
<div class="panel panel-default">
    <div class="panel-body">
    	<div class="container">
    		<div class="row">
           		
           		<h2 class='text-second-color col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4'>¿{{ trans('dictionary.titleServiceFrom') }}?</h2>
           		<br><br><br><br>
           		<p class='text-second-color col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4'>{{ trans('dictionary.text1ServiceFrom') }}</p>
           		
           		<a class='white-text submit text-center col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4'>{{ trans('dictionary.labelTest') }}</a>
           		 	
           </div>
           <br><br><br>
           {!! Form::open(['url' => '/service/save', 'method' => $method, 'enctype' => 'multipart/form-data', 'class' => 'form-bt row', 'role' => 'form']) !!}
           <div class='row'>
           
           		<div class="{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
	           	          
		            {{ Form::text('name', isset($service->name) ? $service->name : "", ['class' => 'form-bt col-xs-12', 'required', 'placeholder' => trans('dictionary.title')]) }}
		            
		        </div>
           
           </div>
	        
	        <div class='row'>
	        
	        	<div class="{{ $errors->has('description') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
	           	          
		            {{ Form::textarea('description', isset($service->description) ? $service->description : "", ['class' => 'form-bt col-xs-12', 'required', 'placeholder' => trans('dictionary.description')]) }}
		            
		        </div>
	        
	        </div>
	        
	        <div class="row">
	        
	        	<div class=" row col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
	           	  
		           	<div class='col-xs-6 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 col-lg-6 col-lg-offset-0 bt-image'>
		           	
		           		<div>
		           		
		           			<img src="{{isset($service->image) ? '/images/services/'.$service->image : ''}}" >
		           		                       
	                		{{ Form::file('image', '') }}
		           		
		           			<span>Sube una foto</span>
		           		
		           		</div>
		           	           		
		           	
		           	</div>
		           	
		           	<div class='col-xs-6 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 col-lg-6 col-lg-offset-0'>
		           	
		           		 {{ Form::checkbox('virtually', 1, isset($service->virtually) ? $service->virtually : "", ['class' => 'form-bt', 'id' => 'virtually']) }}
		           		 {{ Form::label('virtually', trans('dictionary.virtuality'), ['class' => 'col-md-4 control-label']) }}
		           		 
		           		 <div class='clearfix'></div>
		           		 
		           		 {{ Form::checkbox('presently', 1, isset($service->presently) ? $service->presently : "", ['class' => 'form-bt', 'id' => 'presently']) }}
		           	     {{ Form::label('presently', trans('dictionary.presently'), ['class' => 'col-md-4 control-label']) }}      		
		           	
		           	</div>
		           	          
		           
		            
		        </div>
	        
	        </div>	        
	        
	        <div class="row">
	        
	        	<div class="{{ $errors->has('value') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
		           	          
		            {{ Form::number('value', isset($service->value) ? $service->value : "", ['class' => 'col-xs-3, col-sm-3 col-md-3 col-lg-3 form-bt', 'required']) }}
		            
		        </div>
	        
	        </div>
	        
	        <div class='row'>
	        
	        	<div class="{{ $errors->has('description') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
	           	          
		            {{ Form::textarea('description', isset($service->description) ? $service->description : "", ['class' => 'form-bt col-xs-12', 'required']) }}
		            
		        </div>
	        
	        </div>
	         
	        <div class='row'>
	        
	        	<div class="{{ $errors->has('description') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
	           	          
		            {{ Form::select('category[]', $selectedCategories , isset($service->category_id) ? $service->category_id : null, ['class' => 'form-control', 'required', 'multiple']) }}
           
		        </div>
	        
	        </div>
	         
	         <div class="row">
	         
	         	{{ Form::hidden('serviceId', isset($service->id) ? $service->id : "") }}
				
                <button type="submit" class="btn btn-primary">
                    {{ trans('dictionary.save') }}
                </button>
	         
	         </div>   
           
           {!! Form::close() !!}
           
        </div>
    </div>
</div>

@endsection