@foreach($conversation->message as $message)

	<div class="row">
		<div class="col-md-12 message @if($message->sender != Auth::User()->id) forMe @else fromMe @endif">
			@if(!isset($message->deal) || $message->deal == 0)
				@if($message->sender != Auth::User()->id)
				 	@if($conversation->applicant_id == Auth::User()->id)
						<div class="col-md-1 image">
							@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
						</div>
					@else
						<div class="col-md-1 image">
							@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
						</div>
					@endif
				 @endif

				<div class='messageText col-md-8' >
					{{$message->message}}
				</div>

			@else

				{!! Form::open(['url' => '/deal', 'method' => 'put', 'class' => 'form-custom row validation']) !!}				
					<div class="messageDealText col-md-10">
						<input type="hidden" name="deal" value="{{$deal->id}}">
						<div class="row">
							<h1 class="title1 text-center">Propuesta de acuerdo</h1>
							<h4 class="textSpan text-center">¡Tienes 72 horas para aceptar!</h4>
						</div>
						<div class="row not-margin">
							<p class="not-margin">
								<strong>Oferta:</strong> {{$deal->service->name}}								
							</p>
							<p class="not-margin">								
								<strong>Fecha a realizarse:</strong> {{$deal->date}}
							</p>
							<p class="not-margin">								
								<strong>Hora:</strong> {{$deal->time}}
							</p>
							<p class="not-margin">								
								<strong>Lugar:</strong> {{$deal->location}}
							</p>
							<p class="not-margin">								
								<strong>Valor:</strong> <img src="/images/moneda.png" class="not-padding coinSmall icon-nav text-center"> {{$deal->value}} Dorados
							</p>
						</div>
						<div class="space20"></div>
						<div class="row not-margin mapMessage">							
						</div>
						<div class="space20"></div>
						<div class="row not-margin text-center">
						    @if($deal->state_id == 10)
						        <div class="col-md-4 col-md-offset-4 text-center">
                                    <button type="button" class='button1 background-active-green-color col-md-12 showModal' deal='{{$deal->id}}' conversation='{{$conversation->id}}'>Evalúa tu experiencia</button>
                                </div>

						   @else
                                <div class="col-md-4 col-md-offset-2 text-center">
                                    <button name="agree" class='button1 background-active-green-color col-md-12'>Aceptar</button>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button name="decline" class='dealButtonCancel background-white col-md-12'>Declinar</button>
                                </div>
                            @endif
						</div>
					</div>
				{!!Form::close()!!}

				@include('deals/deal')
			@endif
		</div>

	</div>

@endforeach

<div class='row not-margin'>
   <div class='content'>
       <div class="row">
           <h1 class="title1">¿Le diste el servicio a Joe satisfactoriamente?</h1>
       </div>
       <div class="row">
           <button type="button" class="button1 showModal background-active-green-color col-md-2 col-md-offset-4" modal='form-observation'>Si</button>
           <button type="button" class='button1 col-md-2'>No</button>
       </div>
   </div>
</div>
