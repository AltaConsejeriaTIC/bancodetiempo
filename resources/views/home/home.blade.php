@extends('layouts.app')
@if(Auth::check())
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
                    <li role="presentation" class="@if(Request('tab') == 'all' || is_null(Request('tab'))) active @endif">
                        <a href="#all" data-toggle="tab">{{ trans('home.all') }}</a>
                    </li>
                    <li role="presentation" class="@if(Request('tab') == 'featured') active @endif">
                        <a href="#featured" data-toggle="tab">{{ trans('home.featured') }}</a>
                    </li>
                    <li role="presentation" class="@if(Request('tab') == 'virtual') active @endif">
                        <a href="#virtual" data-toggle="tab">{{ trans('home.virtual') }}</a>
                    </li>
                    <li role="presentation" class="@if(Request('tab') == 'facetoface') active @endif">
                        <a href="#faceToFace" data-toggle="tab">{{ trans('home.faceToFace') }}</a>
                    </li>
                </ul>
            </div>

            <div class='col-md-1 col-xs-4 not-padding'>
                <p class="paragraph10">{{ trans('home.filter') }}</p>
            </div>

            <div class="col-md-3 col-xs-8 ">
                <article class="tab-content">
                    <div class="all tab-pane fade @if(Request('tab') == 'all' || is_null(Request('tab'))) active in @endif">
                        <filters-categories categories='{{ $categories }}' name='all'></filters-categories>
                    </div>
                    <div class="featured tab-pane fade @if(Request('tab') == 'featured') active in @endif">
                        <filters-categories categories='{{ $categories }}' name='featured'></filters-categories>
                    </div>

                    <div class="virtual tab-pane fade @if(Request('tab') == 'virtual') active in @endif">
                        <filters-categories categories='{{ $categories }}' name='virtual'></filters-categories>
                    </div>

                    <div class="faceToFace tab-pane fade @if(Request('tab') == 'facetoface') active in @endif">
                        <filters-categories categories='{{ $categories }}' name='faceToFace'></filters-categories>
                    </div>
                </article>
            </div>
        </div>
        <br>

        <article class="row tab-content">
            <div id='all' class="tab-pane fade all @if(Request('tab') == 'all' || is_null(Request('tab'))) active in @endif">
                @include('home.partial.listService', ['_services' => $services, "printPremier" => true])
                <div class="col-xs-12 text-center">
                    {!! $services->appends(["tab" => "all", "featured" => $featured->currentPage(), "virtual" => $virtual->currentPage(), "facetoface" => $faceToFace->currentPage()])->render('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

            <div id='featured' class="tab-pane fade featured @if(Request('tab') == 'featured') active in @endif">
                @include('home.partial.listService', ['_services' => $featured])
                <div class="col-xs-12 text-center">
                    {!! $featured->appends(["tab" => "featured", "services" => $services->currentPage(), "virtual" => $virtual->currentPage(), "facetoface" => $faceToFace->currentPage()])->render('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

            <div id='virtual' class="tab-pane fade virtual @if(Request('tab') == 'virtual') active in @endif">
                @include('home.partial.listService', ['_services' => $virtual])
                <div class="col-xs-12 text-center">
                    {!! $virtual->appends(["tab" => "virtual", "featured" => $featured->currentPage(), "services" => $services->currentPage(), "facetoface" => $faceToFace->currentPage()])->render('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

            <div id='faceToFace' class="tab-pane fade faceToFace  @if(Request('tab') == 'facetoface') active in @endif">
                @include('home.partial.listService', ['_services' => $faceToFace])
                <div class="col-xs-12 text-center">
                    {!! $faceToFace->appends(["tab" => "facetoface", "featured" => $featured->currentPage(), "virtual" => $virtual->currentPage(), "services" => $services->currentPage()])->render('vendor.pagination.bootstrap-4') !!}
                </div>
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
                    {!! $campaigns->fragment('campaigns')->appends(["facetoface" => $faceToFace->currentPage(), "featured" => $featured->currentPage(), "virtual" => $virtual->currentPage(), "services" => $services->currentPage()])->render('vendor.pagination.bootstrap-4') !!}
                </ul>
            </div>

        </article>
    </div>
@endsection
