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
               <h2 class="title1">{{ trans('home.allService') }}</h2>
           </div>
       </div>

        <div class="row">

            <div class="col-md-8">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active">
                        <a href="#all" data-toggle="tab">{{ trans('home.all') }}</a>
                    </li>
                    <li role="presentation">
                        <a href="#featured" data-toggle="tab">{{ trans('home.featured') }}</a>
                    </li>
                    <li role="presentation">
                        <a href="#virtual" data-toggle="tab">{{ trans('home.virtual') }}</a>
                    </li>
                    <li role="presentation">
                       <a href="#faceToFace" data-toggle="tab">{{ trans('home.faceToFace') }}</a>
                    </li>
                </ul>
            </div>

            <div class='col-md-1 not-padding'>
                <p class="paragraph10">{{ trans('home.filter') }}</p>
            </div>

            <div class="col-md-3">
                <filters-categories categories='{{ $categories }}'></filters-categories>
            </div>
        </div>
        <br>

        <article class="row tab-content">
            <div id='all' class='tab-pane fade in active'>
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

            <div id='featured' class="tab-pane fade">
                <div class="content">
                    @include('home.partial.listService', ['services' => $featured->take(6)])
                </div>

                <div class="col-xs-12 text-center">
                    <ul class="pagination pagination-sm" data-list='featured' data-route='/listServiceFeatured'>
                        @for($i = 1 ; $i <= ceil($featured->count() / 6); $i ++)

                          <li data-page='{{$i}}' @if($i == 1) class='active' @endif>
                              <a href="#all">{{$i}}</a>
                          </li>

                        @endfor
                    </ul>
                </div>
            </div>

            <div id='virtual' class="tab-pane fade">
                <div class="content">
                    @include('home.partial.listService', ['services' => $virtual->take(6)])
                </div>

                <div class="col-xs-12 text-center">
                    <ul class="pagination pagination-sm" data-list='virtual' data-route='/listServiceVirtual'>
                        @for($i = 1 ; $i <= ceil($virtual->count() / 6); $i ++)

                          <li data-page='{{$i}}' @if($i == 1) class='active' @endif>
                              <a href="#all">{{$i}}</a>
                          </li>

                        @endfor
                    </ul>
                </div>
            </div>

            <div id='faceToFace' class="tab-pane fade">
               <div class="content">
                    @include('home.partial.listService', ['services' => $faceToFace->take(6)])
                </div>

                <div class="col-xs-12 text-center">
                    <ul class="pagination pagination-sm" data-list='faceToFace' data-route='/listServiceFaceToFace'>
                        @for($i = 1 ; $i <= ceil($faceToFace->count() / 6); $i ++)

                          <li data-page='{{$i}}' @if($i == 1) class='active' @endif>
                              <a href="#all">{{$i}}</a>
                          </li>

                        @endfor
                    </ul>
                </div>
            </div>

        </article>

        <div class="row">
           <div class="col-xs-12">
               <h2 class="title1">{{ trans('home.campaigns') }}</h2>
           </div>
       </div>

        <article class="row">

            @foreach($campaigns as $key => $campaign)
                <div class='col-md-6 col-xs-12 col-sm-6'>
                    @include('partial/campaignBox')
                </div>
            @endforeach


        </article>


    </div>
@endsection
