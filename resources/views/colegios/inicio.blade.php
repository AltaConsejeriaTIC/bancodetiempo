@extends('layouts.appColegios')
@section('content')

@include('colegios.nav')

<div class="inicio py-5">
    
    <div class="container py-5">
        
        <div class="row justify-content-center py-5">
            
            <div class="col-6 bg-white-opacity rounded p-4">
                <h6 class="text-white">Abre una cuenta</h6>
                <div class="row">
                    <div class="col-6 text-center">
                        <a href="#" class="btn btn-dark bg-cambalachea rounded-0 text-lg px-5">Soy estudiante</a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="/registro-admin" class="btn btn-dark bg-cambalachea rounded-0 text-lg px-4">Soy administrador</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>

@include("footer")

@endsection