@extends('layouts.app')
@section('content')
@include('nav',array('type' => 2))
{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
  <newservice></newservice>
{!! Form::close() !!}
<div class="container">
	<div class="row">
	    <ul  class="nav nav-pills col-md-9">
			<li class="active">
	        	<a  href="#filterAll" data-toggle="tab" class='parrafo3'>Todos</a>
			</li>
			<li>
	        	<a  href="#filterRecommended" data-toggle="tab" class='parrafo3'>Recomendados</a>
			</li>
		</ul>
		<div class='col-md-1 not-padding'>
			<p class="paragraph10">Filtrar&nbsp;por</p>
		</div>
		<div class="col-md-2">
			<filters-categories>
				<template>					
					<option value="0">Todas las categorías</option>
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->category}}</option>
					@endforeach
				</template>
			</filters-categories>
		</div>
		<div class="tab-content clearfix">
			<div class="tab-pane active" id="filterAll">
				<div class='row'>
			        @foreach($allServices as $key => $service)
			          
			          <div class='col-md-4 col-xs-12 col-sm-6'>
				          	
				          @include('partial/serviceBox', array("service" => $service))
				          		          	
			          </div>
			          
			        @endforeach
			    </div>
			</div>
			
			<div class="tab-pane" id="filterRecommended">
				<div class='row'>
			        @foreach($recommendedServices as $key => $service)
	
			          <div class='col-md-4 col-xs-12 col-sm-6'>
				          	
				          @include('partial/serviceBox', array("service" => $service))
				          		          	
			          </div>
			          
			        @endforeach
			    </div>
			</div>
		</div>	
  	</div>
</div>


@endsection
