@extends('layouts.appColegios')
@section('content')

@include('colegios.navAdmin')

<div class="panel">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">   
                <h4>Campañas</h4>
            </div>            
            @if(session()->has('msg'))
                <div class="col-12 alert-success py-2" hide-in='5000'>
                    {{session("msg")}}
                </div>
            @endif
            
            <div class="col-12">
   
                <div class="row">
                   @foreach($campaigns as $campaign)
                        <div class='col-6'>
                            @include('colegios/campaignBox')
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        {{$campaigns->render("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("footer")

@endsection