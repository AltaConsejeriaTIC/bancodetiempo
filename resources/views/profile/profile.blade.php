@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">

@section('content')
  @include('nav',array('type' => 2))
  <div class="container">
    <div class="row col-md-8">
      <template v-if="editable==false">
         <div class="col-md-4 col-xs-1 dataUser">
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
      </template>
      @include('profile.deactivateAccount')
        <!-- ***************************Editable************************************************-->
        <div v-show="editable==true">
          <div  class="col-md-4 col-xs-1 dataUser">

            <div v-if="!image"  class="col-md-12 col-xs-6">
                @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#fff', 'borderSize' => '3px'))
                <input type="file" @change="onFileChange">
                </div>
                <div v-else>
                  <img :src="image" />
                  <button @click="removeImage">Remove image</button>
                </div>


            <form class="form-horizontal" role="form" method="POST" action="{{ route('profile/update') }}">
                {{ csrf_field() }}
            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                <label for="firstName" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input id="firstName" type="text" class="form-control" name="firstName" value="{{$user->first_name}}" required autofocus>
                </div>
            </div>

            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                <label for="lastName" class="col-md-4 control-label">Apellido</label>
                <div class="col-md-6">
                    <input id="lastName" type="text" class="form-control" name="lastName"  value="{{$user->last_name}}"  required autofocus>
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
            <input type="checkbox" id='activeEdit' v-model="editable"  >
            <label for='activeEdit' class="col-md-12 cancel">Cancelar cambios</label>
          </div>
        </div>
     </div>
     <div class="row col-md-4">
      <div class="col-md-8 col-xs-1">
          <div class="">
              <div class="">
                <div class="row">
                  <p class="col-md-6">
                  Mis Servicios
                </p>
                <div class="col-md-6">
                    <a class="btn btn-raised btn-success" href="{{ url('/service') }}">Nuevo servicio</a>
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
    </div>
	</div>

@endsection
