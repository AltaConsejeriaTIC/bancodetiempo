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

			@endif			
		</div>		
	</div>

@endforeach
<div id='observations' class="hidden">
{!! Form::open(['url' => '/addObservation', 'method' => 'post', 'class' => 'form-custom sliders']) !!}
       <input type="hidden" name="deal_id" value="">
       <input type="hidden" name="conversation_id" value="">
        <div class='slide' slide='start'>
            <div class='row not-margin'>
                <button type='button' next='calificar' class='next'>Si</button>
                <button type='button' next='' class='next'>No</button>
            </div>
        </div>
        <div class='slide' slide='calificar'>
            <div class="row not-margin">
                <input type="hidden" name='score' id='score' class='stars'>
                <label for="score">
                    <i score='1' class='star1 score'></i>
                    <i score='2' class='star2 score'></i>
                    <i score='3' class='star3 score'></i>
                    <i score='4' class='star4 score'></i>
                    <i score='5' class='star5 score'></i>
                </label>
            </div>
            <div class="row not-margin">
                <button type='button' next='observations' class='next' validation='required:score'>Siguiente</button>
            </div>
        </div>
        <div class='slide' slide='observations'>
            <div class='row not-margin'>
                <label for="observation">Observaciones sobre el servicio</label><br>
                <textarea name="observation" id="observation" cols="30" rows="10"></textarea>
                <button type="submit">Enviar</button>
            </div>
        </div>
{!!Form::close()!!}
</div>
