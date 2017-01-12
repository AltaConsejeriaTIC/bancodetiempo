@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">
@section('content')
    @include('nav',array('type' => 2))
    <div class="container">
        <div class="row col-md-6" id="profile">
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
                </div>
            </template>
          
            <!-- ***************************Editable************************************************-->
            <div v-show="editable==true">
                <div class="col-md-4 col-xs-1 dataUser">
                    <div v-if="!image"  class="col-md-12 col-xs-6">
                        @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#fff', 'borderSize' => '3px'))
                        <input type="file" @change="onFileChange">
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
                        <input type="file" @change="onFileChange">
                    </div>
                    <input type="checkbox" id='activeEdit' v-model="editable"  >
                    <label for='activeEdit'  @click="removeImage" class="col-md-12 cancel">Cancelar cambios</label>
                </div>
            </div>
        </div>    

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
    <script src="{{ asset('js/profile.js') }}"></script>    
    <script src="{{ asset('js/new.js') }}"></script>
@endsection
