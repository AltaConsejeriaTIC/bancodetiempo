<div id="suggestedSites" class="transition col-xs-12" data-in='{"left":"0%", "opacity":1}' data-out='{"left":"150%", "opacity":0}'>
   <div class="row">
       <div class="col-xs-12">
           <p class="paragraph1 buttonTransition" data-open='#dealBox'><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</p>
       </div>
   </div>
   <div class="row">
       <div class="col-xs-12">
           <h2 class="title1">{{ trans("deals.titleSuggestedSites") }}</h2>
       </div>
   </div>

	@foreach($categoriesSites as $index => $category)
	
		<div class="row">
	       <div class="col-xs-12">
	            <button data-toggle="collapse" data-target="#category{{$index}}" class="suggestedButton text-left col-xs-12">
	                <i class="icon fa fa-{{$category->icon}}"></i>&nbsp;&nbsp;{{$category->name}} <i class="iconState fa fa-plus"></i>
	            </button>
	
	            <div id="category{{$index}}" class="collapse sitesList">
	            	<ul>
	                @foreach($category->sites as $site)
	                
	                	<li class='buttonTransition' data-open='#detailSite'>{{$site->name}}</li>
	                
	                @endforeach
	                </ul>
	            </div>
	       </div>
		</div>
	
	@endforeach
	
   

</div>
