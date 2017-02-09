@if(count($servicesForCategory) > 0)
	@foreach($servicesForCategory as $service) 
		
		<div class='col-md-4 col-xs-12 col-sm-6'>
	
			@include('partial/serviceBox', array("service" => $service))
		
		</div>
		
	@endforeach
@else	
	<div class='col-md-12 col-xs-12 col-sm-6 text-center'>
	
			<h4>No se encuentran resultados</h4>
		
	</div>
@endif