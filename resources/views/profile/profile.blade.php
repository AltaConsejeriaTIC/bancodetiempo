@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">

@section('content')
@include('nav',array('type' => 2))
<div class="container">
    <div class="row">
        <div class="col-md-3 col-xs-1">
          @include('partial.imageProfile')
            <div class="userName">{{$user->first_name." ".$user->last_name}}</div>
            <div class="aboutMe">{{$user->aboutMe}}</div>
            <a href="{{ url('profile/edit') }}" class="btn btn-raised btn-primary col-md-12">   Editar</a>
            <a href="{{ url('#') }}" class="btn btn-raised btn-plus col-md-12">   Desactivar Cuenta</a>
	            </div>
	    	</div>
        	</div>
        <div class="col-md-6 col-xs-1">
            <div class="panel panel-default">
                <div class="panel-heading">
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
                <div class="panel-body ">
                @foreach($user->services as $key=>$service)

                    <div class="col-md-6">
                      <div class="photoService">
                          <image  src="{{$service->image}}" />
                      </div>
                      <div class="contentService">
                        <div class="titleService">
                        <p>
                            <a href='{{url("/service",["serviceid" => $service->id]) }}'> {{$service->name}}</a>
                        </p>
                        </div>
                        <div class="descriptioService">
                          <p>
                            {{$service->description}}
                          </p>
                        </div>
                      </div>
                    </div>
                    @if($key%2!=0)
                        <div class="clearfix">

                        </div>
                    @endif
                  @endforeach
              </div>
        </div>
		</div>
	</div>

</div>
@endsection
