
	<div class="row">
		{{ Form::label('firstName',	trans('dictionary.firstName'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='data.validateFirstName'></i>
	</div>
	
	<div class="row">
		{{ Form::text('firstName', '', ['required', 'autofocus', 'placeholder' => 'Nombre del usuario', 'class' => 'col-xs-12', 'v-model' => "data.firstName"]) }}
	</div>
	
	<div class="row">
		{{ Form::label('lastName',	trans('dictionary.lastName'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='data.validateLastName'></i>
	</div>
	
	<div class="row">
		{{ Form::text('lastName', '', ['required', 'placeholder' => 'Apellido del usuario', 'class' => 'col-xs-12', 'v-model' => 'data.lastName']) }}
	</div>
	
	<div class="row">
		{{ Form::label('gender', trans('dictionary.gender'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='data.validateGender'></i>
	</div>
	
	<div class="row">
		<div class='col-xs-5'>
			{{ Form::radio('gender', 'male', '' ,['id' => 'man', 'class'=>'square', 'v-model' => 'data.gender']) }}
		
			{{ Form::label('man', 'Hombre', ['class' => '']) }}
		</div>
		<div class='col-xs-5'>
			{{ Form::radio('gender', 'female',	'' ,['id' => 'woman', 'class'=>'square', 'v-model' => 'data.gender']) }}
		
			{{ Form::label('woman', 'Mujer', ['class' => '']) }}
		</div>
	</div>
	
	<div class="row">
		{{ Form::label('birthdate',	trans('dictionary.birthDate'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='data.validateDate'></i>
	</div>
	
	<div class="row">
		<div class='not-padding col-xs-4'>
			{{ Form::selectRange('day', 1, 31, '', array('class' => 'col-xs-11', 'v-model' => 'data.day')) }}
		</div>
			
		<div class="not-padding col-xs-4">
			{{ Form::selectRange('mounth', 1, 12, '', array('class' => 'col-xs-11', 'v-model' => 'data.mounth')) }}
		</div>
			
		<div class="not-padding col-xs-4">
			{{ Form::selectYear('year', 1950, 2015, '', array('class' => 'col-xs-11', 'v-model' => 'data.year')) }}
		</div>
	</div>
	
	<div class="row">
		{{ Form::label('aboutMe',	trans('dictionary.aboutMe'), ['class' => 'paragraph2'] ) }}
		<i class="fa fa-check-circle done" v-if='data.validateAboutMe'></i>
	</div>
	
	<div class="row">
		<textarea placeholder="Acerca de mi" class="col-xs-12 countCharacters" name="aboutMe" rows="4" id="aboutMe" v-model="data.aboutMe" @keyUp='countCharacters'></textarea>
		<label for='aboutMe'>@{{data.totalChar}}</label>
	</div>
	
	
	<div class="row">
		<div class='col-xs-12'>
			{{ Form::checkbox('terms', '1' , '' ,['id' => 'terms', 'class'=>'square', 'v-model' => 'data.terms']) }}
			<label for="terms">Aceptar los <a href="">términos y condiciones</a> de la plataforma</label>
		</div>
	</div>
	
	<div class="row">
	
		<input type="submit" value='Siguiente' class='button1 col-xs-12' :class='{inactive : data.validateAll}' />
	
	</div>

