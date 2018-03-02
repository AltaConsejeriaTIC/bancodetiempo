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
            <h4>Historial donaciones a campañas</h4>
            <div class="box box-block bg-white">
                <h5 class="mb-1">Donaciones Campañas</h5>

                <div class="row">
                    <div class="col-3 form-group">

                    </div>
                    <div class="col-7 text-right">
                        <button type="button" class="fa fa-download btn btn-info" onClick='download();busqueda();'></button>
                    </div>
                    <div class="col-2">
                        <p class="btn btn-outline-success">
                            Total: {!! $history->total() !!}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
							<table class="table table-striped table-bordered dataTable" id="table-services">
							  <thead>
							  	<tr>
								    <th>Donador</th>
							  	    <th>Campaña</th>
                                    <th>Dorados</th>
                                    <th>Fecha</th>
							  	</tr>
							  	<tr>
                                    <th rowspan="1" colspan="1">
                                        <input type="text" class="form-control control" placeholder="Donador" name='donor' value="{{Request::get('donor')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <input type="text" class="form-control control" placeholder="Campaña" name="campaign" value="{{Request::get('campaign')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <input type="text" class="form-control control" placeholder="Dorados" name='credits' value="{{Request::get('credits')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <input class="form-control" type="text" name="fecha" id="rango-fecha" value="{{App\Helpers::rangoFecha(Request::get('fecha'))}}">
                                    </th>

                                </tr>
						    </thead>
						    <tbody>

						      @foreach($history as $donation)
						        <tr data-service='{{$donation->id}}'>
						        	<td>{{ $donation->donor->first_name." ".$donation->donor->last_name }}</td>
						        	<td>{{ $donation->campaign->name }}</td>
						        	<td>{{ $donation->credits }}</td>
						        	<td>{{ date("d/m/Y", strtotime($donation->created_at)) }}</td>
						        </tr>

							  @endforeach
						    </tbody>
						  </table>

						</div>
						<div class="col-md-12 pagination pg-bluegrey">
				           <input type="hidden" class="" name="page" value="{{Request::get('page')}}">
					       <input type="hidden" class="control" name="fecha" id="rangoFecha" value="{{Request::get('fecha')}}">
					       <input type="hidden" class="control" name="download" id="download" value="">
							{!! $history->appends(["donor" => Request::get('donor'), "campaign" => Request::get('campaing'), "credits" => Request::get('credits'), "fecha" => Request::get('fecha')])->render('vendor.pagination.bootstrap-4') !!}
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
