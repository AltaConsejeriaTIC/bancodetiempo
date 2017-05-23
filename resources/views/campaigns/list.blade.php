@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">
        @if(sizeof($campaigns) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.campaigns') }}</h1>
                </div>
                <div class="panel-body">
                    @php($i = 0)
                    @php($k = 0)

                    @while($i < 4 && $k < sizeof($campaigns))
                        <div class="row">
                            @php($j = 0)

                            @while($j < 3 && $k < sizeof($campaigns))
                                @php($campaign = $campaigns[$k])
                                <a href="/campaign/{{$campaign->id}}">
                                    <div class='col-md-4 col-xs-12 col-sm-6'>
                                        @include('partial/campaignBox', array("campaign" => $campaign))
                                    </div>
                                </a>
                                @php($k++)
                                @php($j++)
                            @endwhile
                        </div>
                        @php($i++)
                    @endwhile
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                {!! $campaigns->appends(['filter' => $filter])->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection