@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Contenidos administrables en el Sistema</h2></div>
					<div class="panel-body">
						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $contents->total() !!} Contenidos Registradas</span>
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
							@foreach($contents as $cont)
								<tr>
									<td>{{ $cont->name }}</td>
									<td>
										<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar Contenido" data-toggle="modal" data-target="#update-dialog{{$cont->id}}"><i class="material-icons">mode_edit</i></a>
									</td>
								</tr>
								@include('admin/contents/update')
							@endforeach
						    </tbody>         
						  </table>						
						</div>
						<div class="col-md-12 pagination">             
							{!! $contents->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 



@endsection
