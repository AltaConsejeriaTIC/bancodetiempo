
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
				@include('deals/deal')
			@endif
		</div>
	</div>
@endforeach
