@extends('layouts.appAdmin')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">

           <div class="panel-heading">
               <h2 class="title2">{{$content->name}}</h2>
           </div>
           <div class="panel-body">
               <p class="bg-info col-xs-12">{{$content->description}}</p>
                {!! Form::open(['url' => '/admin/dynamicContent/edit', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea name="html" id="html" rows="10" class='editor'>{{$content->html}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" name="id" value='{{$content->id}}'>
                            <button type="submit" class="btn btn-raised btn-success">Editar</button>
                        </div>
                    </div>
                {!! Form::close()!!}
           </div>


        </div>
    </div>
</div>

@endsection
