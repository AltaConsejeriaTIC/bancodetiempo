@extends('layouts.app') @section('content')

<nav class='navbar navbar-default navbar-static-top nav1'>

	<div class="container">
		<div class='row'>

			<div class="col-xs-8 col-xs-offset-2 col-md-3 ">
				<a href="/"> <img src="images/logo.png" alt="Logo" />
				</a>
			</div>

		</div>
	</div>

</nav>

<section class='bannerRegister row'>
	<div class="container">

		<div class='row'>
			<div class="col-xs-12">
				<h2 class='title1 text-white col-xs-9'>¡Gracias por vincular tu cuenta!</h2>
			</div>
			
		</div>
		<div class="row">
			<div class="col-xs-12">
				<p class="paragraph1 text-white col-xs-12">Completa todos los datos de tu perfil para continuar con el registro. <br>Puedes cambiar esta información ahora o más adelante</p>
			</div>
		</div>

	</div>
</section>

<section>
	
	<div class="container">
	
		<div class='row'>
		
			
			
		</div>
		
		
	</div>

</section>



<section class='banner2'>

	<div class='fondo'>

		<img src="{{ asset('images/banner3.jpg') }}" alt="" />
		<div class="telon"></div>

	</div>

	<div class="container">

		<div class="row">
			<div class='clearfix mTop-50 visible-xs'></div>
			<div class='clearfix mTop-100 visible-sm'></div>
			<div class='clearfix mTop-100 visible-md visible-lg'></div>
			<div class='col-xs-12 col-sm-3 col-md-4 col-lg-4'></div>
			<div class='white-text col-xs-12 col-sm-6  col-md-4 col-lg-4'>

				<h3 class="white-text titulo1">¡Gracias por vincular tu cuenta!</h3>

				<p class="white-text parrafo1">Completa todos los datos de tu perfil
					para continuar con el registro. Puedes cambiar esta información
					ahora o más adelante.</p>

			</div>
			<div class='col-xs-12 col-sm-3  col-md-4 col-lg-4'></div>

		</div>

	</div>

</section>
<!-- ************************content*************************************** -->
<div class="container">
	<div class="row">
		<div class="col-md-1 col-xs-1 col-md-offset-1 picture"></div>

		<div class="col-md-2 col-xs-1 col-md-offset-2">
			<div class="container">
				@if(!empty($errors->all()))
				<div class='alert alert-dismissible alert-warning'>
					@foreach ($errors->all() as $error)
					<div>{{ $error }}</div>
					@endforeach
				</div>
				@endif {!! Form::open(['url' => 'profile/update', 'method' => 'put',
				'enctype' => 'multipart/form-data', 'class' => 'col-md-4', 'role' =>
				'form']) !!}
				<div class='row'>{{ Form::label('firstName',
					trans('dictionary.firstName'), ['class' => 'control-label
					form-control '] ) }} {{ Form::text('firstName', $user->first_name,
					['class' => 'form-bt form-control', 'required', 'autofocus' ]) }}</div>
				<div class='row'>{{ Form::label('firstName',
					trans('dictionary.lastname'), ['class' => 'control-label
					form-control'] ) }} {{ Form::text('lastName', $user->last_name,
					['class' => 'form-bt form-control ', 'required', 'autofocus' ]) }}

				</div>
				<div class='row'>

					{{ Form::label('gender', trans('dictionary.gender'), ['class' =>
					'control-label form-control'] ) }}

					<div class='row'>{{ Form::radio('gender', 'male', $user->gender ==
						'male' ,['id' => 'man', 'class'=>'']) }} {{ Form::label('man',
						'Hombre', ['class' => '']) }} {{ Form::radio('gender', 'female',
						$user->gender == 'female' ,['id' => 'woman', 'class'=>'']) }} {{
						Form::label('woman', 'Mujer', ['class' => '']) }}</div>

				</div>
				<div class='row'>{{ Form::label('birthdate',
					trans('dictionary.birthDate'), ['class' => 'control-label
					form-control'] ) }} {{ Form::date('birthdate', $user->birthDate,
					['class' => 'form-bt form-control', 'id' => 'birthdate', 'required'
					]) }}</div>

				<div class='row'>{{ Form::label('aboutMe',
					trans('dictionary.aboutMe'), ['class' => ' control-label
					form-control'] ) }} {{ Form::textarea('aboutMe', '', ['class' =>
					'form-bt form-control', 'id' => 'aboutMe', 'required' ]) }}</div>
				<div class='row'>{{ Form::label('privacy_policy',
					trans('dictionary.privacy_policy'), ['class' => ' control-label
					form-control'] ) }} {{ Form::checkbox('privacy_policy','1',false,
					['class' => 'checkbox-material', 'id' => 'privacy_policy',
					'required' ]) }}</div>

				<div class="form-group col-md-12">
					<div class=" col-md-offset-4">
						<button type="submit" class="btn btn-primary">{{
							trans('dictionary.register') }}</button>
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
