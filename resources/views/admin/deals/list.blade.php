@extends('layouts.appAdmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de tratos Registrados en el Sistema</h2></div>
					<div class="panel-body">

						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $deals->total() !!} tratos Registradas</span>
						</div>

						<div class="col-md-12">
						 {!! Form::open(['url' => 'listDeals', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
							  	  <th>Servicio</th>
							  	  <th>Demandante</th>
							  	  <th>Ofertante</th>
							  	  <th>Categoria</th>
							  	  <th>Estado</th>
							  	  <th>Fecha</th>
							  	</tr>
						    </thead>
						    <tbody>


							     <tr>
							        <td><input type="text" name='filterService' value="{{request('filterService')}}" style="width:80px"></td>
							        <td><input type="text" name="filterApplicant" value="{{request('filterApplicant')}}" style="width:80px"></td>
							        <td><input type="text" name="filterOfferer" value="{{request('filterOfferer')}}" style="width:80px"></td>
							        <td></td>
							        <td>
							            <select name="filterState" onchange="jQuery('form').submit()" style="width:80px">
							                <option value=""></option>
							                @foreach($states as $state)
							                    <option value="{{$state->id}}" @if($state->id == request('filterState')) selected @endif>{{$state->state}}</option>
							                @endforeach
							            </select>
							        </td>
							        <td class="row">
                                       <div class="col-md-9">
                                            <span>Fecha inicio</span><br>
                                            <input type="text" class="col-md-12 not-margin not-padding datepick" name="filtrerDateCreateStart" value="{{request('filtrerDateCreateStart')}}">
                                            <span>Fecha fin</span><br>
                                            <input type="text" class="col-md-12 not-margin not-padding datepick" name="filtrerDateCreateFinish" value="{{request('filtrerDateCreateFinish')}}">
                                       </div>

							            <i class="material-icons col-md-1" onclick="jQuery('#orderCreate').val(@if(request('orderDateCreate') == 'desc') 'asc' @else 'desc' @endif); jQuery('form').submit()">swap_vert</i>
							            <input type="hidden" name='orderDateCreate' id='orderCreate' value="{{request('orderDateCreate')}}">
							        </td>
                                    <td>
                                        <button type="submit" class="btn btn-raised btn-primary btn-xs"><i class="material-icons">search</i></button>
                                        <input type="hidden" name="download" value='0' id='download'>
                                        <button type="submit" class="btn btn-raised btn-primary btn-xs" onclick='jQuery("#download").val(1);'>
                                            <i class="material-icons">cloud_download</i>
                                        </button>
                                    </td>
                                </tr>


						      @foreach($deals as $deal)
                                <tr v-on:click='myData.deal{{$deal->id}} = true'>
                                    <td>{{$deal->service->name}}</td>
                                    <td>{{$deal->user->first_name." ".$deal->user->last_name}}</td>
                                    <td>{{$deal->service->user->first_name." ".$deal->service->user->last_name}}</td>
                                    <td>{{$deal->service->category->category}}</td>
                                    <td>{{$deal->dealStates->last()->state->state}}</td>
                                    <td>{{$deal->date}}</td>
                                    <td></td>
                                </tr>
						      @endforeach
						    </tbody>
						  </table>
						  {!! Form::close() !!}
						</div>

						<div class="col-md-12 pagination">
							{!! $deals->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@foreach($deals as $deal)
    @include("admin/deals/partial/details")
@endforeach

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
