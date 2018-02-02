<div id="suggestedSites" class="row" canvas>
   <div class="col-md-12">
	   <div class="row">
	       <div class="col-xs-12">
	           <a class="paragraph1"  href="#formCampaing" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;{{trans("deals.back")}}</a>
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
		                
		                      <li class='showDetailSite' onclick="jQuery(this).removeClass('active')">
                                 <a href="#detailSiteTab" aria-controls="profile" role="tab" data-toggle="tab">
		                	     {{$site->name}}
                                </a>
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