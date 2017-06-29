<div id="detailSite" class="transition col-xs-12" data-in='{"left":"0%", "opacity":1}' data-out='{"left":"150%", "opacity":0}'>
	 <div class="col-md-8 col-md-offset-2">
		 <div class="row">
		       <div class="col-xs-12">
		           <p class="paragraph1 buttonTransition pointer" data-open='#suggestedSites'><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</p>
		       </div>
		   </div>
		   
		   <div class="row">
		       <div class="col-xs-12">
		           <h2 class='text-center'><i :class='"fa fa-"+myData.siteIcon'></i></h2>	           
		       </div>
		   </div>
		   
		   <div class="row">
		       <div class="col-xs-12">
		           <h2 class="title1 text-center" v-html='myData.siteName'></h2>	           
		       </div>
		   </div>
		   
		   <div class="panel border-active">
			   <div class="space"></div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p><strong>{{ trans("deals.address") }}:</strong> @{{myData.siteAddress}}</p>
			   		</div>
			   	</div>
			   	
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p><strong>{{ trans("deals.phones") }}:</strong> @{{myData.siteContact}}</p>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p><strong>{{ trans("deals.description") }}:</strong> @{{myData.siteDescription}}</p>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<p><strong>{{ trans("deals.requeriments") }}:</strong> @{{myData.siteRequirements}}</p>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-xs-12">
			   			<a :href='"http://maps.google.com/?q="+myData.siteCoordinates' class='button1 text-center background-active-color col-xs-10 col-xs-offset-1  col-md-6 col-md-offset-3' target="_blank">Ubicar sitio en Google Maps</a>
			   		</div>
			   	</div>
			   	<div class="space"></div>	   
		   </div>
		   
		   <div class="row">
	            <div class="col-xs-12">
	                <button class="col-xs-12 col-md-6 col-md-offset-3 button1 background-active-color text-center  buttonTransition sendCoordinates" type="button" data-open='#dealBox' :coordinates='myData.siteCoordinates' :nameSite='myData.siteName'>
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