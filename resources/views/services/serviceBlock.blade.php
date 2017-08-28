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
                    <h1 class="title1 text-center">¡Oferta no disponible!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <p class="paragraph4 text-center"><strong>Lamentamos informarte que la oferta a la que estás intentado acceder no está disponible</strong></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <a href="/" class="button1 background-active-color col-xs-12 text-center">Volver al inicio</a>
                </div>
            </div>
            <br><br>
        </div>
    </div>

@endsection
