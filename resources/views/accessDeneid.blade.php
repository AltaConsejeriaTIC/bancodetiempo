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
                    <h1 class="title1 text-center">¡Primero debes iniciar sesión!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="/loginRedes/facebook" id="register-facebook"
                       class="col-xs-12 col-md-12 button6 social-button facebook-login">{!! trans('login.facebook-option') !!}
                        <i class="fa fa-facebook"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="/loginRedes/google" id="register-google"
                       class="col-xs-12 col-md-12 button6 social-button google-login">{!! trans('login.google-option') !!}<i class="fa fa-google"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="/loginRedes/linkedin" id="register-linkedin"
                       class="col-xs-12 col-md-12 button6 social-button linkedin-login">{!! trans('login.linkedin-option') !!}<i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection
