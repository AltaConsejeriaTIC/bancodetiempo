@extends('layouts.app')

@section('content')
    
    @include('nav',array('type' => 2))
    
    <section class="row">
    	<div class="container">
    		<article class='col-xs-12' id='profile'>
    			
    			<div class="row">
    			
    				<div class="col-xs-6 col-xs-offset-3" id='profilePhoto'>
                        @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#fff', 'borderSize' => '3px', 'extra' => array('image' => ':xlink:href=av')))
                        <script>
    							var avatar =  '{{Auth::user()->avatar}}'
    					</script>
                     </div>
    						
    			</div>
    			<div class='side' :class='type'>
    				<div class="row">
    				
    					<div class='ranking text-center col-xs-8 col-xs-offset-2 '>
    	                    <div>
    	                      @for($cont = 1 ; $cont <= 5 ; $cont++)
    	                        @if($cont <= $user->ranking)
    	                          <span class='material-icons paragraph1'>grade</span>
    	                        @else
    	                          <span class='material-icons paragraph6'>fiber_manual_record</span>
    	                        @endif
    	                      @endfor
    	                    </div>
    	                </div>
    				
    				</div>
    				
    				<div class="row">
    					<div class="col-xs-12">
    						<h2 class="title1">{{$user->first_name." ".$user->last_name}}</h2>
    					</div>				 
    				</div>
    				
    				<div class="row">
    					<div class="col-xs-12">
    						<p class='paragraph1'>{{$user->aboutMe}}</p>
    					</div>
    				</div>
    				
    				<div class="row">
    					<div class="button1 background-active-color text-center col-xs-12" @click='edit'>Editar Perfil</div>				
    				</div>
    				<div style='height:10px;'></div>
    				<div class="row">
    					@include('profile/deactivateAccount')
    				</div>
    			</div>
    			<div class="side" :class='type2'>
    				<div class="row">
    				
    					<div class="col-xs-8 col-xs-offset-2 text-center">
    					
    						<label for="avatar" class='button1 background-active-color'>Cambiar Foto</label>
    						
    					</div>
    				
    				</div>
    				@include('partial/registerForm', array('edit' => true))
    				
    				<div class="row">
    					<div class="button10 background-white text-center" @click='cancel'>Cancelar cambios</div>
    				</div>
    				
    			</div>
    			
    		</article>
    		
    		<article class='col-xs-12'>
    			
    		</article>
    		
    	</div>
    </section>  
     
    <script src="{{ asset('js/components/helpers.js') }}"></script>
    <script src="{{ asset('js/components/new.js') }}"></script> 
    <script src="{{ asset('js/components/profile.js') }}"></script>

@endsection
