@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">
@section('content')
@include('nav',array('type' => 2))

<div class="container">
    <ul  class="nav nav-pills">
		<li class="active">
        	<a  href="#filterAll" data-toggle="tab" class='parrafo3'>Todos</a>
		</li>
		<li>
        	<a  href="#filterRecommended" data-toggle="tab" class='parrafo3'>Recomendados</a>
		</li>
	</ul>

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


@endsection
