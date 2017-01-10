@extends('layouts.app')

@section('content')

	<section class='bannerHome row'>
		<div class="container">
			<article class='col-xs-12'>
				
				<div class='row'>
				
					<div class='col-xs-5'>
						@include('partial/imageProfile', array('cover' => 'images/foto_camila.jpg', 'id' => 'foto_camila'))
					</div>
					
				</div>
				
			</article>
			
			<article class='col-xs-12'></article>
		</div>
	</section>

	<!--  
	@foreach($lastServices as $key => $service)

		<div class='col-md-4 col-xs-12 col-sm-6'>
			@include('partial/serviceBox', array("service" => $service))
		</div>

	@endforeach
	-->		

@endsection
