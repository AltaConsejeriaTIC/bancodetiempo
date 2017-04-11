@extends('layouts.app')

@section('content')
    @if(session('response'))
      <generalmodal  name='winCoin' :state='myData.winCoin' state-init='true'>
        <div slot="modal" class='box row'>      
          <h1 class='title1 col-md-12 text-center'>¡Acabas de ganar 4 dorados!</h1>     
          <p class="paragraph1 col-md-12 text-center">A partir de este momento puedes tomar una oferta.</p>
        </div>
      </generalmodal>
      <modaltimeoff name="winCoin">
      </modaltimeoff>
    @endif
    @include('nav',array('type' => 2))
    
    <section class="row">
        <div class="container">
        	<div class='row'>
	            <article class='col-md-4 col-xs-12 col-sm-6'>   	
	                <div class="row">                
	                    <div class="col-xs-6 col-xs-offset-3">
	                        <avatar :cover='myData.cover'>
			                    <template scope="props">
			                    	@include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#fff', 'borderSize' => '3px', 'extra' => array('image' => ':xlink:href=props.cover')))
		                        </template>	                        	
		                     </avatar>
	                    </div>                            
	                </div>
	                <div v-show='noEdit'>
		                <div class="row">
		                    <div class="col-xs-12">
		                        <h2 class="title1">{{$user->first_name." ".$user->last_name}}</h2>
		                    </div>               
		                </div>
		                <div class="row">
		                    <div class="col-xs-12">
		                        <p class='paragraph4'>{{$user->aboutMe}}</p>
		                    </div>
		                </div>                
		                <div class="row">
		                    <button class="col-xs-12 button1 background-active-color text-center"  @click='showEdit'>Editar Perfil</button>               
		                </div>
		                <div class="space10"></div>
                    <div class="row border ">
                      <div class="col-sm-12">                        
                        <div class="space20"></div>
                        <p class="col-xs-2">
                          <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image> 
                        </p>                          
                        <p class="col-xs-10">
                          <span class="text-bold">
                            {{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? "Dorado" : "Dorados" }}
                          </span>
                            <span class="space4"></span>
                            <span class="paragraph6">
                            Cada dorado equivale a una hora de tu tiempo, y del tiempo de cualquier persona.
                          </span>
                          <br>

                        </p>
                        <div class="space20"></div>        
                      </div>
                    </div>
                    <div class="space10"></div>
		                <div class="row">
		                    {!! Form::open(['url' => 'deactivateAccount', 'method' => 'post', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
		                        <input type="hidden" name="token" value="{{ csrf_token() }}">                    
		                        <deactivate></deactivate>
		                    {!! Form::close() !!}
		                    <button class="col-xs-12 button10 background-white" data-toggle="modal" data-target="#deactivate">Desactivar Cuenta</button>                    
		                </div>
		                <div class="space10"></div>
		                <div class="row">
		                    <button class="col-xs-12 button1 background-active-color" @click='myData.newgroup = true'>{{ trans("profile.buttonNewGroup") }}</button>
		                </div>
	                </div>
	               
               	<div v-show='edit' >
               	
               		<div class="row">
               			<div class="col-md-8 col-md-offset-2 text-center">
               				<label for='avatar' class="button1 background-active-color text-center"  @click='showEdit'>Actualizar foto</label>
                      <p class="avatarMsg hidden">El peso màximo de la imagen debe ser de 3 Megas.</p>
               			</div>
               		</div>
               		
                    {!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form', 'form-validation' => '']) !!}
                        <input type="file" name='avatar' id='avatar' class='hidden' @change='this.previewPhoto'/>
                        <register  profile='1'>
                        </register>
                        <div class="col-xs-12">
                            <button class="col-xs-12 button10 background-white text-center" type='button' @click='hiddenEdit'>Cancelar</button>
                        </div>

                    {!! Form::close() !!}

               	</div>
            </article>
            <article class="col-md-4 col-xs-12 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title1">Mis Ofertas</h2>
                        <button class="col-xs-12 buttonService background-white" data-toggle="modal" data-target="#NewService">
                          <i class="fa fa-plus-square icons" aria-hidden="true"></i>
                          <p>Publicar nueva oferta</p>
                        </button>                        
                        {!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation' => '']) !!}
                          <newservice></newservice>
                        {!! Form::close() !!}
                    </div>               
                </div>
            </article>
            <article class="col-md-8 panel-services">
                <div class="row">
                    @foreach($services as $key => $service)                  
                      <div class='col-md-6 col-xs-12 col-sm-6'>                            
                          @include('partial/serviceBox', array("service" => $service, "edit" => "1"))                                            
                      </div>                      
                    @endforeach                    
                </div>
            </article>	          
    	</div>
    </section>  
@include("profile/partial/formNewGroup")
@endsection
