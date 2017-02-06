
@foreach($servicesForCategory as $service) 
	
	<div class='col-md-4 col-xs-12 col-sm-6'>

		@include('partial/serviceBox', array("service" => $service))
	
	</div>
	
@endforeach