@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">

	<div class="conversationBox">

		<div class="head row">

			@if($conversation->applicant_id == Auth::User()->id)

				<div class="col-md-1 col-xs-4">
					@include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class='col-md-8 col-xs-8'>
					<h1 class='title2 text-white'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</h1>
					<i class="text-white">{{$conversation->service->name}}</i>
				</div>

			@else

				<div class="col-md-1 col-xs-4">
					@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class='col-md-8 col-xs-8'>
					<h1 class='title2 text-white'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</h1>
					<i class="text-white">{{$conversation->service->name}}</i>
				</div>

			@endif

		</div>

		<div class='listMessages scrollBottom' >
			<div id='messages' conversation='{{$conversation->id}}'></div>
		</div>

		<div class='responseBox'>
			<sendmessage conversation='{{$conversation->id}}' token='{{ csrf_token() }}' sender='{{Auth::user()->id}}' applicant="{{$conversation->applicant_id}}" deal="{{$dealState ? $dealState->state_id : 0}}">
			</sendmessage>
			@include('deals/formDeal')
		</div>
	</div>
@include("partial/observationForm")

</div>

@endsection

