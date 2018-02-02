@extends('layouts.appColegios')
@section('content')
@include('colegios.nav')

<div class="inicio py-5">
    <div class="container pt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-8 bg-white-opacity rounded p-4">
                <h5 class="text-white font-weight-bold ml-5">Abre una cuenta</h5>
                <div class="row">
                    <div class="col-md text-center">
                        <a href="/registro-estudiante" class="btn btn-success bg-register-btn rounded text-lg font-weight-bold px-4 my-2">¡Soy estudiante!</a>
                    </div>
                    <div class="col-md text-center">
                        <a href="/registro-admin" class="btn btn-success bg-register-btn rounded text-lg font-weight-bold px-4 my-2">¡Soy administrador!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("footer")
@endsection