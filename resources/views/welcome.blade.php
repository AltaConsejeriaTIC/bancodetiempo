@extends('layouts.app')


@section('content')

 <header>
        <div class="header-content">
                <div class="headerSection1 row">
                  <a class="col-md-9" id="logo-container" href="#" class="brand-logo"><i class="material-icons">fiber_manual_record</i>{{ config('app.name', 'Tiempo X Tiempo') }}</a>
                  <a class="loginBt col-md-3" href="{{ url('login') }}">{{ trans('dictionary.login') }}</a>
                </div>
                <div class="bodySection1 row">
                 <div class="botonesRegistro col-md-6">
                    <p>{{ trans('dictionary.registrationMessage') }}</p>
                    <a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a>
                    <a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a>
                    <a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>
                  </div>
                  <div class="botonesRegistro col-md-6">
                    <p>{{ trans('dictionary.registrationMessage') }}</p>
                    <a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a>
                    <a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a>
                    <a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>
                  </div>
                </div>
                <div class="footerSection1 ">
                  <p>descubre - aprende - enseña - comparte</p>
                </div>
            </div>

    </div>
</header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
                </div>
            </div>
        </div>
    </section>


@endsection
