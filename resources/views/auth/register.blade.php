@extends('layouts.app') @section('content')
<script src="{{ url('js/register.js') }}"></script> 
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

<section class='row' id='profile'>
	
	<div class="container">
	
		<article class='col-xs-12'>
		
			<div class='row'>		
				<div class='col-xs-6 col-xs-offset-3'>
					<div class="col-xs-12">
						@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id))
						<input type="hidden" v-model='avatar' value='{{Auth::user()->avatar}}' />
						
					</div>				
				</div>	
			</div>
			<div class="row">
				<div class='col-xs-6 col-xs-offset-3'>
					<input type="file" name='avatar' id='avatar' class='hidden'/>
					<label for='avatar' class='button1 col-xs-12 text-center'>Cambiar Foto</label>
				</div>
			</div>
			<div class="row">
				<div class='col-xs-6 col-xs-offset-3'>
					<h2 class='title1 text-center col-xs-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
				</div>
			</div>
		
		</article>

		<article class="col-xs-12">
		
			{!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'class' => 'col-md-4', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form']) !!}
			
				<div class="row">
					{{ Form::label('firstName',	trans('dictionary.firstName'), ['class' => 'paragraph2'] ) }}
					<i class="fa fa-check-circle done" v-if='validateFirstname'></i>
					@{{validateFirstname}}
				</div>
				
				<div class="row">
					{{ Form::text('firstName', $user->first_name, ['required', 'autofocus', 'placeholder' => 'Nombre del usuario', 'class' => 'col-xs-12', 'v-model="firstName"']) }}
				</div>	
				
				<div class="row">
					{{ Form::label('lastName',	trans('dictionary.lastName'), ['class' => 'paragraph2'] ) }} 
					<i class="fa fa-check-circle done" v-if=''></i>
				</div>
				
				<div class="row">
					{{ Form::text('lastName', $user->last_name, ['required', 'placeholder' => 'Apellido del usuario', 'class' => 'col-xs-12', 'v-model' => 'lastName']) }}
				</div>	
				
				<div class="row">
					{{ Form::label('gender', trans('dictionary.gender'), ['class' => 'paragraph2'] ) }} 
					<i class="fa fa-check-circle done" v-if='validateGender'></i>
				</div>
				
				<div class="row">
					<div class='col-xs-1'>
						{{ Form::radio('gender', 'male', $user->gender == 'male' ,['id' => 'man', 'class'=>'square', 'v-model' => 'gender']) }}
					</div>
					<div class='col-xs-3'>
						{{ Form::label('man', 'Hombre', ['class' => '']) }}
					</div>				
					
					<div class='col-xs-1'>
						{{ Form::radio('gender', 'female',	$user->gender == 'female' ,['id' => 'woman', 'class'=>'square', 'v-model' => 'gender']) }} 
					</div>
					<div class='col-xs-3'>
						{{ Form::label('woman', 'Mujer', ['class' => '']) }}
					</div>					
				</div>
				
				<div class="row">
					{{ Form::label('birthdate',	trans('dictionary.lastName'), ['class' => 'paragraph2'] ) }}
					<i class="fa fa-check-circle done" v-if='validateDate'></i> 
				</div>
				
				<div class="row">
					
					<div class='not-padding col-xs-4'>
						{{ Form::selectRange('day', 1, 31, '', array('placeholder' => 'Dia', 'class' => 'col-xs-11', 'v-model' => 'day')) }}
					</div>
					
					<div class="not-padding col-xs-4">
						{{ Form::selectRange('mounth', 1, 12, '', array('placeholder' => 'Mes', 'class' => 'col-xs-11', 'v-model' => 'mounth')) }}
					</div>
					
					<div class="not-padding col-xs-4">
						{{ Form::selectYear('year', 1950, 2015, '', array('placeholder' => 'Año', 'class' => 'col-xs-11', 'v-model' => 'year')) }}
					</div>
				</div>
				
				<div class="row">
					{{ Form::label('aboutMe',	trans('dictionary.aboutMe'), ['class' => 'paragraph2'] ) }} 
					<i class="fa fa-check-circle done" v-if='validateAboutMe'></i>
				</div>
				
				<div class="row">
					{{ Form::textarea('aboutMe', '', ['size' => '30x4', 'placeholder' => trans('dictionary.aboutMe'), 'class' => 'col-xs-12', 'v-model' => 'aboutMe']) }}
				</div>	
				
								
				<div class="row">
					<div class='col-xs-1'>
						{{ Form::checkbox('terms', '1' , '' ,['id' => 'terms', 'class'=>'square']) }}
					</div>
					<div class='col-xs-10'>
						<label for="terms">Aceptar los <a href="">términos y condiciones</a> de la plataforma</label>
					</div>
				</div>
				
				<div class="row">
				
					{{ Form::submit('Siguiente', array('class' => 'button1 col-xs-12')) }}
				
				</div>
				
			{!! Form::close() !!}
		
		</article>
	
		
	</div>

</section>

 

@endsection
