@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">
        <div class="row">
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
            @if(sizeof($recommendedServices) > 0 && sizeof($services) == 0)
                <div class='panel panel-default'>
                    <div class="panel-heading">
                        <h1 class="panel-title title1">{{ trans('home.Recommended') }}</h1>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($recommendedServices as $key => $service)
                                <div class='col-md-4 col-xs-12 col-sm-6'>
                                    @include('partial/serviceBox', array("service" => $service))
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                {!! $recommendedServices->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if(sizeof($services) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.services') }}</h1>
                </div>

                <div class="panel-body">
                    <div class="row">
                        @foreach($services as $key => $service)
                            <div class='col-md-4 col-xs-12 col-sm-6'>
                                @include('partial/serviceBox', array("service" => $service))
                            </div>
                            @if($key == 5)
                                @break
                            @endif
                        @endforeach
                    </div>

                    @if(sizeof($services) > 6)
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center">
                                    <a href="/services/?filter={{$filter}}">
                                        <button type="button" class="button1 background-active-color ">
                                            Ver mas
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        @if(sizeof($groups) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.groups') }}</h1>
                </div>

                <div class="panel-body">
                    <div class="row">
                        @php($i = 0)

                        @while($i < 6 && $i < sizeof($groups) )
                            @php($group = $groups[$i])

                            <div class='col-md-4 col-xs-12 col-sm-6'>
                                @include('partial/groupBox')
                            </div>

                            @php($i++)
                        @endwhile
                    </div>

                    @if(sizeof($groups) > 6)
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center">
                                    <a href="/groups/?filter={{$filter}}">
                                        <button type="button" class="button1 background-active-color ">
                                            Ver mas
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        @if(sizeof($persons) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.persons') }}</h1>
                </div>

                <div class="panel-body">
                    <div class="row">
                        @php($i = 0)

                        @while($i < 6 && $i < sizeof($persons) )
                            @php($person = $persons[$i])

                            <a @if(is_null(Auth::User())) @click='myData.login = true'
                               @else  href="/user/{{$person->id}}" @endif>
                                <div class='col-md-4 col-xs-12 col-sm-6' style="min-height: 200px">
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
                        @endwhile
                    </div>

                    @if(sizeof($persons) > 6)
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center">
                                    <a href="/person/?filter={{$filter}}">
                                        <button type="button" class="button1 background-active-color ">
                                            Ver mas
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        @if(sizeof($campaigns) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.campaigns') }}</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @php($i = 0)

                        @while($i < 6 && $i < sizeof($campaigns))
                            @php($campaign = $campaigns[$i])
                            <div class='col-md-4 col-xs-12 col-sm-6'>
                                @include('partial/campaignBox', array("campaign" => $campaign))
                            </div>

                            @php($i++)
                        @endwhile
                    </div>

                    @if(sizeof($campaigns) > 6)
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center">
                                    <a href="/campaign/?filter={{$filter}}">
                                        <button type="button" class="button1 background-active-color ">
                                            Ver mas
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
