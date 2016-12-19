@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi Perfil</div>
                <div class="panel-body  medium">
                 <div >   
                    <img align="left"  style="margin:30px; border-radius:80px;" src="{{ Auth::user()->avatar }}" alt="Profile image example"/>
                    <div class="fb-profile-text">
                        <h1>{{$user->first_name." ".$user->last_name}}</h1>
                        
                        <label for="email" class="col-md-4 control-label">{{ trans('dictionary.email') }}</label>
                        <p>{{$user->email}}</p>
                        <label for="address" class="col-md-4 control-label">{{ trans('dictionary.state') }}</label>
                        <p>{{$user->state}}</p>
                        <label for="gender" class="col-md-4 control-label">{{ trans('dictionary.gender') }}</label>
                        <p>{{$user->gender}}</p>
                        <label for="birthDate" class="col-md-4 control-label">{{ trans('dictionary.birthDate') }}</label>
                        <p>{{$user->birthDate}}</p>
                        <HR> 
                        <label for="address" class="col-md-4 control-label">{{ trans('dictionary.address') }}</label>
                        <p>{{$user->address}}</p>
                        <label for="aboutMe" class="col-md-4 control-label">{{ trans('dictionary.aboutMe') }}</label>
                        <p>{{$user->aboutMe}}</p>
                        <label for="website" class="col-md-4 control-label">{{ trans('dictionary.website') }}</label>
                        <p>{{$user->website}}</p>
                       <a href="{{ url('profile/edit') }}">        Editar</a>
	                </div>
	            </div>
	        	</div>
	    	</div>
		</div>

	</div>
</div>
@endsection
