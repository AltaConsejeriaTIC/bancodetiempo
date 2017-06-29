<div id="suggestedSites" class="transition col-xs-12" data-in='{"left":"0%", "opacity":1}' data-out='{"left":"150%", "opacity":0}'>
   <div class="row">
       <div class="col-xs-12">
           <p class="paragraph1 buttonTransition pointer" data-open='#dealBox'><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</p>
       </div>
   </div>
   <div class="row">
       <div class="col-xs-12">
           <h2 class="title1">{{ trans("deals.titleSuggestedSites") }}</h2>
       </div>
   </div>
	<input type="hidden" v-model='edit' />
	@foreach($categoriesSites as $index => $category)
	
		<div class="row">
	       <div class="col-xs-12">
	            <button data-toggle="collapse" data-target="#category{{$index}}" class="suggestedButton text-left col-xs-12">
	                <i class="icon fa fa-{{$category->icon}}"></i>&nbsp;&nbsp;{{$category->name}} <i class="iconState fa fa-plus"></i>
	            </button>
	
	            <div id="category{{$index}}" class="collapse sitesList">
	            	<ul>
	                @foreach($category->sites as $site)
	                
	                	<li class='buttonTransition pointer' data-open='#detailSite' 
	                	@click='putMyData("siteName", "{{$site->name}}");
	                	putMyData("siteAddress", "{{$site->address}}");
	                	putMyData("siteContact", "{{$site->contact}}");
	                	putMyData("siteDescription", "{{$site->description}}");
	                	putMyData("siteRequirements", "{{$site->requirements}}");
	                	putMyData("siteCoordinates", "{{$site->coordinates}}");
	                	putMyData("siteIcon", "{{$category->icon}}");
	                	edit= edit ? false : true;
	                	'>{{$site->name}}</li>
	                
	                @endforeach
	                </ul>
	            </div>
	       </div>
		</div>
	
	@endforeach
	
   

</div>
