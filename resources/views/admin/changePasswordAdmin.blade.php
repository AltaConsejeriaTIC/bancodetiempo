@extends('layouts.appAdmin')
@section('content')
<div class="py-1 px-3">
    @include('admin.partial.errors')
    <div class="content-area py-1">
        <div class="container-fluid">
            <h4>Cambio de contraseña</h4>
            <div class="box box-block bg-white">
                <div class="row">
                    <div class="col-12 col-lg-3">
                    {!! Form::open(['route' => 'changePassword', 'method'=> 'post', 'novalidate', 'class' => 'form-group'])!!}
                    <div class="row">
                        <div class="col-12">
                            <label>Contraseña Antigua: </label>
                            <input type="password" class="form-control" name="last_password" required>
                        </div>
                        <div class="col-12">
                            <label for="category">Contraseña Nueva: </label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="col-12">
                            <label for="category">Confirmar Contraseña Nueva: </label>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                    {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
