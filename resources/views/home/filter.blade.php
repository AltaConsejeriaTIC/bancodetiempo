@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">

       <div class="row">
           <div class="col-xs-12">
               <h2 class="paragraph1">{!! trans('home.searching', ['val' => Request::get('filter')]) !!}</h2>
           </div>
       </div>

        <div class="row">

            <div class="col-md-8">
                 <ul class="nav nav-pills">
                    <li role="presentation" class="active">
                        <a href="#all" data-toggle="tab">
                            {{ trans('home.services') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#campaigns" data-toggle="tab">
                            {{ trans('home.campaigns') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class='col-md-1 col-xs-3 not-padding'>
                <p class="paragraph10">{{ trans('home.filter') }}</p>
            </div>

            <div class="col-md-3 col-xs-9">
                <filters-categories categories='{{ $categories }}'></filters-categories>
            </div>
        </div>
        <br>

        <article class="row tab-content">
            <div id='all' class="tab-pane fade in active">
                <div class="content">
                    @include('home.partial.listService', ['services' => $services->take(6)])
                </div>

                <div class="col-xs-12 text-center">
                    <ul class="pagination pagination-sm" data-list='all' data-route='/listService'>
                        @for($i = 1 ; $i <= ceil($services->count() / 6); $i ++)

                          <li data-page='{{$i}}' @if($i == 1) class='active' @endif>
                              <a href="#all">{{$i}}</a>
                          </li>

                        @endfor
                    </ul>
                </div>

            </div>

            <div id='campaigns' class="tab-pane fade">
                <div class="content">
                    @include('home.partial.listCampaigns', ['campaigns' => $campaigns->take(6)])
                </div>

                <div class="col-xs-12 text-center">
                    <ul class="pagination pagination-sm" data-list='all' data-route='/listService'>
                        @for($i = 1 ; $i <= ceil($campaigns->count() / 6); $i ++)

                          <li data-page='{{$i}}' @if($i == 1) class='active' @endif>
                              <a href="#all">{{$i}}</a>
                          </li>

                        @endfor
                    </ul>
                </div>

            </div>

        </article>


    </div>
@endsection
