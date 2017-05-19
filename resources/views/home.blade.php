@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">
        <div class="row">
            <ul class="nav nav-pills col-md-8 col-xs-12">
            <!--li class="active">
                    <a href="#filterAll" data-toggle="tab" class='parrafo3'
                       v-on:click='filterCategory(0)'>{{ trans('home.all') }}</a>
                </li>
                <li class="hidden">
                    <a href="#filterRecommended" data-toggle="tab" class='parrafo3'>{{ trans('home.Recommended') }}</a>
                </li>
                <li>
                    <a href="#filterCampaign" data-toggle="tab" class='parrafo3'>{{ trans('home.campaigns') }}</a>
                </li>
                <li>
                    <a href="#filterAdmin" data-toggle="tab" class='parrafo3'>{{ trans('home.serviceAdmin') }}</a>
                </li-->
            </ul>
            <div class='col-md-1 col-xs-5 not-padding'>
                <p class="paragraph10">{{ trans('home.filter') }}</p>
            </div>
            <div class="col-md-3 col-xs-7">
                <filters-categories categories='{{ $categories }}'></filters-categories>
            </div>
        </div>
        <br>

        @if(count(Illuminate\Support\Facades\Session::get("filters.tags", [])) > 0)
            <div class="row">
                <div class="col-xs-12">
                    <strong class="paragraph1">Filtros: </strong>
                    @foreach(Illuminate\Support\Facades\Session::get("filters.tags", []) as $tag)
                        <a tag="{{$tag->id}}"
                           class="input-tag button7 tag-margin"><span>{{ App\Models\Tag::find($tag->id)->tag }}</span></a>
                    @endforeach
                    <a href='/filter'>Borrar filtros</a>
                </div>

            </div>
        @endif
        <div class='row'>
            @if(sizeof($recommendedServices) > 0 && sizeof($allServices) == 0)
                <div class='row'>
                    <h1 class="parrafo3">{{ trans('home.Recommended') }}</h1>
                    @foreach($recommendedServices as $key => $service)

                        <div class='col-md-4 col-xs-12 col-sm-6'>
                            @include('partial/serviceBox', array("service" => $service))
                        </div>

                    @endforeach
                    {{--<div class="text-center">
                        {!! $recommendedServices->links('vendor.pagination.bootstrap-4') !!}
                    </div>--}}
                </div>
            @endif
            @if(sizeof($allServices) > 0)
                <div class='row'>
                    <h1 class="parrafo3">{{ trans('home.services') }}</h1>
                    @foreach($allServices as $key => $service)

                        <div class='col-md-4 col-xs-12 col-sm-6'>
                            @include('partial/serviceBox', array("service" => $service))
                        </div>

                    @endforeach
                    <div class="text-center">
                        {!! $allServices->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            @endif
            @if(sizeof($groups) > 0)
                <div class='row'>
                    <h1 class="parrafo3">{{ trans('home.groups') }}</h1>
                    @foreach($groups as $key => $group)

                        <div class='col-md-4 col-xs-12 col-sm-6'>
                            @include('partial/groupBox')
                        </div>

                    @endforeach
                    <div class="text-center">
                        {!! $groups->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            @endif
            @if(sizeof($persons) > 0)
                <div class='row' style="margin: 50px 5px">
                    <div class="row">
                        <h1 class="parrafo3 titleContent">{{ trans('home.persons') }}</h1>
                    </div>

                    @php($i = 0)
                    @while($i < sizeof($persons) )

                        <div class="row">
                            @php($j = 0)
                            @while($j < 3 && $i < sizeof($persons))
                                @php($person = $persons[$i])
                                <a href="/user/{{$person->id}}">
                                    <div class='col-md-4 col-xs-12 col-sm-6'>
                                        <div style="width: 80px">

                                            @include('partial/imageProfile', array('cover' => $person->avatar, 'id' =>$person->id, 'border' => '#0f6784', 'borderSize' => '3px'))

                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h2 class="title2">{{$person->first_name." ".$person->last_name}}</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p class='paragraph4'>{{$person->aboutMe}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @php($i++)
                                @php($j++)
                            @endwhile
                        </div>
                    @endwhile

                    @if(sizeof($persons) > 6)
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center">
                                    <a href="/person/?filter={{$filter}}">
                                        <button type="button" class="button1 background-active-color ">Ver mas</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
            @if(sizeof($campaigns) > 0)
                <div class='row'>
                    <h1 class="parrafo3">{{ trans('home.campaigns') }}</h1>
                    @foreach($campaigns as $key => $campaign)

                        <div class='col-md-4 col-xs-12 col-sm-6'>
                            @include('partial/campaignBox', array("service" => $campaign))
                        </div>

                    @endforeach
                    <div class="text-center">
                        {!! $campaigns->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            @endif
        </div>
    </div>



@endsection
