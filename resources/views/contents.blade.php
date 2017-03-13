@extends('layouts.app')

    @section('content')

        @if(!is_null(Auth::User()))
            @include('nav',array('type' => 2))
        @else
            @include('nav',array('type' => 3))
        @endif

        {!! $content->description !!}

    @endsection


