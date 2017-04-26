@extends('layouts.appAdmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de tratos Registrados en el Sistema</h2></div>
					<div class="panel-body">
						{!! Form::open(['route' => 'homeAdminCategory/show', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
							<a href='/admin/deal/download' class="btn btn-raised btn-primary" title="Descargar excel"><i class="material-icons">cloud_download</i></a></td>
						{!! Form::close() !!}

						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $deals->total() !!} tratos Registradas</span>
						</div>

						<div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
							  	  <th>Servicio</th>
							  	  <th>Demandante</th>
							  	  <th>Ofertante</th>
							  	  <th>Fecha</th>
							  	</tr>
						    </thead>
						    <tbody>
						      @foreach($deals as $deal)
                                <tr v-on:click='myData.deal{{$deal->id}} = true'>
                                    <td>{{$deal->service->name}}</td>
                                    <td>{{$deal->user->first_name." ".$deal->user->last_name}}</td>
                                    <td>{{$deal->service->user->first_name." ".$deal->service->user->last_name}}</td>
                                    <td>{{$deal->date}}</td>
                                </tr>
                                @include("admin/deals/partial/details")
						      @endforeach
						    </tbody>
						  </table>
						</div>

						<div class="col-md-12 pagination">
							{!! $deals->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
