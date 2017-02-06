@if(count($services) >= 2)
	<div class="modal fade" id="DeleteService{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-box" role="document">
	    <div class="modal-content-box">            
	      <div class="modal-wrapper">
	        <div class="modal-container">
	          <div class="modal-header">
	            <button type="button" class="close circle-shape" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          </div>
						
						<div class="row">
							<div class='col-xs-12'>
								<div class="row">
									<h1 class="title1 col-xs-12 text-center">Eliminar Oferta </h1>
								</div>
								
								<div class="row">
									<p class="text-center paragraph2">
								    ¿Deseas eliminar esta oferta de forma permanente? 
								  </p>
								</div>																						
								<div class="space10"></div>
								<div class="row">																			
					          <button class="col-xs-12 button10 background-white">
					            Eliminar oferta
					          </button>									
								</div>
								<div class="space10"></div>
								<div class="row">
									<button class="col-xs-12 button1 background-active-color" data-dismiss="modal" aria-label="Close">
							      Cancelar
							    </button>
								</div>
								<div class="space10"></div>
							</div>
						</div>					
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@else
	<div class="modal fade" id="DeleteService{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-box" role="document">
	    <div class="modal-content-box">            
	      <div class="modal-wrapper">
	        <div class="modal-container">
	          <div class="modal-header">
	            <button type="button" class="close circle-shape" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          </div>
						
						<div class="row">
							<div class='col-xs-12'>
								<div class="row">
									<h1 class="title1 col-xs-12 text-center">No puedes eliminar tu oferta </h1>
								</div>
								
								<div class="row">
									<p class="text-center paragraph2">
								    Debes tener al menos una oferta registrada. 
								  </p>
								</div>																																						
								<div class="space10"></div>
								<div class="row">
									<button class="col-xs-12 button1 background-active-color" data-dismiss="modal" aria-label="Close">
							      Aceptar
							    </button>
								</div>
								<div class="space10"></div>
							</div>
						</div>					
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@endif