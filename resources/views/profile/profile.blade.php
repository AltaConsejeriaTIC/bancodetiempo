@extends('layouts.app')

@section('content')
    
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
	                <div v-if='noEdit'>
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
		                <div class="row">
		                    {!! Form::open(['url' => 'deactivateAccount', 'method' => 'post', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
		                        <input type="hidden" name="token" value="{{ csrf_token() }}">                    
		                        <deactivate></deactivate>
		                    {!! Form::close() !!}
		                    <button class="col-xs-12 button10 background-white" data-toggle="modal" data-target="#deactivate">Desactivar Cuenta</button>                    
		                </div>
	                </div>
	               
               	<div v-if='edit' >
               	
               		<div class="row">
               			<div class="col-md-8 col-md-offset-2 text-center">
               				<label for='avatar' class="button1 background-active-color text-center"  @click='showEdit'>Actualizar foto</label>
               			</div>
               		</div>
               		
               		{!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form']) !!}
						        <input type="file" name='avatar' id='avatar' class='hidden' @change='this.previewPhoto'/>
			        	    <register  profile='1'>				        					    
			        	    </register>		             
                  {!! Form::close() !!}
			        <button class="col-xs-12 button10 background-white text-center"  @click='hiddenEdit'>Cancelar</button>  
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
                        {!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
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

@endsection
