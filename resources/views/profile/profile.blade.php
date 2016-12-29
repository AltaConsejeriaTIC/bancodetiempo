@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">

@section('content')
@include('nav',array('type' => 2))
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-1">
          @include('partial.imageProfile')
            <div class='ranking rankingProfile'>

        			@for($cont = 1 ; $cont <= 5 ; $cont++)

        				@if($cont <= $user->ranking)
        					<span class='material-icons parrafo1'>grade</span>
        				@else
        					<span class='material-icons parrafo6 star'>fiber_manual_record</span>
        				@endif

        			@endfor

        		</div>
            <div class="userName titulo1">{{$user->first_name." ".$user->last_name}}</div>
            <div class="aboutMe">{{$user->aboutMe}}</div>
            <a href="{{ url('profile/edit') }}" class="btn btn-raised btn-primary col-md-12">   Editar</a>
            <a href="{{ url('#') }}" class="btn btn-raised btn-plus col-md-12">   Desactivar Cuenta</a>
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
@endsection
