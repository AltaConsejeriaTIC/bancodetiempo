@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">
@section('content')
	<modal v-if="this.showModal" @@close="showModal = false">
	</modal>
	@include('nav',array('type' => 3))

	<div class="container">

		<ul  class="nav nav-pills">
			<li class="active">
				<a  href="#filterAll" data-toggle="tab" class='parrafo3'>Todos</a>
			</li>
		</ul>

		<div class="tab-content clearfix">
			<div class="tab-pane active" id="filterAll">
				<div class='row'>
					@foreach($allServices as $key => $service)

						<div class='col-md-4 col-xs-12 col-sm-6'>

							@include('partial/serviceBox', array("service" => $service, "edit" => "0"))  

						</div>

					@endforeach
				</div>
			</div>

		</div>
	</div>


@endsection
