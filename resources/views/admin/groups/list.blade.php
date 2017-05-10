@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Lista de Grupos Registrados en el Sistema</h2></div>
                    <div class="panel-body">
                        @include('partial.errors')

                        <div class="col-md-2 form-group navbar-right">
                            <span class="label label-success news">Hay {!! $groups->total() !!}
                                Grupos Registrados</span>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Description</th>
                                    <th>Administrador</th>
                                    <th>Estado</th>
                                    <th>Fecha creacion</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <tr>
                                    {!! Form::open(['url' => 'listGroups', 'method' => 'post', 'novalidate', 'id' => 'filter']) !!}
                                        <td><input type="text" name="filterName" style='width:100px' value='{{request("filterName")}}'></td>
                                        <td></td>
                                        <td><input type="text" name="filterAdmin" style='width:150px' value='{{request("filterAdmin")}}'></td>
                                        <td>
                                           <select style='width:100px' name="filterState" onChange='jQuery("#filter").submit()'>
                                                <option value=""></option>
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}" @if(request("filterState") == $state->id) selected @endif >{{$state->state}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="row">
                                           <div class="col-md-9">
                                                <span>Fecha inicio</span>
                                                <input type="text" class="col-md-12 not-margin not-padding datepick" name="filtrerDateCreateStart" value="{{request('filtrerDateCreateStart')}}">
                                                <span>Fecha fin</span>
                                                <input type="text" class="col-md-12 not-margin not-padding datepick" name="filtrerDateCreateFinish" value="{{request('filtrerDateCreateFinish')}}">
                                           </div>

                                            <i class="material-icons col-md-1" onclick="jQuery('#orderCreate').val(@if(request('orderDateCreate') == 'desc') 'asc' @else 'desc' @endif); jQuery('#filter').submit()">swap_vert</i>
                                            <input type="hidden" name='orderDateCreate' id='orderCreate' value="{{request('orderDateCreate')}}">
                                        </td>
                                      <td>
                                          <button type="submit" class="btn btn-raised btn-primary btn-xs"><i class="material-icons">search</i></button>
                                          <input type="hidden" name="download" value='0' id='download'>
                                          <button type="submit" class="btn btn-raised btn-primary btn-xs" onclick='jQuery("#download").val(1);'>
                                                <i class="material-icons">cloud_download</i>
                                            </button>
                                      </td>
                                    {!! Form::close() !!}
                                  </tr>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
                                        <td><p class="paragraph3">{{ $group->description }}</p></td>
                                        <td>{{ $group->admin->first_name." ".$group->admin->last_name}}</td>
                                        <td>{{ $group->state->state}}</td>
                                        <td>{{ $group->created_at }}</td>
                                        <td>
                                            <a class="btn btn-raised btn-primary btn-xs" href="" title="Ver detalle"
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

@foreach($groups as $group)
    @include('admin/groups/show')
    @include('admin/groups/update')
@endforeach
@endsection
