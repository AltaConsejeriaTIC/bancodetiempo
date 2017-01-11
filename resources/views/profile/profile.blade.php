@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">

@section('content')
 @include('nav',array('type' => 2))
<div class="container">
    <div class="row">
       <template v-if="name==false">
         <div class="col-md-4 col-xs-1 dataUser">
           @include('partial.imageProfile')
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
           <div class="aboutMe parrafo1">{{$user->aboutMe}}</div>
           <input type="checkbox" id='activeEdit' v-model="name"  >
           <label for='activeEdit' class="col-md-12 editProfile">Editar</label>
            @include('profile.deactivateAccount')
        </template>
        <div v-show="name==true">
          <div  class="col-md-4 col-xs-1 dataUser">
            @include('partial.imageProfile')
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
            <input type="checkbox" id='activeEdit' v-model="name"  >
            <label for='activeEdit' class="col-md-12 editProfile">Editar</label>
            <button class="col-md-12 deleteProfile modal-default-button-success">
              Cancelar cambios
            </button>
          </div>
        </div>
     </div>

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
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ url('js/profile.js') }}"></script>
@endsection
