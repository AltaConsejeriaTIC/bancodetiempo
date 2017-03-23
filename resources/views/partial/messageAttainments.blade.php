@if(!is_null(Auth::user()))	

	@if(Session::get('coin') == 1)
	    <generalmodal name='winCoin' :state='myData.winCoin' state-init='true' >
	        <div slot="modal" class="row col-md-12">	        	        	
		        
		        <div class="modal-container">							
								<div class='col-xs-12 col-md-12 aling'>
									<div class="row">
										<h1 class="title1 col-xs-12 text-center">
											<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image> 
											<br> Has Obtenido 1 Dorado
										</h1>
									</div>									
									<div class="space10"></div>
									<div class="row">
										<button class="col-xs-12 button1 background-active-color" v-on:click="myData.winCoin = false">
								      Continuar
								    </button>
									</div>
									<div class="space10"></div>
								</div>							
		      	</div>
				      
	        </div>
	    </generalmodal>
	@endif
	@if(Session::get('coin') == 2)
	    <generalmodal name='winCoin' :state='myData.winCoin' state-init='true' >
	        <div slot="modal" class='row col-md-12'>            
	          <div class="modal-container">							
								<div class='col-xs-12 col-md-12 aling'>
									<div class="row">
										<h1 class="title1 col-xs-12 text-center">
											<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image> 
											<br> Has Obtenido 2 Dorados
										</h1>
									</div>									
									<div class="space10"></div>
									<div class="row">
										<button class="col-xs-12 button1 background-active-color" v-on:click="myData.winCoin = false">
								      Finalizar
								    </button>
									</div>
									<div class="space10"></div>
								</div>							
		      	</div>
	        </div>
	    </generalmodal>
	@endif
@endif
