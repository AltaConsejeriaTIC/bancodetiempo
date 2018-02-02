@extends('layouts.layoutLoginAdmin')

@section('content')
  <div class="container vh100">
    <div class="row justify-content-center middle">
      <div class="col-md-4 bg-white-middle p-5 bg-opacity">
          <h4>Iniciar sesión</h4>
          <div>
            @include('admin.partial.errors')
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" novalidate="novalidate">            
              {{ csrf_field() }}
              
              <div class="row form-group {{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-12">
                    <label for="email" class="">E-Mail</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                </div>
              </div>

              <div class="row form-group {{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-12">
                    <label for="password">Contraseña</label>
                  <input id="password" type="password" class="form-control" name="password" required>
                </div>
              </div>           

              <div class="form-group row justify-content-center">
                <div class="col-md-6">
                  
                  <button type="submit" class="btn btn-raised btn-primary col-12">
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
@endsection




