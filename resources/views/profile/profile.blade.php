@extends('layouts.app')

@section('content')
    @include('nav',array('type' => 2))
    <div class="container">
        <div class="row col-md-6" id="profile">
            <template v-if="editable==false">
                <div class="col-md-8 col-xs-1 dataUser">
                  <div class="col-md-12 col-xs-6">
                    @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#fff', 'borderSize' => '3px'))
                  </div>
                  <div class='ranking rankingProfile'>
                    <div>
                      @for($cont = 1 ; $cont <= 5 ; $cont++)
                        @if($cont <= $user->ranking)
                          <span class='material-icons parrafo1'>grade</span>
                        @else
                          <span class='material-icons parrafo6'>fiber_manual_record</span>
                        @endif
                      @endfor
                    </div>
                  </div>
                  <div class="userName titulo1">{{$user->first_name." ".$user->last_name}}</div>
                  <div class="aboutMe paragraph1">{{$user->aboutMe}}</div>
                  <input type="checkbox" id='activeEdit' v-model="editable">
                  <label for='activeEdit' class="col-md-12 editProfile">Editar</label>
                </div>
            </template>

            <!-- ***************************Editable************************************************-->
            {!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'class' => 'col-md-4', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form']) !!}
            <div v-show="editable==true">
                <div class="col-md-8 col-xs-1 dataUser">
                    <div v-if="!image"  class="col-md-12 col-xs-6">
                        @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#fff', 'borderSize' => '3px'))
                    </div>
                    <div v-else>
                        <div class="col-md-12 col-xs-6">
                            <svg class="imageProfileMedium center-block" viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                                        <image  :xlink:href="image" x="-25" width="150" height="100"></image>
                                    </pattern>
                                </defs>
                                <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"></polygon>
                            </svg>
                        </div>
                    </div>
                    <input type="file" @change="onFileChange" name='avatar' id='avatar' value='{{$user->avatar}}' >
                    <label for='avatar'  class='button1 col-xs-12 text-center'>Cambiar Foto</label>

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
                <div class='col-xs-1'>
                    {{ Form::radio('gender', 'male', $user->gender == 'male' ,['id' => 'man', 'class'=>'square', 'v-model' => 'gender']) }}
                </div>
                <div class='col-xs-3'>
                    {{ Form::label('man', 'Hombre', ['class' => '']) }}
                </div>
                <div class='col-xs-1'></div>
                <div class='col-xs-1'>
                    {{ Form::radio('gender', 'female',	$user->gender == 'female' ,['id' => 'woman', 'class'=>'square', 'v-model' => 'gender']) }}
                </div>
                <div class='col-xs-3'>
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
                <div class='col-xs-1'>
                    {{ Form::checkbox('terms', '1' , $user->last_name,['id' => 'terms', 'class'=>'square', 'v-model' => 'terms']) }}
                </div>
                <div class='col-xs-10'>
                    <label for="terms">Aceptar los <a href="">términos y condiciones</a> de la plataforma</label>
                </div>
            </div>

            <div class="row">

                <input type="submit" value='Guardar cambios' class='button1 col-xs-12 background-active-color' :class='{inactive : validateAll}' />

            </div>

            {!! Form::close() !!}
                    <input type="checkbox" id='activeEdit' v-model="editable"  >
                    <label for='activeEdit' @click="removeImage" class="col-md-12 cancel">Cancelar cambios</label>
                </div>
            </div>
        </div>
        <!-- ***************************Ofertas************************************************-->
        <div class="row col-md-6" id="new">
            <div class="col-md-12 col-xs-1">
                <div class="">
                    <div class="">
                        <div class="row">
                            <p class="title1 col-md-6">
                                Mis ofertas
                            </p>
                            <div class="col-md-6">
                                @include('services.new')
                            </div>
                        </div>
                    </div>
                    @include('partial.errors')
                    <div class="row">
                        @foreach($user->services as $key=>$service)
                            <div class="col-md-6 col-xs-1">
                                @include('partial.serviceBox', array('service'=>$service))
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-6" id="app">
            @include('profile.deactivateAccount')
        </div>
    </div>
    <script src="{{ asset('js/components/profile.js') }}"></script>
    <script src="{{ asset('js/components/new.js') }}"></script>
    <script src="{{ asset('js/components/register.js') }}"></script>
@endsection
