@extends('layouts.appColegios')

@section('metas')

<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="{{$campaign->name}}"/>
<meta property="og:description" content="{{$campaign->description}}"/>
<meta property="og:image" content="{{url('/')}}/{{$campaign->image}}"/>
<script>
	function shareFb(url) {
		FB.ui({
			method: 'share',
			display: 'popup',
			href: url
		}, function (response) {
			console.log(response);
		});
	}
</script>

@endsection

@section('script')

<script>
	jQuery(document).ready(function(){
		jQuery('#modal_inscripcion').on('show.bs.modal', function (event) {
			var button = jQuery(event.relatedTarget)
			var campaign = button.data('campaign');
			var name = button.data('name');
			var modal = jQuery(this)
			modal.find('#campaign_name').text(name)
			modal.find('#campaign_id').val(campaign)
		})
		jQuery('#modal_cancelar_inscripcion').on('show.bs.modal', function (event) {
			var button = jQuery(event.relatedTarget)
			var campaign = button.data('campaign');
			var name = button.data('name');
			var modal = jQuery(this)
			modal.find('#campaign_name').text(name)
			modal.find('#campaign_id').val(campaign)
		})
	})
</script>

@endsection

@section('content')

@if(Auth::user()->role_id == 1)
    @include('colegios.navAdmin')
@else
    @include('colegios.navStudent')
@endif
<div class="container campaign-detail pt-5">
	<div class="row">
		<div class="col-sm-8">
			<div style="background-image: url(/{{$campaign->image}});" class="campaign-photo text-center">
			</div>
			<div class="row">
				<div class="col-10">
					<h3 class="font-weight-bold mt-3">{{$campaign->name}}</h3>
				</div>
				<div class="col-1 mt-4">
				    @if(Auth::user()->role_id == 1)
					    @include("colegios/partial/buttonsCampaign")
					@endif
				</div>
			</div>
			@if($campaign->allows_registration == 0)
			<h6 class="state"><b>Estado: </b><span>En periodo de pre-inscripción y/o donaciones</span></h6>
			@else
			@if($campaign->state_id == 1)
			<h6 class="state"><b>Estado: </b><span>En periodo de inscripciones</span></h6>
			@else
			<h6 class="state"><b>Estado: </b><span>Finalizada</span></h6>
			@endif
			@endif
			<p class="mt-4">{{$campaign->description}}</p>
			<p class="mt-4"><b>Fecha: </b>{{date("F j Y", strtotime($campaign->date))}}</p>
			<p><b>Hora: </b>{{date("g:i a", strtotime($campaign->date))}}</p>
			@if($campaign->location != '')
			@php
			$coordinates = json_decode($campaign->coordinates);
			@endphp
			@if($campaign->coordinates == '')
			<p><b>Lugar: </b>{{$campaign->location}}</p>
			@else
			<p><b>Lugar: </b><a href="http://maps.google.com/?q={{$coordinates->lat}},{{$coordinates->lng}}" target="_blank">{{$campaign->location}}</a></p>
			@endif
			@endif
			<p class="mt-5 c-dark-blue"><b>Esta campaña equivale a:</b></p>
			<img class="d-inline-block" src="/images/moneda.png">
			<p class="c-dark-blue d-inline-block"><b> 2 Horas</b></p>
			<div class="d-none d-sm-block">
				<hr>
				@if(Auth::check())
				<div class="text-muted" v-if='{{Auth::check()}}'>
					<h6>
						<a href="" title="Reportar Contenido" data-toggle="modal" data-target="#update-dialog{{$campaign->id}}" class="text-secondary">
							<i class="fa fa-exclamation-triangle fa-lg d-inline-block mr-3" aria-hidden="true"></i>Reportar Contenido
						</a>
					</h6>
				</div>
				@endif
			</div>
		</div>
		<div class="col-sm-4">
			<div class="text-center">
				<h6 class="c-dark-blue"><b>Organiza</b></h6>
				<div class="row justify-content-center">
					<div class="col-6">
						@include('partial/imageProfile', array('cover' => $campaign->user->avatar, 'id' =>$campaign->user->id, 'border' => '#153557', 'borderSize' => '3'))
					</div>
				</div>
				<h6 class="c-dark-blue"><b>{{$campaign->user->first_name.' '.$campaign->user->last_name}}</b></h6>
			</div>
			<p><small>Amabilidad, respeto y confianza</small></p>
			@for($cont = 1 ; $cont <= 5 ; $cont++)
			@if($cont <= $campaign->user->ranking)
                <i class="fa fa-star fa-2x c-dark-blue" aria-hidden="true"></i>
            @else
                <i class="fa fa-star-o fa-2x c-dark-blue" aria-hidden="true"></i>
			@endif
			@endfor
			<hr>
			<p>{{$campaign->user->aboutMe}}</p>
			@if(Auth::user()->role_id == 2)
                @if($campaign->participants->where('participant_id', Auth::id())->count() == 0)
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" data-target="#modal_inscripcion" data-toggle="modal" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}'>Inscribirme</button>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-danger" data-target="#modal_cancelar_inscripcion" data-toggle="modal" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}'>Cancelar inscripción</button>
                        </div>
                    </div>
                @endif
            @endif


			<div class="d-block d-sm-none">
				<hr>
				@if(Auth::check())
                    <div class="text-muted">
                        <h6>
                            <a href="" title="Reportar Contenido" data-toggle="modal" data-target="#update-dialog{{$campaign->id}}" class="text-secondary">
                                <i class="fa fa-exclamation-triangle fa-lg d-inline-block mr-3" aria-hidden="true"></i>Reportar Contenido
                            </a>
                        </h6>
                    </div>
				@endif
			</div>
		</div>
	</div>
</div>
@include("colegios/campaign/report")
<div class="row">
    <div class="col-12">
        @include("footer")
    </div>
</div>
@if(Auth::user()->role_id == 2)
    <div class="modal fade" id="modal_inscripcion" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content py-2">
                <button type="button" class="close text-right px-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form action="/student/inscription" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4 class="text-center">Inscribirme a la campaña</h4>
                        <input type="hidden" class="form-control" id="campaign_id" name="campaign_id">
                        <p class="text-center">¿Deseas <strong>inscribirse</strong> a la campaña<br> "<strong id="campaign_name"></strong>"? </p>
                    </div>
                    <div class="row justify-content-center">
                        <button type='submit' class="btn btn-info bg-cambalachea col-10">Inscribirme</button>
                    </div>
                    <div class="row justify-content-center py-2">
                        <button type="button" class="btn btn-outline-info col-10" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_cancelar_inscripcion" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content py-2">
                <button type="button" class="close text-right px-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form action="/student/unregistration" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4 class="text-center">Cancelar inscripción a la campaña</h4>
                        <input type="hidden" class="form-control" id="campaign_id" name="campaign_id">
                        <p class="text-center">¿Deseas <strong>cancelar la inscripción</strong> a la campaña "<strong id="campaign_name"></strong>"? </p>
                    </div>
                    <div class="row justify-content-center">
                        <button type='submit' class="btn btn-info bg-cambalachea col-10">Cancelar inscripción</button>
                    </div>
                    <div class="row justify-content-center py-2">
                        <button type="button" class="btn btn-outline-info col-10" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@endsection
