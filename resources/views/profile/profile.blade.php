@extends('layouts.app')

@section('content')
    
    @include('nav',array('type' => 2))
    
    <section class="row">
        <div class="container">
            <article class='col-md-4'>   	
                <div class="row">                
                    <div class="col-xs-6 col-xs-offset-3">
                        Foto Perfil
                    </div>                            
                </div>
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
                    <button class="col-xs-12 button1 background-active-color text-center">Editar Perfil</button>               
                </div>
                <div class="space10"></div>
                <div class="row">
                    {!! Form::open(['url' => 'deactivateAccount', 'method' => 'post', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
                        <input type="hidden" name="token" value="{{ csrf_token() }}">                    
                        <deactivate v-if="this.showModal" @@close="showModal = false"></deactivate>
                    {!! Form::close() !!}
                    <button id="show-modal" @click="showModal = true" class="col-xs-12 button10 background-white">Desactivar Cuenta</button>                    
                </div>
            </article>
            <article class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title1">Mis Ofertas</h2>
                        <newservice v-if="this.showModal1" @@close="showModal1 = false">
                            <template>
                                @include('services.partial.newServiceForm')
                            </template>
                        </newservice>
                        <button id="show-modal" @click="showModal1 = true" class="col-xs-12 button10 background-white">Publicar nueva oferta</button>
                    </div>               
                </div>
            </article>
            <article class="col-md-8">
                <div class="row">
                    @foreach($services as $key => $service)                  
                      <div class='col-md-6 col-xs-12 col-sm-6'>                            
                          @include('partial/serviceBox', array("service" => $service))                                            
                      </div>                      
                    @endforeach                    
                </div>
            </article>
    	</div>
    </section>  

@endsection
