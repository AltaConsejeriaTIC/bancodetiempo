@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Usuarios Registrados en el Sistema</h2></div>
					<div class="panel-body">
						@include('partial.errors')
						{!! Form::open(['route' => 'adminUser/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}           
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" name="name" >
			        </div>
							<button type="submit" class="btn btn-raised btn-primary" title="Buscar"><i class="material-icons">search</i></button>
							<a href="{{ url('/homeAdminUser') }}" class="btn btn-raised btn-primary" title="Listar Todos"><i class="material-icons">youtube_searched_for</i></a>
							<a href="" class="btn btn-raised btn-success" title="Nuevo Usuario Administrador" data-toggle="modal" data-target="#new-dialog"><i class="material-icons">add</i></a>							
						{!! Form::close() !!}

						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $users->total() !!} Usuarios Registrados</span>         
						</div>

						<div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
							  	  <th>Nombres</th>
							  	  <th>Apellidos</th>
							  	  <th>Email</th>
							  	  <th>Estado</th>
							  	  <th>Rol</th>		
							  	  <th>Fecha/Hora Creación</th>		
							  	  <th>Fecha/Hora Actualización</th>		
							  	  <th>Acción</th>
							  	</tr>
						    </thead>
						    <tbody>
						      @foreach($users as $user)
						        <tr>
						        	<td>{{ $user->first_name }}</td>
						        	<td>{{ $user->last_name }}</td>
						        	<td>{{ $user->email }}</td>
						        	<td>{{ $user->state == 1 ? 'Activo' : 'Inactivo' }}</td>
						        	<td>{{ $user->role->category }}</td>
						        	<td>{{ $user->created_at }}</td>
						        	<td>{{ $user->updated_at }}</td>
						        	<td>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar Usuario" data-toggle="modal" data-target="#update-dialog{{$user->id}}"><i class="material-icons">mode_edit</i></a>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Más Detalles" data-toggle="modal" data-target="#show-dialog{{$user->id}}"><i class="material-icons">find_in_page</i></a>						        		
						        	</td>                 
						        </tr>
										@include('admin/users/update')
										@include('admin/users/show')
						      @endforeach
						    </tbody>         
						  </table>						
						</div>						
						@include('admin/users/new')
						<div class="col-md-12 pagination pg-bluegrey">             
							{!! $users->render() !!}         
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection