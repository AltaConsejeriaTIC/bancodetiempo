@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Ofertas Registrados en el Sistema</h2></div>
					<div class="panel-body">
						@include('admin.partial.errors')
				        <a href="{{ url('/homeAdminServices/reported') }}" class="btn btn-raised btn-primary" title="Listar Reportados">Reportados</a>
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
                                    <th>Fecha creación</th>
                                    <th>Acción</th>
							  	</tr>
						    </thead>
						    <tbody>
                                <tr>
                                    {!! Form::open(['route' => 'homeAdminServices', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                                        <td><input type="text" name="findName"></td>
                                        <td></td>
                                        <td><input type="text" name="findUser"></td>
                                        <td></td>
                                        <td>
                                            <span>Fecha inicio</span><br>
                                            <input type="text" class="col-md-12 not-margin not-padding datepick" name="findDateCreateStart" value="">
                                            <span>Fecha fin</span><br>
                                            <input type="text" class="col-md-12 not-margin not-padding datepick" name="findDateCreateFinish" value="">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-raised btn-primary btn-xs"><i class="material-icons">search</i></button>
                                        </td>
                                    {!! Form::close() !!}
                                </tr>
						      @foreach($services as $service)
						        <tr>
						        	<td>{{ $service->name }}</td>
									<td><p  class="paragraph3">{{ str_limit($service->description, 20) }}</p></td>
						        	<td>{{ $service->user->first_name." ".$service->user->last_name}}</td>
						        	<td>{{ $service->state->state }}</td>
						        	<td>{{ $service->created_at }}</td>
						        	<td>
										<a class="btn btn-raised btn-primary btn-xs" href="" title="Ver oferta" data-toggle="modal" data-target="#show-dialog{{$service->id}}"><i class="material-icons">find_in_page</i></a>
										@if($service->state_id==1)
											<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar estado" data-toggle="modal" data-target="#update-dialog{{$service->id}}"><i class="material-icons">mode_edit</i></a>
										@else
											<a class="btn btn-raised btn-primary btn-xs report" href="" title="Editar estado" data-toggle="modal" data-target="#update-dialog{{$service->id}}"><i class="material-icons">mode_edit</i></a>

										@endif
										@if(count($service->reports)==0)
											<a class="btn btn-raised btn-primary btn-xs" href="" title="Ver reportes" data-toggle="modal" data-target="#reports-dialog{{$service->id}}"><i class="material-icons">error_outline</i></a>
										@else
											<a class="btn btn-raised btn-primary btn-xs report" href="" title="Ver reportes" data-toggle="modal" data-target="#reports-dialog{{$service->id}}"><i class="material-icons">error_outline</i></a>

										@endif
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
