@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">

	<div class="conversationBox">

		<div class="head row">

			@if($conversation->applicant_id == Auth::User()->id)

				<div class="col-md-1">
					@include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class='col-md-8'>
					<h1 class='title2 text-white'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</h1>
				</div>

			@else

				<div class="col-md-1">
					@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class='col-md-8'>
					<h1 class='title2 text-white'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</h1>
				</div>
			@endif

		</div>

		<div class='listMessages scrollBottom' >
			<div id='messages' conversation='{{$conversation->id}}'></div>
		</div>

		<div class='responseBox'>
			<sendmessage conversation='{{$conversation->id}}' token='{{ csrf_token() }}' sender='{{Auth::user()->id}}' applicant="{{$conversation->applicant_id}}" deal="{{$dealState ? $dealState->state_id : 0}}">
			</sendmessage>
			{!! Form::open(['url' => '/deal', 'method' => 'post', 'class' => 'form-custom row validation', 'form-validation']) !!}
				<div class="modal fade" id="deal">
			    <div class="modal-box" role="document">
			      <div class="modal-content-box">
			        <div class="modal-wrapper">
			          <div class="modal-container">
			            <div class="modal-header">
			              <button type="button" class="close circle-shape" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			            </div>
			            <div class="modal-header-welcome">
			                <h1 class="title1">Propuesta de acuerdo</h1>
			                <h4>Oferta:</h4>
			            </div>
			          	
			            <div class="modal-body">
			            	<div class="row not-margin">
											<label for="dealDate" class="paragraph10">Fecha de realización del acuerdo</label>
										</div>
										<div class="row not-margin">
											<input type="date" name="dealDate" id="dealDate" placeholder="dd/mm/aaaa">
										</div>
										<div class="row not-margin">
											<label for="dealHour" class="paragraph10">Hora</label>
										</div>
										<div class="row not-margin">
											<input type="time" name="dealHour" id="dealHour" placeholder="hh:mm">
										</div>
										<div class="row not-margin">
											<label for="dealLocation" class="paragraph10">Lugar</label>
										</div>
										<div class="row not-margin">																
											<input type="text" name="dealLocation" id="place" placeholder="Parque Simón Bolivar" size="60" />
										</div>
										<div class="row not-margin">
											<div id="map_canvas" class="map"></div>
			              </div>
			              <div class="row not-margin">

			              </div>
										<div class="row not-margin">
											<label class="paragraph10">Tiempo de duración de la actividad que estás ofertando</label>
										</div>
										<div class="row not-margin">
											<div class="col-xs-6 col-sm-6">
												<input type="radio" name="valueService" value="1" id="time1" class="circle validation" data-validations='["required"]'>
												<label for="time1">1 Hora</label>
											</div>
											<div class="col-xs-6 col-sm-6">
												<input type="radio" name="valueService" value="2" id="time2" class="circle validation" data-validations='["required"]'>
												<label for="time2">2 Horas</label>
											</div>
										</div>
										<div class="row not-margin">
											<div class="col-xs-6 col-sm-6">
												<input type="radio" name="valueService" value="3" id="time3" class="circle validation" data-validations='["required"]'>
												<label for="time3">3 Horas</label>
											</div>
											<div class="col-xs-6 col-sm-6">
												<input type="radio" name="valueService" value="4" id="time4" class="circle validation" data-validations='["required"]'>
												<label for="time4">4 Horas</label>
											</div>
										</div>
										<div class="row not-margin">
			                <label for="observations" class="paragraph10">Observaciones</label>
			            	</div>
				            <div class="row not-margin">
				              <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="observations" id='observations' placeholder="Ej. Pinceles, Acuarelas, Lienzos."  data-validations='["required", "min:50", "max:250"]'></textarea>
				            </div>
			            	<div class="row not-margin">
				    					<button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
				    						Realizar Propuesta
				        				</button>
				            			<div class="space10">
				            			</div>
											<button class="col-xs-12 button10 background-white text-center"	data-dismiss="modal" aria-label="Close">
												Cancelar
											</button>
			    					</div>
			            </div>
			            <div class="modal-footer">
			        		</div>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
				<deals token='{{ csrf_token() }}' service_id='{{$conversation->service_id}}' applicant="{{$conversation->applicant_id}}" conversation='{{$conversation->id}}'>

				</deals>
			{!!Form::close()!!}
		</div>
	</div>
@include("partial/observationForm")

</div>

@endsection
