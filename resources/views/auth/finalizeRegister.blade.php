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


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title1">Finalizar registro</h1>
            </div>
        </div>
        {!! Form::open(['url' => '/profile/updateEmail', 'method' => 'put', 'form-validation', 'class' => 'form-custom']) !!}
        <div class="row">
            <div class="col-xs-12">
                <p><strong>Email:</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="text" name='email' placeholder="Email" data-validations='["required", "email"]' class="col-xs-12 validation">
                <div class="msg" errors='email'>
                    <p error='required'>Este campo es obligatorio.</p>
                    <p error='email'>Debe escribir un correo valido.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <button type="submit" class="button1 background-active-green-color col-xs-8 col-xs-offset-2">Enviar</button>
            </div>
            <div class="col-xs-6">
                <a href="{{ url('/validateLogout') }}" class="button1 text-center background-active-color col-xs-8 col-xs-offset-2">Salir</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
