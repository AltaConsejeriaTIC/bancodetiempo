@if($dealState != null)
	@if($dealState->state_id != 8 || $dealState->state_id != 10 || $dealState->state_id != 11)
		<div class="row not-margin text-center">
			<div class="row">
	      @if($dealState->state_id == 4)
	        <h1 class="title1 text-center">Propuesta de acuerdo</h1>
	      @endif
	      @if($dealState->state_id == 7)
	        <h1 class="title1 text-center">Acuerdo</h1>
	      @endif
	      @if($dealState->state_id == 4)
	        <h4 class="textDealIntialState text-center">¡Tienes 72 horas para aceptar!</h4>
	      @endif
	      @if($dealState->state_id == 7)
	        <h4 class="textDealAgreedState text-center">¡Tienes un acuerdo con {{$deal->user->first_name}}!</h4>
	      @endif
	    </div>
	    <div class="row not-margin">
		    <p class="not-margin">
		      <strong>Oferta:</strong> {{$deal->service->name}}
		    </p>
		  </div>
		  <div class="row not-margin">	  	
		    @if($dealState->state_id == 4)
		      <div class="col-md-4 col-md-offset-2 text-center">
		        <button name="agree" class='button1 background-active-green-color col-md-12'>Aceptar</button>
		      </div>
		    @endif
	      <div class="col-md-4 text-center">
	        <button name="decline" class='dealButtonCancel background-white col-md-12'>Declinar</button>
	      </div>
		  </div>
	  </div>
	@endif
@endif