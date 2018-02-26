@extends('layouts.appAdmin')
@section('estilos')
    <link rel="stylesheet" href="/css/lib/daterangepicker.css">
    <link rel="stylesheet" href="/css/lib/bootstrap-datepicker.min.css">
@endsection
@section('script')
    <script src="/js/lib/bootstrap-datepicker.min.js"></script>
    <script src="/js/lib/moment.js"></script>
    <script src="/js/lib/daterangepicker.js"></script>
    <script>
        var token = "{{ csrf_token() }}";
    </script>
    <script src="/js/admin/service.js"></script>
@endsection
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
                        Tipo usuario:
                        <select name="tipo" id="tipo" class="form-control control">
                            <option value="">Todos</option>
                            <option value="1" @if(Request::get('tipo') == 1) selected @endif>Personas</option>
                            <option value="2" @if(Request::get('tipo') == 2) selected @endif>Grupos</option>
                        </select>
                    </div>
                    <div class="col-7 text-right">
                        <button type="button" class="fa fa-download btn btn-info" onClick='download();busqueda();'></button>
                    </div>
                    <div class="col-2">
                        <p class="btn btn-outline-success">
                            Total: {!! $services->total() !!}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
							<table class="table table-striped table-bordered dataTable" id="table-services">
							  <thead>
							  	<tr>
								    <th>Nombre</th>
							  	    <th>Description</th>
                                    <th>Propietario</th>
                                    <th>Estado</th>
                                    <th>Tratos realizados</th>
                                    <th>Fecha creación</th>
							  	</tr>
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
                                    <th>
                                        <input type="number" class="form-control control" placeholder="Tratos" name='deals' value="{{Request::get('deals')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <input class="form-control" type="text" name="fecha" id="rango-fecha" value="{{App\Helpers::rangoFecha(Request::get('fecha'))}}">
                                    </th>
                                </tr>
						    </thead>
						    <tbody>

						      @foreach($services as $service)
						        <tr data-service='{{$service->id}}'>
						        	<td>{{ $service->name }}</td>
									<td><p>{{ str_limit($service->description, 50) }}</p></td>
						        	<td>{{ $service->user->first_name." ".$service->user->last_name}}</td>
						        	<td>{{ $service->state->state }}</td>
						        	<td>{{ $service->deals->where("state_id", 10)->count() }}</td>
						        	<td>{{ $service->created_at }}</td>
						        </tr>

							  @endforeach
						    </tbody>         
						  </table>

						</div>
						<div class="col-md-12 pagination pg-bluegrey">
				           <input type="hidden" class="" name="page" value="{{Request::get('page')}}">
					       <input type="hidden" class="control" name="fecha" id="rangoFecha" value="{{Request::get('fecha')}}">
					       <input type="hidden" class="control" name="download" id="download" value="">
							{!! $services->render() !!}
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.services.show')
@endsection
