@extends('layouts.app')

@section('content')

@if(!is_null(Auth::User()))
    @include('nav',array('type' => 2))
@else
    @include('nav',array('type' => 3))
@endif
<div class="row">
   <img src="/images/how.png" alt="" class="col-xs-12 col-md-10 col-md-offset-1">
</div>


@endsection
