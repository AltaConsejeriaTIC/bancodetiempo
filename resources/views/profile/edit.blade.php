@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body  medium">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('profile/update') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="firstName" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" name="firstName" value="{{$user->first_name}}" required autofocus>

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
                                <input id="lastName" type="text" class="form-control" name="lastName"  value="{{$user->last_name}}"  required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                          <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        
                            <label for="gender" class="col-md-4 control-label">{{ trans('dictionary.gender') }}</label>
                        
	                        <div class="col-md-6">
	                        
	                        	<label class="radio-inline">
							  		<input type="radio" name="gender" id="gender" value="male" required> Hombre
								</label>
								<label class="radio-inline">
								  	<input type="radio" name="gender" id="gender" value="female" required> Mujer
								</label>
								
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
                         		
                         	
                         		<input type="datetime" id="birthdate" name="birthdate" class="form-control datepicker" value="{{$user->birthDate}}" required/>                		
                         	</div>                    
                         </div>                                     
                        <div class="form-group{{ $errors->has('aboutMe') ? ' has-error' : '' }}">
                            <label for="aboutMe" class="col-md-4 control-label">Acerca de mi</label>

                            <div class="col-md-6">
                                <textarea id="aboutMe" class="form-control" name="aboutMe"  required>{{$user->aboutMe}}</textarea>
                                @if ($errors->has('aboutMe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutMe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">{{ trans('dictionary.address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$user->address}}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">{{ trans('dictionary.website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{$user->website}}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Terminar
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
