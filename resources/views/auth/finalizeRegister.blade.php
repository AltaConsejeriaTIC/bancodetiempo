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

            <div class='hidden-xs col-xs-offset-6 col-xs-1 col-sm-1 text-right icon-profile padding-top'>
                @include('partial/imageProfile', array('cover' => 'getImg?img='.Auth::user()->avatar.'&w=200', 'id' => 'myAvatar', 'border' => '#fff', 'borderSize' => '1px'))
            </div>

             <div class=' hidden-xs col-xs-2 col-sm-2 padding-top text-left dropdown'>

                <div class='col-xs-12 not-padding menu dropdown-toggle flex-center ' data-toggle="dropdown">

                    <span class='not-padding not-margin paragraph4  text-white'>{{Auth::user()->first_name}}</span>
                    <i class='iconmenu menu fa fa-angle-down'></i>

                </div>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('profile') }}">{{ trans('nav.profile') }}</a>
                    </li>
                    <li>
                        <a href="{{ url('/validateLogout') }}" class="link1">{{ trans('nav.logout') }}</a>
                    </li>
                </ul>

            </div>

            <ul class="menuMobile visible-xs col-xs-2 col-xs-offset-3 not-padding">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-bars"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('profile') }}"><i
                                        class="material-icons item-icon">account_circle</i> {{ trans('nav.profile') }}</a>
                        </li>
                        <li>
                            <a href="/how">
                                <i class="material-icons item-icon">info</i> {{ trans('nav.howitworks') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/validateLogout') }}"><i
                                        class="material-icons item-icon">exit_to_app</i> {{ trans('nav.logout') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</nav>

    <div class="container">
       <div class="space"></div>
       <div class="space"></div>
        <div id='finalizeRegisterPanel' class="col-xs-12 col-sm-8 col-sm-offset-2">
           <div class="space"></div>
           <div class="row">
               <div class="col-xs-12">
                       <img src="/images/icon.png" alt="icon" class='col-xs-2 col-xs-offset-5'>
               </div>
           </div>

            <div class="row">
                <div class="col-xs-12">
                    <h1 class="title1 text-center">¡Gracias por vincular tu cuenta!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph4 text-center">Continúa con el registro confirmando la siguiente información:</p>
                </div>
            </div>
            {!! Form::open(['url' => '/profile/completeRegister', 'method' => 'put', 'form-validation', 'class' => 'form-custom']) !!}
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <label class="paragraph4">Correo electrónico:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <input type="text" name='email' placeholder="Email" data-validations='["required", "email"]' class="col-xs-12 validation" value="{{Auth::user()->email2}}">
                    <div class="msg" errors='email'>
                        <p error='required'>Este campo es obligatorio.</p>
                        <p error='email'>Debe escribir un correo valido.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <input id="registerPopup-age" name='age' type="checkbox" class="square validation"  data-validations='["requiredCheck"]'>
                    <label for="registerPopup-age" class="paragraph4"> Confirmo que <strong>soy mayor de edad</strong></label>
                    <div class="msg" errors='age'>
                        <p error='requiredCheck'>Este campo es obligatorio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <input type="checkbox" id="registerPopup-terms" name='terms' class="square validation"  data-validations='["requiredCheck"]'>
                    <label for="registerPopup-terms" class="paragraph4"><strong>Acepto los <a href="/content/terms" class="link3" target="_blank">términos y condiciones</a></strong> de la plataforma.</label>
                    <div class="msg" errors='terms'>
                        <p error='requiredCheck'>Este campo es obligatorio.</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <button type="submit" class="button1 background-active-color col-xs-8 col-xs-offset-2">Continuar</button>
                </div>
            </div>
            <br>
            <br>
            <br>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
