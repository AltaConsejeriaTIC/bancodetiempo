@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Ofertas Registrados en el Sistema</h2></div>
					<div class="panel-body">
						@include('partial.errors')
						{!! Form::open(['route' => 'homeAdminServices/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" name="name" >
			        </div>
							<button type="submit" class="btn btn-raised btn-primary" title="Buscar"><i class="material-icons">search</i></button>
							<a href="{{ url('/homeAdminServices') }}" class="btn btn-raised btn-primary" title="Listar Todos"><i class="material-icons">youtube_searched_for</i></a>
						{!! Form::close() !!}
						<div class="col-md-2 form-group navbar-right">
							<span class="label label-success news">Hay {!! $services->total() !!} Ofertas Registradas</span>
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
						      @foreach($services as $service)
						        <tr>
						        	<td>{{ $service->name }}</td>
									<td><p  class="paragraph3">{{ $service->description }}</p></td>
						        	<td>{{ $service->user->first_name." ".$service->user->last_name}}</td>
						        	<td>{{ $service->state->state }}</td>
						        	<td>
										<a class="btn btn-raised btn-primary btn-xs" href="" title="Ver oferta" data-toggle="modal" data-target="#show-dialog{{$service->id}}"><i class="material-icons">find_in_page</i></a>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar estado" data-toggle="modal" data-target="#update-dialog{{$service->id}}"><i class="material-icons">mode_edit</i></a>
										<a class="btn btn-raised btn-primary btn-xs" href="" title="Ver reportes" data-toggle="modal" data-target="#reports-dialog{{$service->id}}"><i class="material-icons">error_outline</i></a>
									</td>
						        </tr>
								@include('admin/services/show')
								@include('admin/services/update')
								@include('admin/services/reports')
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
@endsection