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
			<callmessages conversation='{{$conversation->id}}' ></callmessages>
		</div>
		<div class='responseBox'>
			<sendmessage conversation='{{$conversation->id}}' token='{{ csrf_token() }}' sender='{{Auth::user()->id}}' applicant="{{$conversation->applicant_id}}">
			</sendmessage>		
			{!! Form::open(['url' => '#', 'method' => 'post', 'class' => 'form-custom row validation']) !!}
				<deals></deals>
			{!!Form::close()!!}

		</div>

	</div>

</div>

@endsection