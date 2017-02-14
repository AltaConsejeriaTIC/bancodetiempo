@extends('layouts.app')
@section('content')
	<modal></modal>
	@include('nav',array('type' => 3))

	{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
	<newservice></newservice>
	{!! Form::close() !!}
	<div class="container">
		<div class="row">
			<ul  class="nav nav-pills col-md-8">
				<li class="active">
					<a  href="#filterAll" data-toggle="tab" class='parrafo3'  v-on:click='filterCategory(0)'>Todos</a>
				</li>
			</ul>
			<div class='col-md-1 not-padding'>
				<p class="paragraph10">Filtrar&nbsp;por</p>
			</div>
			<div class="col-md-3">
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
				</div>


			</div>
		</div>
	</div>


@endsection

