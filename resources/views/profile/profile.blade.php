@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">

@section('content')
@include('nav',array('type' => 2))
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Mi Perfil</div>
                <div class="panel-body">
                 <div>
                    <svg class="imageProfileMedium center-block" viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                          <image  xlink:href="{{ Auth::user()->avatar }}" x="-25" width="150" height="100" />
                        </pattern>
                      </defs>
                      <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                    </svg>
                      <h1 >{{$user->first_name." ".$user->last_name}}</h1>
                      </div>
                    <div class="fb-profile-text">
                        <label for="email"  >{{ trans('dictionary.email') }}</label>
                        <p  >{{$user->email}}</p>
                    <!--    <label for="address"  >{{ trans('dictionary.state') }}</label>
                        <p class=" control-label" >{{$user->state}}</p> -->
                        <label for="gender"  >{{ trans('dictionary.gender') }}</label>
                        <p class=" control-label" >{{$user->gender}}</p>
                        <label for="birthDate"  >{{ trans('dictionary.birthDate') }}</label>
                        <p class=" control-label" >{{$user->birthDate}}</p>
                        <label for="address"  >{{ trans('dictionary.address') }}</label>
                        <p class=" control-label" >{{$user->address}}</p>
                        <label for="aboutMe"  >{{ trans('dictionary.aboutMe') }}</label>
                        <p class=" control-label" >{{$user->aboutMe}}</p>
                        <label for="website"  >{{ trans('dictionary.website') }}</label>
                        <p class=" control-label" >{{$user->website}}</p>
                       <a href="{{ url('profile/edit') }}">   Editar</a>

	            </div>
	        	</div>
	    	</div>
		</div>

	</div>
</div>
@endsection
