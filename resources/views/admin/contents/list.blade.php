@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Contenidos administrables en el Sistema</h2></div>
					<div class="panel-body">
						@include('partial.errors')
						{!! Form::open(['route' => 'homeAdminCategory/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}           
							<div class="form-group">
								<label>Categddoría</label>
								<input type="text" class="form-control" name="category" >
			        </div>
							<button type="submit" class="btn btn-raised btn-primary" title="Buscar"><i class="material-icons">search</i></button>
							<a href="{{ url('/adminUserContents') }}" class="btn btn-raised btn-primary" title="Listar Todos"><i class="material-icons">youtube_searched_for</i></a>
						{!! Form::close() !!}

						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $categories->total() !!} Categorías Registradas</span>         
						</div>

						<div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
							  	  <th>Categoría</th>							  	  
							  	  <th>Acción</th>
							  	</tr>
						    </thead>
						    <tbody>
						      @foreach($categories as $category)
						        <tr>
						        	<td>{{ $category->category }}</td>						        	
						        	<td>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar Categoría" data-toggle="modal" data-target="#update-dialog{{$category->id}}"><i class="material-icons">mode_edit</i></a>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Más Detalles" data-toggle="modal" data-target="#show-dialog{{$category->id}}"><i class="material-icons">find_in_page</i></a>						        		
						        	</td>                 
						        </tr>
										@include('admin/categories/update')
										@include('admin/categories/show')
						      @endforeach
						    </tbody>         
						  </table>						
						</div>						
						@include('admin/categories/new')
						<div class="col-md-12 pagination">             
							{!! $categories->render() !!}         
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection