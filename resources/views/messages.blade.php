
@foreach($conversation->message as $message)
	@if($message->message != "¡Has enviado un propuesta!"  && $message->message != "Propuesta Aceptada")
		<div class="row">
			<div class="col-md-12 message @if($message->sender != Auth::User()->id) forMe @else fromMe @endif">

				@if($message->sender != Auth::User()->id)
				 	@if($conversation->applicant_id == Auth::User()->id)
						<div class="col-md-1 image">
							@include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#fff', 'borderSize' => '1px'))
						</div>
					@else
						<div class="col-md-1 image">
							@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
						</div>
					@endif
				 @endif
					@if($message->dealState == 8)
						@include('deals/dealMessages')
					@else
						<div class='messageText col-md-8' >
							{{$message->message}}
						</div>
					@endif
			</div>
		</div>
	@endif

@endforeach

@if(!is_null($dealState))
    @if($dealState->state_id != 8)
    	@include('deals/deal')			
    @endif
@endif

@if(!is_null($conversation->deals->first()))
    @if($conversation->applicant_id == Auth::User()->id)

       @if(!is_null($conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()))
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title2">{{$conversation->service->user->first_name}} te ha dejado el siguiente comentario:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="paragraph1">{{$conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()->observation}}</p>
                </div>
            </div>
        @endif
        @if(!is_null($conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()))
            <hr class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title2">Escribiste el siguiente comentario para {{$conversation->service->user->first_name}}:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="paragraph1">{{$conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()->observation}}</p>
                </div>
            </div>
        @endif

    @else
        @if(!is_null($conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()))
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title2">{{$conversation->applicant->first_name}} te ha dejado el siguiente comentario:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="paragraph1">{{$conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()->observation}}</p>
                </div>
            </div>
        @endif
        @if(!is_null($conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()))
            <hr class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title2">Escribiste el siguiente comentario para {{$conversation->applicant->first_name}}:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="paragraph1">{{$conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()->observation}}</p>
                </div>
            </div>
        @endif
    @endif
@endif


@if(!is_null($conversation->deals->first()))
    <div class='row not-margin'>
       <div class='content'>
           <div class="row">
               <div class="col-md-12">
                    @if($conversation->applicant_id == Auth::User()->id)
                        <h1 class="title2">¿Recibiste con éxito el servicio de Diego?</h1>
                    @else
                        <h1 class="title2">¿Le diste el servicio a Joe satisfactoriamente?</h1>
                    @endif
               </div>
           </div>
           <div class="row">
               <button type="button" class="button1 showModal background-active-green-color col-md-2 col-md-offset-4" deal='{{$conversation->deals->last()->id}}'  modal='form-observation'>Si</button>
               <button type="button" class='button10 background-white col-md-2 showModal' deal='{{$conversation->deals->last()->id}}' modal='form-bad-observation'>No</button>
           </div>
       </div>
    </div>
@endif


