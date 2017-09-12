@extends('layouts.appAdmin')

@section('content')

    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Historial donaciones a campañas</h2></div>
					<div class="panel-body">
						{!! Form::open(['url' => 'historyDonations', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                                <table>
                                    <tr>
                                        <td><input type="text" name="findDonor" class="form-control" placeholder='Buscar Donador' value='{{ Request::get("findDonor") }}'></td>
                                        <td><input type="text" name="findCampaign" class="form-control" placeholder='Buscar Campaña' value='{{ Request::get("findCampaign") }}'></td>
                                        <td><button type="submit" class="btn btn-raised btn-primary" title="Buscar"><i class="material-icons">search</i></button></td>
                                        <td>
                                        <a href='/historyDonations?findDonor={{ Request::get("findDonor") }}&findCampaign={{ Request::get("findCampaign") }}&download=true' class="btn btn-raised btn-primary" title="Descargar excel"><i class="material-icons">cloud_download</i></a></td>
                                    </tr>
                                </table>
                        {!! Form::close() !!}
						<div class="col-md-2 form-group navbar-right">
							<span class="label label-success news">Hay {!! $history->total() !!} Donaciones</span>
						</div>
						<div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
                                    <th>Donador</th>
                                    <th>Campaña</th>
                                    <th>Dorados</th>
							  	</tr>
						    </thead>
						    <tbody>
						      @foreach($history as $report)
						        <tr>
						        	<td>{{$report->donor->first_name . " " . $report->donor->last_name}}</td>
						        	<td>{{$report->campaign->name}}</td>
						        	<td>{{$report->credits}}</td>
						        </tr>
							  @endforeach
						    </tbody>
						  </table>

						</div>
						<div class="col-md-12 pagination pg-bluegrey">
							{!! $history->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
