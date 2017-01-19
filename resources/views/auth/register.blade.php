@extends('layouts.app') 

@section('content')

	@include('nav', array('type' => 1))

	<section class='bannerRegister row'>
	    <div class="container">
	        <div class='row'>
	            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	                <h2 class='title1 text-white col-xs-10 col-sm-12 col-md-12'>¡Gracias por vincular tu cuenta!</h2>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	                <p class="paragraph1 text-white col-xs-12 col-sm-12 col-md-12">Completa todos los datos de tu perfil para continuar con el registro. <br>Puedes cambiar esta información ahora o más adelante</p>
	            </div>
	        </div>
	    </div>
	</section>

	<section class='row' id='profile'>
	    <div class="container">
	        <article class='col-xs-12 col-sm-4 col-md-4'>
	            <div class='row'>
	                <div class='col-xs-6 col-xs-offset-3 col-sm-8 col-sm-offset-2'>
	                    <div class="col-xs-12" id='profilePhoto'>
	                        @include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'extra' => array('image' => ':xlink:href=av')))                 
	                        <script>
	                            var avatar =  '{{Auth::user()->avatar}}'
	                        </script>
	                    </div>                
	                </div>    

	            </div>

	            <div class="row">
	                <div class='col-xs-6 col-xs-offset-3  col-sm-8 col-sm-offset-2'>                  
	                    <label for='avatar' class='button1 col-xs-12 text-center'>Cambiar Foto</label>
	                </div>
	            </div>

	            <div class="row">
	                <div class='col-xs-8 col-xs-offset-2  col-sm-10 col-sm-offset-1'>
	                    <h2 class='title1 text-center col-xs-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
	                </div>
	            </div>
	        </article>

	        <register></register>
	    </div>
	</section>

@endsection

