@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">
@section('content')
@include('nav',array('type' => 2))

<div class="panel">
      <div class="container">
          <ul  class="nav nav-pills">
			<li class="active">
        		<a  href="#1a" data-toggle="tab">Todos</a>
			</li>
		</ul>

		<div class="tab-content clearfix">
			<div class="tab-pane active" id="1a">
				<div class='row'>
		          @foreach($allServices as $service)
		          
		          	<div class='col-md-4'>
			          	
			          	@include('partial/serviceBox', array("service" => $service))
			          		          	
		          	</div>
		          
		          @endforeach
		        </div>
			</div>
  		</div>
    </div>
</div>

@endsection
