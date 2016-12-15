@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Usarios</h2></div>
					<div class="panel-body">
						{!! Form::open(['route' => 'admin/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}           
							<div class="form-group">
								<label for="exampleInputName2">Nombre</label>
								<input type="text" class="form-control" name = "nombre" >
			        </div>
							<button type="submit" class="btn btn-primary">Buscar</button>
							<a href="{{ route('admin.index') }}" class="btn btn-primary">Todos</a>
							<a href="{{ route('admin.create') }}" class="btn btn-success">Crear</a>
						{!! Form::close() !!}

						<div class="navbar-right">
						  <span class="label label-info news">Hay {!! $users->total() !!} Usuarios Registrados</span>         
						</div>

						<table class="table table-condensed table-striped table-bordered">
						  <thead>
						  	<tr>
						  	  <th>Nombres</th>
						  	  <th>Apellidos</th>
						  	  <th>Email</th>
						  	  <th>Estado</th>
						  	  <th>Rol</th>			  	  
						  	  <th>Acción</th>
						  	</tr>
					    </thead>
					    <tbody>
					      @foreach($users as $user)
					        <tr>
					        	<td>{{ $user->first_name }}</td>
					        	<td>{{ $user->last_name }}</td>
					        	<td>{{ $user->email }}</td>
					        	<td>{{ $user->state }}</td>
					        	<td>{{ $user->role_id }}</td>
					        	<td>
					        		<a class="btn btn-primary btn-xs" href="{{ route('admin.edit',['id' => $user->id] )}}" >Editar</a>        		
					        	</td>                 
					        </tr>
					      @endforeach
					    </tbody>         
					  </table>
						<div class="pager">             
							{!! $users->render() !!}         
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection