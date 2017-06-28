@extends('layouts.app')

@section('content')

@include('nav', array('type' => 1))

@include('home.partial.bannerHome')

<section>
    <div class="container">

        <h2 class='title1 text-center'>{{ trans('home.title') }}</h2>

        <article class='space40'>

            @foreach($lastServices as $key => $service)

                <div class='col-md-4 col-xs-12 col-sm-6'>
                    @include('partial/serviceBox', array("service" => $service))
                </div>

            @endforeach

            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 not-padding ">
                <a href="home"  class='button1 background-active-color col-xs-12 col-md-4 col-md-offset-1 text-center'>{{ trans('home.button1') }}</a>
            </div>

        </article>

    </div>

</section>
	
<section class='boxRegister'>

    <div class="container">

            <div class='row'>
                <h2 class='title1 text-white text-center col-xs-12 col-md-12'>{{ trans('home.titleLower') }}</h2>
            </div>

            <div class='row'>
                <p class='paragraph2 text-white col-xs-12 col-sm-12 col-md-12 text-center'>Regístrate y comienza a ser parte de nuestra gran comunidad</p>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0" >
                    <a href="{{ url('loginRedes/facebook') }}" class="col-xs-12 col-sm-12 col-md-12 button6 social-button social-button-facebook facebook">
                        {{ trans('home.registerFacebook') }}<i class="fa fa-facebook"></i>
                    </a>
                </div>

                <div class="col-xs-12 col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0" >
                    <a href="{{ url('loginRedes/google') }}" class="col-xs-12 col-sm-12 col-md-12 button6 social-button social-button-google google">
                        {{ trans('home.registerGoogle') }}<i class="fa fa-google"></i>
                    </a>
                </div>

                <div class="col-xs-12 col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3" >
                    <a href="{{ url('loginRedes/linkedin') }}"  class="col-xs-12 col-sm-12 col-md-12 button6 social-button social-button-linkedin linkedin">
                        {{ trans('home.registerLinkedin') }}<i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
    </div>

</section>



@endsection
