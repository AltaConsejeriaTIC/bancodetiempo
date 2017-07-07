@extends('layouts.app')
@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container">

        <article class="row" id='campaigns'>

            @foreach($campaigns as $key => $campaign)
                <div class='col-md-6 col-xs-12 col-sm-6'>
                    @include('partial/campaignBox')
                </div>
            @endforeach

            <div class="clearfix"></div>
            <div class="col xs 12 text-center">
                {{$campaigns->links()}}
            </div>

        </article>

    </div>
@endsection
