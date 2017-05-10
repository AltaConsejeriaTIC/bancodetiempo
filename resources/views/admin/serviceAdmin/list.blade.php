@extends('layouts.appAdmin')

@section('content')
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



