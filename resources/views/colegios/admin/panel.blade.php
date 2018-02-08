@extends('layouts.appColegios')
@section('content')

@include('colegios.navAdmin')
<div class="panel">
	<div class="container">
		<div class="row py-5">
			<div class="col-12">   
				<h4>Nuevas Campañas</h4>
				<p>Selecciona las campañas que quieras que tus estudiantes vean para inscribirse</p>
			</div>

			@if(session()->has('msg'))
			<div class="col-12 alert-success py-2" hide-in='5000'>
				{{session("msg")}}
			</div>
			@endif

			<div class="col-12">
				<div class="row">
					<div class="col-12">
						<ul class="nav" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link @if(is_null(Request::get('tab'))) active @endif @if(Request::get('tab') == 'todas') active @endif" id="home-tab" data-toggle="tab" href="#todas" role="tab" aria-controls="todas" aria-selected="true">Todas</a>
							</li>
							<li class="nav-item">
								<a class="nav-link @if(Request::get('tab') == 'habilitadas') active @endif" id="profile-tab" data-toggle="tab" href="#habilitadas" role="tab" aria-controls="habilitadas" aria-selected="false">Habilitadas</a>
							</li>
							<li class="nav-item  @if(Request::get('tab') == 'inhabilitadas') active @endif">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#inhabilitadas" role="tab" aria-controls="inhabilitadas" aria-selected="false">Inhabilitadas</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade @if(is_null(Request::get('tab'))) show active @endif  @if(Request::get('tab') == 'todas') show active @endif" id="todas" role="tabpanel" aria-labelledby="todas-tab">
								<div class="row">
									@foreach($todas as $campaign)
									<div class='col-12 col-md-6'>
										@include("colegios/partial/buttonsCampaign")
										@include('colegios/campaignBox')
									</div>
									@endforeach
								</div>
								<div class="row">
									<div class="col-12">
										{{$todas->appends(["tab" => "todas"])->render("pagination::bootstrap-4")}}
									</div>
								</div>
							</div>
							<div class="tab-pane fade  @if(Request::get('tab') == 'habilitadas') show active @endif" id="habilitadas" role="tabpanel" aria-labelledby="habilitadas-tab">
								<div class="row">
									@foreach($enabled as $campaign)
									<div class='col-12 col-md-6'>
										@include("colegios/partial/buttonsCampaign")
										@include('colegios/campaignBox')
									</div>
									@endforeach
								</div>
								<div class="row">
									<div class="col-12">
										{{$enabled->appends(["tab" => "habilitadas"])->render("pagination::bootstrap-4")}}
									</div>
								</div>
							</div>
							<div class="tab-pane fade  @if(Request::get('tab') == 'inhabilitadas') show active @endif" id="inhabilitadas" role="tabpanel" aria-labelledby="inhabilitadas-tab">
								<div class="row">
									@foreach($disabled as $campaign)
									<div class='col-12 col-md-6'>
										@include("colegios/partial/buttonsCampaign")
										@include('colegios/campaignBox')
									</div>
									@endforeach
								</div>
								<div class="row">
									<div class="col-12">
										{{$disabled->appends(["tab" => "inhabilitadas"])->render("pagination::bootstrap-4")}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@include("footer")
@endsection