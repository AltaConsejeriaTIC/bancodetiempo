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
            <h4>Lista de tratos realizados</h4>
            <div class="box box-block bg-white">
                <h5 class="mb-1">Tratos</h5>

                <div class="row">
                    <div class="col-3 form-group">

                    </div>
                    <div class="col-7 text-right">
                        <button type="button" class="fa fa-download btn btn-info" onClick='download();busqueda();'></button>
                    </div>
                    <div class="col-2">
                        <p class="btn btn-outline-success">
                            Total: {!! $deals->total() !!}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
							  	  <th>Servicio</th>
							  	  <th>Demandante</th>
							  	  <th>Tipo Demandante</th>
							  	  <th>Ofertante</th>
							  	  <th>Tipo Ofertante</th>
							  	  <th>Categoria</th>
							  	  <th>Estado</th>
							  	  <th>Fecha</th>
							  	</tr>
							  	<tr>
                                    <th rowspan="1" colspan="1">
                                        <input type="text" class="form-control control" placeholder="Nombres" name='name' value="{{Request::get('name')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <input type="text" class="form-control control" placeholder="Demandante" name='applicant' value="{{Request::get('applicant')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <select name="typeApplicant" id="typeApplicant" class="form-control control">
                                            <option value="">Todos</option>
                                            <option value="1" @if(Request::get('typeApplicant') == 1) selected @endif>Persona</option>
                                            <option value="2" @if(Request::get('typeApplicant') == 2) selected @endif>Grupo</option>on>
                                        </select>
                                    <th rowspan="1" colspan="1">
                                        <input type="text" class="form-control control" placeholder="Ofertante" name='ofertant' value="{{Request::get('ofertant')}}">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <select name="typeOfertant" id="typeOfertant" class="form-control control">
                                            <option value="">Todos</option>
                                            <option value="1" @if(Request::get('typeOfertant') == 1) selected @endif>Persona</option>
                                            <option value="2" @if(Request::get('typeOfertant') == 2) selected @endif>Grupo</option>on>
                                        </select>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <select name="category" id="category" class="form-control control">
                                            <option value=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if(Request::get('category') == $category->id) selected @endif>{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <select name="state" id="state" class="form-control control">
                                            <option value=""></option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}" @if(Request::get('state') == $state->id) selected @endif>{{$state->state}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <input class="form-control" type="text" name="fecha" id="rango-fecha" value="{{App\Helpers::rangoFecha(Request::get('fecha'))}}">
                                    </th>
                                </tr>
						    </thead>
						    <tbody>
						      @foreach($deals as $deal)
                                <tr>
                                    <td>{{$deal->service->name}}</td>
                                    <td>{{$deal->user->first_name." ".$deal->user->last_name}}</td>
                                    <td>{{$deal->user->group == 1 ? "Grupo" : "Persona"}}</td>
                                    <td>{{$deal->service->user->first_name." ".$deal->service->user->last_name}}</td>
                                    <td>{{$deal->service->user->group == 1 ? "Grupo" : "Persona"}}</td>
                                    <td>{{$deal->service->category->category}}</td>
                                    <td>{{$deal->state->state}}</td>
                                    <td>{{$deal->date}}</td>
                                    <td></td>
                                </tr>
						      @endforeach

						    </tbody>
						  </table>
						 </div>
						<div class="col-md-12 pagination pg-bluegrey">
				           <input type="hidden" class="" name="page" value="{{Request::get('page')}}">
					       <input type="hidden" class="control" name="fecha" id="rangoFecha" value="{{Request::get('fecha')}}">
					       <input type="hidden" class="control" name="download" id="download" value="">
							{!! $deals->appends(["name" => Request("name"), "typeApplicant" => Request("typeApplicant"), "applicant" => Request("applicant"), "state" => Request("state"), "ofertant" => Request("ofertant"), "fecha" => Request("fecha"), "typeOfertant" => Request("typeOfertant"), "category" => Request("category")])->render('vendor.pagination.bootstrap-4') !!}
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
