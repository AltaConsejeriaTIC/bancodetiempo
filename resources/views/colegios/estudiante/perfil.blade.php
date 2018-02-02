@extends('layouts.appColegios')
@section('content')

@include('colegios.navStudent')

<div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{route("getImage")}}?img={{Auth::user()->avatar}}&w=200" alt="avatar" class="img-thumbnail"><br>
                <h4>{{Auth::User()->first_name}} {{Auth::User()->last_name}}</h4>
                <h6>Estudiante</h6>
            </div>
            <div class="col-6">
                <p><strong>Intereses:</strong> {{Auth::user()->aboutMe}}</p>
                <hr>
                <p><strong>Correo:</strong> {{Auth::user()->email2}}</p>
                <p><strong>Colegio:</strong> {{Auth::user()->colegio()->name}}</p>
                <p><strong>Número de identificación:</strong> {{Auth::user()->document}}</p>
                <p><strong>Fecha Nacimiento:</strong> {{Auth::user()->birthDate}}</p>
                <p><strong>Curso:</strong> {{Auth::user()->course}}</p>
                
                <form action="/editStudent" method="post" enctype="multipart/form-data" class="form-group">
                    {{csrf_field()}}
                    <label class="label-control">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->first_name}}">
                   
                    <label class="label-control">Apellido</label>
                    <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}">
                   
                    <label class="label-control">Correo electronico</label>
                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email2}}">
                   
                    <label class="label-control">Número identificación</label>
                    <input type="text" name="document" class="form-control" value="{{Auth::user()->document}}">
                   
                    <label class="label-control">Intereses</label>
                    <textarea name="aboutMe" class="form-control">{{Auth::user()->aboutMe}}</textarea>
                   
                    <label class="label-control">Fecha nacimiento</label>
                    <input type="date" name="date" class="form-control"  value="{{Auth::user()->birthDate}}">
                   
                    <label class="label-control">Curso</label>
                    <select name="course" class="form-control">
                        <option value=""></option>
                        <option value="10" @if(Auth::user()->course == 10) selected @endif>Decimo</option>
                        <option value="11" @if(Auth::user()->course == 11) selected @endif>Once</option>
                    </select>
                    
                    <button type="submit" class="btn btn-primary">Completar</button>
                    <button type="submit" class="btn bg-white btn-outline-secondary">Cancelar</button>
                    
                </form>
            </div>     
            
        </div>
    </div>
</div>

@include("footer")

@endsection