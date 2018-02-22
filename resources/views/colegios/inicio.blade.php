@extends('layouts.appColegios')
@section('content')
@include('colegios.nav')

<div class="inicio py-5">
    <div class="container pt-5 px-sm-5">
        <div class="row pt-5">
            <div class="col-lg-7">
                <h2 class="text-white mb-5"><b>Cumple tu servicio social</b> de<br>una manera <b>más facil</b>...</h2>
            </div>
            <div class="col-lg-5">
                <div class="school-register p-3">
                    <h6 class="ml-2">¿Eres nuevo?</h6>
                    <div class="row justify-content-center">
                        <a href="/registro-admin" class="btn bg-green text-white col-sm-8 m-2"><h4 class="m-0"><b>¡Soy Colegio!</b></h4></a>
                        <a href="/registro-estudiante" class="btn bg-green text-white col-sm-8 m-2"><h4 class="m-0"><b>¡Soy Estudiante!</b></h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("footer")
@endsection
