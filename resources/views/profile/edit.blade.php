@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">

@section('content')
@include('nav',array('type' => 2))
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Perfil</div>
                <div class="panel-body  medium">

                        <svg class="imageProfileMedium center-block" viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                          <defs>
                            <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                              <image  xlink:href="{{ Auth::user()->avatar }}" x="-25" width="150" height="100" />
                            </pattern>
                          </defs>
                          <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                        </svg>
                        <div>


	                      {!! Form::open(['url' => 'profile/updatePhoto', 'method' => 'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) !!}


                              {{ Form::file('image', '') }}


                        {!! Form::close()!!}

                        </div>
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
