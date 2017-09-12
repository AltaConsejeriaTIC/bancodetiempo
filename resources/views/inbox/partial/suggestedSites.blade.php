<div id="suggestedSites" class="row" canvas>
   <div class="col-md-8 col-md-offset-2">
	   <div class="row">
	       <div class="col-xs-12">
	           <p class="paragraph1 buttonTransition pointer" data-open='#dealForm'><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</p>
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
		                
		                	<li class='buttonTransition pointer showDetailSite' data-open='#detailSite'>
		                	{{$site->name}}
                               <input type="hidden" name='icon' value="fa-{{$category->icon}}">
                               <input type="hidden" name='name' value="{{$site->name}}">
                               <input type="hidden" name='address' value="{{$site->address}}">
                               <input type="hidden" name='requirements' value="{{$site->requirements}}">
                               <input type="hidden" name='contact' value="{{$site->contact}}">
                               <input type="hidden" name='description' value="{{$site->description}}">
                               <input type="hidden" name='coordinates' value="{{$site->coordinates}}">
		                	</li>
		                
		                @endforeach
		                </ul>
		            </div>
		       </div>
		       
		 </div>
	
	@endforeach

	</div>
   
</div>
