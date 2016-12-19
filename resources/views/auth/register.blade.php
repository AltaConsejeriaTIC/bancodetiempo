@extends('layouts.app')

@section('content')
<div class='fondo'>
	<div></div>
	<img src="{{ asset('images/banner2.jpg') }}" alt="" />
</div>

<style>
input[type="text"]{
	
	color:#fff !important
	
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body medium">
                
                	{!! Form::open(['url' => '/register/createUser', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        {{ csrf_field() }}

						<div id="temasInteres">
						
													
							{{ Form::checkbox('interests[]', 'Arte y dise&ntilde;o', false,['id' => 'Art']) }}
							
							{{ Form::label('Art', 'Arte y dise&ntilde;o', ['class' => 'col-md-4 control-label']) }}
							
							{{ Form::checkbox('interests[]', 'Negocios', false,['id' => 'business']) }}
							
							{{ Form::label('business', 'Negocios', ['class' => 'col-md-4 control-label']) }}
							
							{{ Form::checkbox('interests[]', 'Educacion', false,['id' => 'education']) }}
							
							{{ Form::label('education', 'Educacion', ['class' => 'col-md-4 control-label']) }}
							
							{{ Form::checkbox('interests[]', 'Fitness', false,['id' => 'fitness']) }}
							
							{{ Form::label('fitness', 'Fitness', ['class' => 'col-md-4 control-label']) }}
							
							{{ Form::checkbox('interests[]', 'Hogar', false,['id' => 'home']) }}
							
							{{ Form::label('home', 'Hogar', ['class' => 'col-md-4 control-label']) }}
							
							{{ Form::checkbox('interests[]', 'Tecnologia', false,['id' => 'tecnology']) }}
							
							{{ Form::label('tecnology', 'Tecnologia', ['class' => 'col-md-4 control-label']) }}
						
						</div>

						<div class="avatar">
						
							<img src="{{ $providerData['avatar'] }}{{ old('avatar') }}" alt="avatar" />
						
							<input type="hidden" value="{{ $providerData['avatar'] }}{{ old('avatar') }}" name="avatar">
						
						</div>

                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="firstName" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}{{  $providerData['first_name']  }}" required autofocus>

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="lastName" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}{{  $providerData['last_name']  }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        
                        	<label for="gender" class="col-md-4 control-label">Genero</label>
                        
	                        <div class="col-md-6">
	                        
	                        	{{ Form::radio('gender', 'male', '' ,['id' => 'man']) }}
							
								{{ Form::label('man', 'Hombre', ['class' => 'col-md-4 control-label']) }}
								
								
								{{ Form::radio('gender', 'female', '' ,['id' => 'woman']) }}
							
								{{ Form::label('woman', 'Mujer', ['class' => 'col-md-4 control-label']) }}
								
								@if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
								
							</div>
                        
                        </div>
                        
                         <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                         
                         	<label for="birthdate" class="col-md-4 control-label">Fecha de nacimiento</label>
                         
                         	<div class="col-md-6">               
                         		
                         	
                         		<input type="datetime" id="birthdate" name="birthdate" class="form-control datepicker" value="{{ old('birthdate')}}{{  $providerData['birthday']  }}" required/>
                         		
                         	</div>
                         
                         </div>
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}{{  $providerData['email']  }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('aboutMe') ? ' has-error' : '' }}">
                            <label for="aboutMe" class="col-md-4 control-label">Acerca de mi</label>

                            <div class="col-md-6">
                                <textarea id="aboutMe" class="form-control" name="aboutMe"  required>{{ old('aboutMe') }}</textarea>

                                @if ($errors->has('aboutMe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutMe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Direccion</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">Sitio Web</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	<input type="hidden" name="provider_id" value="{{ old('provider_id') }}{{ $providerData['id'] }}" />
                            	<input type="hidden" name="provider" value="{{ old('provider') }}" />
                                <button type="submit" class="btn btn-primary">
                                    Registro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('jqueryUi/jquery-ui.css') }}" rel="stylesheet">
<script src="{{ asset('jqueryUi/jquery.js') }}"></script>
<script src="{{ asset('jqueryUi/jquery-ui.js') }}"></script>
<script>

jQuery( ".datepicker" ).datepicker({
	inline: true,
	changeMonth: true,
    changeYear: true,
    yearRange: "1930:{{ date('Y') }}"
});


// Hover states on the static widgets
jQuery( "#dialog-link, #icons li" ).hover(
	function() {
		jQuery( this ).addClass( "ui-state-hover" );
	},
	function() {
		jQuery( this ).removeClass( "ui-state-hover" );
	}
);
</script>


@endsection
