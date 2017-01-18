{!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'class' => 'col-md-4', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form']) !!}
	<input type="file" name='avatar' id='avatar' class='hidden' @change='previewPhoto'/>
	<div class="row">
		{{ Form::label('firstName',	trans('dictionary.firstName'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='validateFirstName'></i>	
	</div>
	
	<div class="row">
		{{ Form::text('firstName', $user->first_name, ['required', 'autofocus', 'placeholder' => 'Nombre del usuario', 'class' => 'col-xs-12', 'v-model' => "firstName"]) }}
	</div>
	
	<div class="row">
		{{ Form::label('lastName',	trans('dictionary.lastName'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='validateLastName'></i>
	</div>
	
	<div class="row">
		{{ Form::text('lastName', $user->last_name, ['required', 'placeholder' => 'Apellido del usuario', 'class' => 'col-xs-12', 'v-model' => 'lastName']) }}
	</div>
	
	<div class="row">
		{{ Form::label('gender', trans('dictionary.gender'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='validateGender'></i>
	</div>
	
	<div class="row">
		<div class='col-xs-6'>
			{{ Form::radio('gender', 'male', $user->gender == 'male' ,['id' => 'man', 'class'=>'square', 'v-model' => 'gender']) }}
			{{ Form::label('man', 'Hombre', ['class' => '']) }}
		</div>

		<div class='col-xs-6'>
			{{ Form::radio('gender', 'female',	$user->gender == 'female' ,['id' => 'woman', 'class'=>'square', 'v-model' => 'gender']) }}
			{{ Form::label('woman', 'Mujer', ['class' => '']) }}
		</div>
	</div>
	
	<div class="row">
		{{ Form::label('birthdate',	trans('dictionary.birthDate'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='validateDate'></i>
	</div>

	<div class="row">		
		<div class='not-padding col-xs-4'>
			{{ Form::selectRange('day', 1, 31, date('d', strtotime($user->birthDate)), array('placeholder' => 'Dia', 'class' => 'col-xs-11', 'v-model' => 'day')) }}
		</div>
			
		<div class="not-padding col-xs-4">
			{{ Form::selectRange('mounth', 1, 12, date('m', strtotime($user->birthDate)), array('placeholder' => 'Mes', 'class' => 'col-xs-11', 'v-model' => 'mounth')) }}
		</div>
			
		<div class="not-padding col-xs-4">
			{{ Form::selectYear('year', 1950, 2015, date('Y', strtotime($user->birthDate)), array('placeholder' => 'Año', 'class' => 'col-xs-11', 'v-model' => 'year')) }}
		</div>
	</div>
	
	<div class="row">
		{{ Form::label('aboutMe',	trans('dictionary.aboutMe'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='validateAboutMe'></i>
	</div>
	
	<div class="row">
		<textarea placeholder="Acerca de mi" class="col-xs-12 countCharacters" name="aboutMe" rows="4" id="aboutMe" v-model="aboutMe" @keyUp='countCharacters'>{{ old('aboutMe') }}{{ $user->aboutMe }}</textarea>
		<label for='aboutMe'>@{{totalChar}}</label>
	</div>
	
	
	<div class="row">
		<div class='col-xs-12'>
			{{ Form::checkbox('terms', '1' , '' ,['id' => 'terms', 'class'=>'square', 'v-model' => 'terms']) }}
			<label for="terms">Aceptar los <a href="">términos y condiciones</a> de la plataforma</label>
		</div>
	</div>
	
	<div class="row">
	
		<input type="submit" value='Siguiente' class='button1 col-xs-12 background-active-color' :class='{inactive : validateAll}' />
	
	</div>

{!! Form::close() !!}