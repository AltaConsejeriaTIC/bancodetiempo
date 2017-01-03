@extends('layouts.app')
<!-- Custom styles -->
<link href="{{ asset('/css/styleForms.css') }}" rel="stylesheet">


@section('content')

@include('nav', array('type' => 1))
<section class='banner2' >

	<div class='fondo'>

		<img src="{{ asset('images/banner3.jpg') }}" alt="" />
		<div class="telon"></div>

	</div>

	<div class="container">

		<div class="row">
			<div class='clearfix mTop-50 visible-xs'></div>
			<div class='clearfix mTop-100 visible-sm'></div>
			<div class='clearfix mTop-100 visible-md visible-lg'></div>
			<div class='col-xs-12 col-sm-3 col-md-4 col-lg-4'>

				<div class='row'>
					 <svg class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2" viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                          <image  xlink:href="{{ Auth::user()->avatar }}" x="-25" width="150" height="100" />
                        </pattern>
                      </defs>
                      <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                    </svg>
				</div>

				<div class='row'>
					<h3 class='white-text col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2' style='text-transform:capitalize'>{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h3>
				</div>

			</div>
			<div class='white-text col-xs-12 col-sm-6  col-md-4 col-lg-4'>

				<h3>Bienvenido a nuestra comunidad</h3>

				<p>Para empezar completa tus datos !</p>

			</div>
			<div class='col-xs-12 col-sm-3  col-md-4 col-lg-4'></div>

		</div>

	</div>

</section>
<div class="row">
    <div class="panel panel-default">
    <div class="panel-body medium">
			<div class="container">

					 @if(!empty($errors->all()))

					     <div class='alert alert-dismissible alert-warning'>

							@foreach ($errors->all() as $error)
								<div>{{ $error }}</div>
							@endforeach

						</div>

					@endif

          {!! Form::open(['url' => 'profile/update', 'method' => 'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) !!}

						<div class="row">
								 <svg class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-5" viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
			                      <defs>
			                        <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
			                          <image  xlink:href="{{ Auth::user()->avatar }}" x="-25" width="150" height="100" />
			                        </pattern>
			                      </defs>
			                      <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
			                    </svg>

							{{ Form::hidden('avatar', $user->avatar ) }}

						</div>
						<br>
                        <div class='row'>

                            {{ Form::label('firstName', trans('dictionary.firstName'), ['class' => 'col-md-4 control-label'] ) }}

                            {{ Form::text('firstName', $user->first_name, ['class' => 'form-bt col-md-6', 'required', 'autofocus' ]) }}

                        </div>
						<br>
                        <div class='row'>
                            {{ Form::label('firstName', trans('dictionary.lastname'), ['class' => 'col-md-4 control-label'] ) }}

                            {{ Form::text('lastName', $user->last_name, ['class' => 'form-bt  col-md-6', 'required', 'autofocus' ]) }}

                        </div>
						<br>
                        <div class='row'>

                        	{{ Form::label('gender', trans('dictionary.gender'), ['class' => 'col-md-4 control-label'] ) }}

	                        <div class="col-md-4">

								<div class='row'>

		                        	{{ Form::radio('gender', 'male', $user->gender == 'male' ,['id' => 'man', 'class'=>'form-bt col-md-0']) }}

									{{ Form::label('man', 'Hombre', ['class' => 'col-md-3 col-md-offset-2']) }}


									{{ Form::radio('gender', 'female', $user->gender == 'female' ,['id' => 'woman', 'class'=>'form-bt  col-md-0']) }}

									{{ Form::label('woman', 'Mujer', ['class' => 'col-md-3 col-md-offset-2']) }}

								</div>

							</div>

                        </div>
						<br>
                        <div class='row'>

                         	{{ Form::label('birthdate', trans('dictionary.birthDate'), ['class' => 'col-md-4 control-label'] ) }}

                         	{{ Form::date('birthdate', $user->birthDate, ['class' => 'form-bt col-md-6', 'id' => 'birthdate', 'required' ]) }}


                        </div>
						<br>
                        <div class='row'>

                            {{ Form::label('email', trans('dictionary.email'), ['class' => 'col-md-4 control-label'] ) }}

							{{ Form::email('email', $user->email, ['class' => 'form-bt col-md-6', 'id' => 'email', 'readonly' ]) }}

                        </div>
						<br>
                        <div class='row'>

                           {{ Form::label('aboutMe', trans('dictionary.aboutMe'), ['class' => 'col-md-4 control-label'] ) }}

                           {{ Form::textarea('aboutMe', '', ['class' => 'form-bt col-md-6', 'id' => 'aboutMe', 'required' ]) }}

                        </div>
            <br>
                        <div class='row'>

                           {{ Form::label('privacy_policy', trans('dictionary.privacy_policy'), ['class' => 'col-md-4 control-label'] ) }}

                          {{ Form::checkbox('privacy_policy','1',false, ['class' => 'checkbox-material', 'id' => 'privacy_policy','required']) }}


                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ trans('dictionary.register') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>



@endsection
