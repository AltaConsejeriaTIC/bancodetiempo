<div id="detailSite" class="transition col-xs-12" data-in='{"left":"0%", "opacity":1}' data-out='{"left":"150%", "opacity":0}'>
	 <div class="row">
	       <div class="col-xs-12">
	           <p class="paragraph1 buttonTransition pointer" data-open='#suggestedSites'><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</p>
	       </div>
	   </div>
	   
	   <div class="row">
	       <div class="col-xs-12">
	           <h2 class="title1 text-center" :class='"fa fa-"+myData.siteIcon'></h2>	           
	       </div>
	   </div>
	   
	   <div class="row">
	       <div class="col-xs-12">
	           <h2 class="title1 text-center" v-html='myData.siteName'></h2>	           
	       </div>
	   </div>
	   
	   <div class="panel">
	   <div class="space"></div>
	   	<div class="row">
	   		<div class="col-xs-12">
	   			<p><strong>{{ trans("deals.address") }}:</strong> @{{myData.siteAddress}}</p>
	   		</div>
	   	</div>
	   	
	   	<div class="row">
	   		<div class="col-xs-12">
	   			<p><strong>{{ trans("deals.phone") }}:</strong> @{{myData.siteContact}}</p>
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
	   			<a :href='"http://maps.google.com/?q="+myData.siteCoordinates' class='button1 background-active-color col-xs-10 col-xs-offset-1' target="_blank">Ubicar sitio en Google Maps</a>
	   		</div>
	   	</div>
	   	<div class="space"></div>
	   
	   </div>
</div>