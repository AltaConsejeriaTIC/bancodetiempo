@extends('layouts.appColegios')

@section('estilos')

<link rel='stylesheet' href='/css/fullcalendar.css' />

@endsection

@section('script')

<script src='/js/jquery.min.js'></script>
<script src='/js/moment.min.js'></script>
<script src='/js/fullcalendar.js'></script>
<script src='/js/es.js'></script>
<script>
	jQuery(document).ready(function(){

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

<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			aspectRatio: 2,
			navLinks: true,
			eventLimit: true,
			events: [
			@foreach($campaigns as $campaign)
			{
				title: '{{$campaign->name}}',
				start: '{{ date("Y-m-d", strtotime($campaign->date)) }}'
			},
			@endforeach
			]
		})
	});
	$('#calendar').fullCalendar('option', 'height', 100);
</script>

@endsection

@section('content')

@include('colegios.navStudent')
<div class="my-campaigns bg-light-gray">
	<div class="container pt-5">
		<h4><b>Mis campañas</b></h4>
		<p>Puedes ver a que campañas estas inscrito y cancelar en cualquier momento la inscripción</p>
		<div class="row">
			@if(session()->has('msg'))
			<div class="col-12 alert-success py-2" hide-in='5000'>
				{{session("msg")}}
			</div>
			@endif
		</div>
		<nav class="mt-4">
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-inscribed-tab" data-toggle="tab" href="#nav-inscribed" role="tab" aria-controls="nav-inscribed" aria-selected="true">Inscritas</a>
				<a class="nav-item nav-link" id="nav-calendar-tab" data-toggle="tab" href="#nav-calendar" role="tab" aria-controls="nav-calendar" aria-selected="false">Calendario</a>
			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active pt-3" id="nav-inscribed" role="tabpanel" aria-labelledby="nav-inscribed-tab">
				<div class="row">
					@foreach($campaigns as $campaign)
					<div class='col-lg-6 mb-3'>
						@include('colegios/campaignBox')
						<button type="button" class="btn btn-danger" data-target="#modal_cancelar_inscripcion" data-toggle="modal" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}'>Cancelar inscripción</button>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade pt-4" id="nav-calendar" role="tabpanel" aria-labelledby="nav-calendar-tab">
				<div id='calendar'></div>
			</div>
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

@include("footer")

@endsection
