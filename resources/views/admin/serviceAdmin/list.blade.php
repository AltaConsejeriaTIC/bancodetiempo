@extends('layouts.appAdmin')

@section('content')

<div class="py-1 px-3">
    @include('admin.partial.errors')

    <div class="content-area py-1">
                <div class="container-fluid">
                    <h4>Lista de Ofertas Registrados en el Sistema</h4>
                    <div class="box box-block bg-white">
                        <h5 class="mb-1">Ofertas</h5>

                        <div class="row">
                            <div class="col-3 form-group">

                            </div>
                            <div class="col-7 text-right">

                            </div>
                            <div class="col-2">
                                <p class="btn btn-outline-success">
                                    Total: {!! $services->total() !!}
                                </p>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered dataTable" id="table-users" role="grid" aria-describedby="table-3_info">
                                <thead>
                                    <tr role="row">
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Propietario</th>
                                        <th>Estado</th>
                                        <th>Fecha creación</th>
                                    <tr>
                                        <th rowspan="1" colspan="1">
                                            <input type="text" class="form-control control" placeholder="Nombres" name='name' value="{{Request::get('name')}}">
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <input type="text" class="form-control control" placeholder="Descripcion" name="description" value="{{Request::get('description')}}">
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <input type="text" class="form-control control" placeholder="Propietario" name='creator' value="{{Request::get('creator')}}">
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <select name="state" id="state" class="form-control control">
                                                <option value=""></option>
                                                <option value="1" @if(Request::get('state') == 1) selected @endif>Activo</option>
                                                <option value="2" @if(Request::get('state') == 2) selected @endif>Inactivo</option>
                                                <option value="3" @if(Request::get('state') == 3) selected @endif>Bloqueado</option>
                                            </select>
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <input class="form-control" type="text" name="fecha" id="rango-fecha" value="{{App\Helpers::rangoFecha(Request::get('fecha'))}}">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr data-user='{{$service->id}}'>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>{{ $service->user->first_name." ".$service->user->last_name }}</td>
                                        <td>{{ $service->state->state }}</td>
                                        <td>{{ $service->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                     <input type="hidden" class="" name="page" value="{{Request::get('page')}}">
                     <input type="hidden" class="control" name="fecha" id="rangoFecha" value="{{Request::get('fecha')}}">
                     <input type="hidden" class="control" name="download" id="download" value="">
                    <div class="col-12 pagination pg-bluegrey">
                        {!! $services->appends(["tipo" => Request::get('tipo'), "name" => Request::get('name'),"lastName" => Request::get('lastName'), "email" => Request::get('email'), "state" => Request::get('state')])->render('vendor.pagination.bootstrap-4') !!}
                    </div>

                </div>
    </div>


</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Ofertas Registrados en el Sistema</h2></div>
					<div class="panel-body">

						<button type="button" class="btn btn-raised btn-primary" title="Crear Servicio"  data-toggle="modal" data-target="#NewService">Crear nuevo</button>
						<div class="col-md-2 form-group navbar-right">
							<span class="label label-success news">Hay {!! $services->total() !!} Ofertas Registradas</span>
						</div>
						<div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
                                    <th>Nombre</th>
                                    <th>Description</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
							  	</tr>
						    </thead>
						    <tbody>
						         @foreach($services as $service)
                                    <tr>
                                         <td>{{$service->name}}</td>
                                         <td>{{$service->description}}</td>
                                         <td>{{$service->state->state}}</td>
                                         <td><button type="button" class="btn btn-raised btn-primary" title="Editar Servicio"  @click='myData.editService{{$service->id}} = true'>Editar</button></td>

                                    </tr>
						         @endforeach
						    </tbody>
						  </table>

						</div>
						<div class="col-md-12 pagination pg-bluegrey">
							{!! $services->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@foreach($services as $service)
     {!! Form::open(['url' => 'admin/service/update', 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'form', 'form-validation']) !!}
         @include("admin/serviceAdmin/partial/edit")
     {!! Form::close() !!}
@endforeach
{!! Form::open(['url' => 'admin/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation']) !!}
	  <newservice :categories='this.myData.categories' :tags-service='this.myData.tags'></newservice>
{!! Form::close() !!}

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

@endsection



