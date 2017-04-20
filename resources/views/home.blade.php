@extends('layouts.app')
@section('content')

	@if(!is_null(Auth::User()))
		@include('nav',array('type' => 2))
	@else
		@include('nav',array('type' => 3))
	@endif

	<div class="container">
		<div class="row">
		    <ul  class="nav nav-pills col-md-8 col-xs-4">
				<li class="active">
		        	<a  href="#filterAll" data-toggle="tab" class='parrafo3' v-on:click='filterCategory(0)'>{{ trans('home.all') }}</a>
				</li>
				<li class="hidden">
		        	<a  href="#filterRecommended" data-toggle="tab" class='parrafo3'>{{ trans('home.Recommended') }}</a>
				</li>
				<li>
				    <a  href="#filterCampaign" data-toggle="tab" class='parrafo3'>{{ trans('home.campaigns') }}</a>
				</li>
			</ul>
			<div class='col-md-1 col-xs-3 not-padding'>
				<p class="paragraph10">{{ trans('home.filter') }}</p>
			</div>
			<div class="col-md-3 col-xs-5">
				<filters-categories categories='{{ $categories }}'></filters-categories>
			</div>
		</div>

		@if(count(Illuminate\Support\Facades\Session::get("filters.tags", [])) > 0)
            <div class="row">

               <strong class="paragraph1">Filtros: </strong>
                @foreach(Illuminate\Support\Facades\Session::get("filters.tags", []) as $tag)
                    <a tag="{{$tag->id}}" class="input-tag button7 tag-margin"><span>{{ App\Models\Tag::find($tag->id)->tag }}</span></a>
                @endforeach
                <a href='/filter'>Borrar filtros</a>
            </div>
        @endif
		<div class='row'>

            <div class="tab-content clearfix">
                <div class="tab-pane active" id="filterAll">
                  <div class='row'>
                    @foreach($allServices as $key => $service)

                      <div class='col-md-4 col-xs-12 col-sm-6'>
                          @include('partial/serviceBox', array("service" => $service))
                      </div>

                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $allServices->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>


                <div class="tab-pane hidden" id="filterRecommended">
                    <div class='row'>
                        @if($recommendedServices != '')
                            @foreach($recommendedServices as $key => $service)

                              <div class='col-md-4 col-xs-12 col-sm-6'>

                                  @include('partial/serviceBox', array("service" => $service))

                              </div>

                            @endforeach
                         @endif
                    </div>
                </div>

                <div class="tab-pane" id="filterCampaign">
                    <div class='row'>
                        @if($campaigns != '')
                            @foreach($campaigns as $key => $campaign)

                              <div class='col-md-4 col-xs-12 col-sm-6'>

                                  @include('partial/campaignBox')

                              </div>

                            @endforeach
                         @endif
                    </div>
                </div>

	       </div>
	    </div>

    </div>



@endsection
