@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">
@section('content')
@include('nav',array('type' => 2))
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body medium">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
