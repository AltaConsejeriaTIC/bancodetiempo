@extends('layouts.appAdmin')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <table class='table table-striped table-hover'>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

                @foreach($contents as $content)

                    <tr>
                        <td><a href='/admin/dynamicContent/{{$content->id}}'>{{$content->name}}</a></td>
                        <td><a href='/admin/dynamicContent/{{$content->id}}'>{{$content->description}}</a></td>
                        <td></td>
                    </tr>

                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection
