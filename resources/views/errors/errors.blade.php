@extends('layouts.app')

@section('content')

<nav class='navbar navbar-default navbar-static-top nav2'>
    <div class="container">
        <div class='row flex-center'>

            <div class="col-xs-7  col-sm-3  col-md-3">
                <a href="/index">
                    <img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo"/>
                </a>
            </div>

        </div>
    </div>
</nav>

    <div class="container ">

        <div class="row">
            <div class="col-xs-12">
                <h1 class="title1 text-center">:(</h1>
                <h2 class="title2 text-center">Error</h2>
            </div>
        </div>
        @if($_ENV['APP_DEBUG'] == 'true')
        <div class="row">
            <div class="col-xs-12">
                <a onClick='jQuery("#errors").slideToggle()' class="paragraph2">Mostrar errores</a>
            </div>
        </div>


        <pre style='display:none;' id='errors'>
            <h3>{{$exception->getMessage()}}</h3>
            <p>{{$exception->getFile()}} Linea {{$exception->getLine()}}</p>
            <hr>{{$exception->getTraceAsString()}}
        </pre>
        @endif

    </div>

@endsection

