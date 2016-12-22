@extends('layouts.app')
<!-- Custom styles -->
<link href="{{ asset('/css/styleForms.css') }}" rel="stylesheet">


@section('content')
<div class='fondo'>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body medium">

                	{!! Form::open(['url' => '/register/createUser', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) !!}


						

						<div class="avatar">

							<img src="{{ $providerData['avatar'] }}{{ old('avatar') }}" alt="avatar" class='avatar'/>

							{{ Form::hidden('avatar', $providerData['avatar'] ) }}

						</div>

                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">

                            {{ Form::label('firstName', trans('dictionary.firstName'), ['class' => 'col-md-4 control-label'] ) }}

                            <div class="col-md-6">

                            	{{ Form::text('firstName', $providerData['first_name'], ['class' => 'form-control', 'required', 'autofocus' ]) }}

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            {{ Form::label('firstName', trans('dictionary.lastName'), ['class' => 'col-md-4 control-label'] ) }}

                            <div class="col-md-6">
                                {{ Form::text('lastName', $providerData['last_name'], ['class' => 'form-control', 'required', 'autofocus' ]) }}

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                        	{{ Form::label('gender', trans('dictionary.gender'), ['class' => 'col-md-4 control-label'] ) }}

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

                         	{{ Form::label('birthdate', trans('dictionary.birthDate'), ['class' => 'col-md-4 control-label'] ) }}

                         	<div class="col-md-6">

                         		{{ Form::text('birthdate', $providerData['birthdate'], ['class' => 'form-control datepicker', 'id' => 'birthdate', 'required' ]) }}

                         	</div>

                         </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', trans('dictionary.email'), ['class' => 'col-md-4 control-label'] ) }}

                            <div class="col-md-6">

								{{ Form::text('email', $providerData['email'], ['class' => 'form-control', 'id' => 'email', 'required' ]) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aboutMe') ? ' has-error' : '' }}">
                           {{ Form::label('aboutMe', trans('dictionary.aboutMe'), ['class' => 'col-md-4 control-label'] ) }}

                            <div class="col-md-6">
                            	{{ Form::textarea('aboutMe', '', ['class' => 'form-control', 'id' => 'aboutMe', 'required' ]) }}

                                @if ($errors->has('aboutMe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutMe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {{ Form::label('address', trans('dictionary.address'), ['class' => 'col-md-4 control-label'] ) }}

                            <div class="col-md-6">
                            	{{ Form::text('address', '', ['class' => 'form-control', 'id' => 'address', 'required' ]) }}

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            {{ Form::label('siteweb', trans('dictionary.website'), ['class' => 'col-md-4 control-label'] ) }}

                            <div class="col-md-6">
                                {{ Form::text('website', '', ['class' => 'form-control', 'id' => 'siteweb' ]) }}

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	{{ Form::hidden('provider_id', $providerData['id']) }}
                            	{{ Form::hidden('provider', $provider) }}
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('dictionary.register') }}
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
