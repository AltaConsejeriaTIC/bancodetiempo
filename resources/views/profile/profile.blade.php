@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi Perfil</div>
                <div class="panel-body">
                 <div >   
                    <img align="left"  style="margin:30px; border-radius:80px;" src="{{ Auth::user()->avatar }}" alt="Profile image example"/>
                    <div class="fb-profile-text">
                        <h1>{{$user->first_name." ".$user->last_name}}</h1>
                        <label for="address" class="col-md-4 control-label">Email</label>
                        <p>{{$user->email}}</p>
                        <label for="address" class="col-md-4 control-label">Estado</label>
                        <p>{{$user->state}}</p>
                        <label for="address" class="col-md-4 control-label">Genero</label>
                        <p>{{$user->gender}}</p>
                        <label for="address" class="col-md-4 control-label">Fecha de Nacimiento</label>
                        <p>{{$user->birthDate}}</p>
                        <label for="address" class="col-md-4 control-label">Direccion</label>
                        <p>{{$user->address}}</p>
                        <label for="address" class="col-md-4 control-label">Acerca de mi</label>
                        <p>{{$user->aboutMe}}</p>
                        <label for="address" class="col-md-4 control-label">Webside</label>
                        <p>{{$user->website}}</p>
                       <a href="{{ url('profile/edit') }}">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
