@extends('layouts.app')

@section('content')

    @include('nav', array('type' => 2))

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
                    <h1 class="title1 text-center">¡Falta poco para Cambalachear!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <p class="paragraph4 text-center"><strong>Confirma el correo donde recibirás notificaciones para que no le pierdas la pista a tus Cambalaches.</strong></p>
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
                        <input type="radio" name="group" id="group1" value="0" class="btnRadio" checked>
                        <label for="group1" class="col-xs-6">Persona</label>
                    
                        <input type="radio" name="group" id="group2" value="1" class="btnRadio">
                        <label for="group2" class=" col-xs-6">Grupo</label>
                </div>
            </div>
            <br>
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
