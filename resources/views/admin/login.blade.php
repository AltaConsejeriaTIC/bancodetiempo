@extends('layouts.layoutLoginAdmin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Inciar Sesión</div>
          <div class="panel-body">
            @include('admin.partial.errors')
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" novalidate="novalidate">
              
              
              {{ csrf_field() }}
              
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>
                </div>
              </div>           

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  
                  <button type="submit" class="btn btn-raised btn-primary">
                      Iniciar Sesión
                  </button>
                  
                  <!-- <a class="btn btn-raised btn-primary" href="/homeAdmin">Iniciar Sesión</a> -->
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
@endsection




