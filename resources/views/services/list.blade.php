@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">
        @if(sizeof($services) > 0)
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h1 class="panel-title title1">{{ trans('home.campaigns') }}</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($services as $key => $service)
                            <div class='col-md-4 col-xs-12 col-sm-6'>
                                @include('partial/serviceBox', array("service" => $service))
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                {!! $services->appends(['filter' => $filter])->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
