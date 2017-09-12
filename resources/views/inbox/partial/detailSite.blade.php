<div id="detailSite" class='row' canvas>
	 <div class="col-md-8 col-md-offset-2">
		 <div class="row">
		       <div class="col-xs-12">
		           <p class="paragraph1 buttonTransition pointer" data-open='#suggestedSites'><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</p>
		       </div>
		   </div>
		   
		   <div class="row">
		       <div class="col-xs-12">
		           <h2 class='text-center'><i class='' id='iconSite'></i></h2>	           
		       </div>
		   </div>
		   
		   <div class="row">
		       <div class="col-xs-12">
		           <h2 class="title1 text-center" id='siteName'></h2>
		       </div>
		   </div>
		   
		   <div class="panel border-active">
			   <div class="space"></div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p><strong>{{ trans("deals.address") }}:</strong> <span id='siteAddress'></span></p>
			   		</div>
			   	</div>
			   	
			   	<div class="row">
			   		<div class="col-xs-12">
                        <p class="pre"><strong>{{ trans("deals.phones") }}:</strong> <span id='siteContact'></span></p>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p class="pre"><strong>{{ trans("deals.description") }}:</strong> <span id='siteDescription'></span></p>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p class="pre"><strong>{{ trans("deals.requeriments") }}:</strong> <span id='siteRequirements'></span></p>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<a href='' id='siteCoordinates' class='button1 text-center background-active-color col-xs-10 col-xs-offset-1  col-md-8 col-md-offset-2' target="_blank">Ubicar sitio en Google Maps</a>
			   		</div>
			   	</div>
			   	<div class="space"></div>	   
		   </div>
		   
		   <div class="row">
	            <div class="col-xs-12">
	                <button class="col-xs-12 col-md-6 col-md-offset-3 button1 background-active-color text-center buttonTransition sendCoordinates" type="button" data-open='#dealForm'>
	                    Seleccionar este lugar
	                </button>
	            </div>
	       </div>
		   <br>
		   <div class="row">
	            <div class="col-xs-12">
	                <button class="col-xs-12 col-md-6 col-md-offset-3 button10 background-white text-center buttonTransition" type="button" data-open='#suggestedSites'>
	                    Cancelar
	                </button>
	            </div>
	       </div>
	       <div class="space"></div>
	  </div>
	   
</div>
