@extends('layouts.appAdmin')
@section('content')
    <div class="col-md-6 col-md-offset-2">
        <div class="row">
            @include('partial.errors')
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>Cambio de Contraseña Usuario {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
              </div>
              {!! Form::open(['route' => 'changePassword', 'method'=> 'post', 'novalidate', 'class' => 'form-inline'])!!}
                <div class="panel-body">
                  <div class="container col-md-12">
                    <div class="form-group col-md-5">
                      <label for="category">Contraseña Antigua: </label>
                    </div>
                    <div class="form-group col-md-7">
                      <input type="password" class="form-control" name="last_password" required>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Contraseña Nueva: </label>
                    </div>
                    <div class="form-group col-md-7">
                      <input type="password" class="form-control" name="new_password" required>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Confirmar Contraseña Nueva: </label>
                    </div>
                    <div class="form-group col-md-7">
                      <input type="password" class="form-control" name="confirm_password" required>
                    </div>
                    <div class="form-group col-md-10">
                      <button type="submit" class="btn btn-raised btn-success" title="Guardar"><i class="material-icons">done_all</i></button>
                    </div>
                  </div>                  
                </div>
              {!! Form::close()!!}
            </div>
        </div>
    </div>
@endsection