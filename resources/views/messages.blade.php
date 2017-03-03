@foreach($conversation->message as $message)

	<div class="row">
		<div class="col-md-12 message @if($message->sender != Auth::User()->id) forMe @else fromMe @endif">

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

			@include('deals/deal')
			
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
