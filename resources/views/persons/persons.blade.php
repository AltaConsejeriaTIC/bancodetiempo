@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">
        @if(sizeof($persons) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.persons') }}</h1>
                </div>
                <div class="panel-body">
                    @php($i = 0)
                    @php($k = 0)

                    @while($i < 4 && $k < sizeof($persons) )

                        <div class="row">
                            @php($j = 0)

                            @while($j < 3 && $k < sizeof($persons))
                                @php($person = $persons[$k])

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

                                @php($k++)
                                @php($j++)
                            @endwhile

                            @php($i++)
                        </div>
                    @endwhile

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                {!! $persons->appends(['filter' => $filter])->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
