@extends('layouts.app')
@section('content')

@if(!is_null(Auth::User()))
	@include('nav',array('type' => 2))
@else
	@include('nav',array('type' => 3))
@endif
{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
  <newservice></newservice>
{!! Form::close() !!}
<div class="container">
	<div class="row">
	    <ul  class="nav nav-pills col-md-8 col-xs-4">
			<li class="active">
	        	<a  href="#filterAll" data-toggle="tab" class='parrafo3' v-on:click='filterCategory(0)'>Todos</a>
			</li>
			<li class="hidden">
	        	<a  href="#filterRecommended" data-toggle="tab" class='parrafo3'>Recomendados</a>
			</li>
		</ul>
		<div class='col-md-1 col-xs-3 not-padding'>
			<p class="paragraph10">Filtrar&nbsp;por</p>
		</div>
		<div class="col-md-3 col-xs-5">
			<filters-categories categories='{{ $categories }}'></filters-categories>
		</div>
	</div>
	<div class='row'>

	<div class="tab-content clearfix">
		<div class="tab-pane active" id="filterAll">
			<div class='row'>
        @foreach($allServices as $key => $service)

          <div class='col-md-4 col-xs-12 col-sm-6'>
	          @include('partial/serviceBox', array("service" => $service))
          </div>

        @endforeach
		  </div>
		  
		  {!! $allServices->links() !!}

			<div class="tab-pane hidden" id="filterRecommended">
				<div class='row'>
					@if($recommendedServices != '')
				        @foreach($recommendedServices as $key => $service)
	
				          <div class='col-md-4 col-xs-12 col-sm-6'>
	
					          @include('partial/serviceBox', array("service" => $service))
	
				          </div>
	
				        @endforeach
				     @endif
			    </div>
			</div>
		</div>
	</div>

</div>


@endsection
