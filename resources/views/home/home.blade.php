@extends('layouts.app')
@if(Auth:check())
    @section("script")
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js"></script>
        <script src="{{ asset('js/notifications.js') }}"></script>
    @endsection
@endif
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
            <div class="hidden">
                @{{setMyData("urlFilter", "/listService")}}
                @{{setMyData("tabFilter", "all")}}
            </div>
            <div class="col-md-8">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active">
                        <a href=".all" data-toggle="tab"
                           @click='setMyData("urlFilter", "/listService");setMyData("tabFilter", "all");'>{{ trans('home.all') }}</a>
                    </li>
                    <li role="presentation">
                        <a href=".featured" data-toggle="tab"
                           @click='setMyData("urlFilter", "/listServiceFeatured");setMyData("tabFilter", "featured");'>{{ trans('home.featured') }}</a>
                    </li>
                    <li role="presentation">
                        <a href=".virtual" data-toggle="tab"
                           @click='setMyData("urlFilter", "/listServiceVirtual");setMyData("tabFilter", "virtual");'>{{ trans('home.virtual') }}</a>
                    </li>
                    <li role="presentation">
                        <a href=".faceToFace" data-toggle="tab"
                           @click='setMyData("urlFilter", "/listServiceFaceToFace");setMyData("tabFilter", "faceToFace");'>{{ trans('home.faceToFace') }}</a>
                    </li>
                </ul>
            </div>

            <div class='col-md-1 col-xs-4 not-padding'>
                <p class="paragraph10">{{ trans('home.filter') }}</p>
            </div>

            <div class="col-md-3 col-xs-8 ">
                <article class="tab-content">
                    <div class="all tab-pane fade active in">
                        <filters-categories categories='{{ $categories }}' name='all'></filters-categories>
                    </div>
                    <div class="featured tab-pane fade">
                        <filters-categories categories='{{ $categories }}' name='featured'></filters-categories>
                    </div>

                    <div class="virtual tab-pane fade">
                        <filters-categories categories='{{ $categories }}' name='virtual'></filters-categories>
                    </div>

                    <div class="faceToFace tab-pane fade">
                        <filters-categories categories='{{ $categories }}' name='faceToFace'></filters-categories>
                    </div>
                </article>
            </div>
        </div>
        <br>

        <article class="row tab-content">
            <div id='all' class='tab-pane fade in active all'>
                @include('home.partial.listService', ['services' => $services, 'page' => 1, 'route' => 'listService', 'box' => 'all'])
            </div>

            <div id='featured' class="tab-pane fade featured">
                @include('home.partial.listService', ['services' => $featured, 'page' => 1, 'route' => 'listServiceFeatured', 'box' => 'featured'])
            </div>

            <div id='virtual' class="tab-pane fade virtual">
                @include('home.partial.listService', ['services' => $virtual, 'page' => 1, 'route' => 'listServiceVirtual', 'box' => 'virtual'])
            </div>

            <div id='faceToFace' class="tab-pane fade faceToFace">
                @include('home.partial.listService', ['services' => $faceToFace, 'page' => 1, 'route' => 'listServiceFaceToFace', 'box' => 'faceToFace'])
            </div>

        </article>

        <div class="row">
            <div class="col-xs-12">
                <h2 class="title1">{{ trans('home.campaigns') }}</h2>
            </div>
        </div>

        <article class="row" id='campaigns'>

            @foreach($campaigns as $key => $campaign)
                <div class='col-md-6 col-xs-12 col-sm-6'>
                    @include('partial/campaignBox')
                </div>
            @endforeach

            <div class="clearfix"></div>
            <div class="col xs 12 text-center">
                <ul class="pagination pagination-sm">
                    @php($lastPageCampaigns = ceil($campaigns->total()/4) > 10 ? 10 : ceil($campaigns->total()/4))
                    @for($i = 1 ; $i <= $lastPageCampaigns; $i++)
                        <li @if($i == 1) class='active' @endif>
                            <a href="/campaigns/list?page={{$i}}">{{$i}}</a>
                        </li>
                    @endfor
                </ul>
            </div>

        </article>
    </div>
@endsection
