@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Lista de Grupos Registrados en el Sistema</h2></div>
                    <div class="panel-body">
                        @include('partial.errors')
                        {!! Form::open(['route' => 'homeAdminServices', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="find">
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary" title="Buscar"><i
                                    class="material-icons">search</i></button>
                        <a href="{{ url('/homeAdminServices') }}" class="btn btn-raised btn-primary"
                           title="Listar Todos"><i class="material-icons">youtube_searched_for</i></a>
                        <a href="{{ url('/homeAdminServices/reported') }}" class="btn btn-raised btn-primary"
                           title="Listar Reportados">Reportados</a>
                        {!! Form::close() !!}
                        <div class="col-md-2 form-group navbar-right">
                            <span class="label label-success news">Hay {!! $groups->total() !!}
                                Ofertas Registradas</span>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Description</th>
                                    <th>Propietario</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
                                        <td><p class="paragraph3">{{ $group->description }}</p></td>
                                        <td>{{ $group->admin->first_name." ".$group->admin->last_name}}</td>
                                        <td>{{ $group->state->state}}</td>
                                        <td>
                                            <a class="btn btn-raised btn-primary btn-xs" href="" title="Ver oferta"
                                               data-toggle="modal" data-target="#show-dialog{{$group->id}}"><i
                                                        class="material-icons">find_in_page</i></a>
                                            @if($group->state_id==1)
                                                <a class="btn btn-raised btn-primary btn-xs" href=""
                                                   title="Editar estado" data-toggle="modal"
                                                   data-target="#update-dialog{{$group->id}}"><i
                                                            class="material-icons">mode_edit</i></a>
                                            @else
                                                <a class="btn btn-raised btn-primary btn-xs report" href=""
                                                   title="Editar estado" data-toggle="modal"
                                                   data-target="#update-dialog{{$group->id}}"><i
                                                            class="material-icons">mode_edit</i></a>

                                            @endif
                                        </td>
                                    </tr>
                                    {{--@include('admin/services/show')
                                    @include('admin/services/update')
                                    @include('admin/services/reports')--}}
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12 pagination pg-bluegrey">
                            {!! $groups->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
