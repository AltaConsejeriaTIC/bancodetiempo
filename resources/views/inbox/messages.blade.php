<input type="hidden" name="keyConversation" value="{{$conversation->key}}" id='keyConversation'>
@foreach($conversation->message as $message)
	@if($message->message != "¡Has enviado un propuesta!"  && $message->message != "Propuesta Aceptada")
		<div class="row">
			<div class="col-md-12 message @if($message->sender != Auth::User()->id) forMe @else fromMe @endif">

				@if($message->sender != Auth::User()->id)
				 	@if($conversation->applicant_id == Auth::User()->id)
						<div class="col-md-1 col-xs-3 image">
							@include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#fff', 'borderSize' => '1px'))
						</div>
					@else
						<div class="col-md-1 col-xs-3 image">
							@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
						</div>
					@endif
				 @endif
					@if($message->dealState == 8)
						@include('deals/dealMessages')
					@else
						<div class='messageText col-md-8 col-xs-8' >
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






