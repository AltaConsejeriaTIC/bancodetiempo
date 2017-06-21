@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">

	<div class="conversationBox col-xs-12">

		<div class="head row">

			@if($conversation->applicant_id == Auth::User()->id)

				<div class="col-md-1 col-xs-3">
                    <a href="/user/{{$conversation->service->user->id}}">
                        @include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => 'profileImg', 'border' => '#fff', 'borderSize' => '1px'))
                    </a>
				</div>
				<div class='col-xs-9'>
					<h1 class='title2 text-white'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</h1>
					<i class="text-white">{{$conversation->service->name}}</i>
				</div>

			@else

				<div class="col-md-1 col-xs-3">
				    <a href="/user/{{$conversation->applicant->id}}">
					    @include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => 'profileImg', 'border' => '#fff', 'borderSize' => '1px'))
                    </a>
				</div>
				<div class='col-xs-9'>
					<h1 class='title2 text-white'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</h1>
					<i class="text-white">{{$conversation->service->name}}</i>
				</div>

			@endif

		</div>

        <div id="conversation" class="row transition">
            <div class='listMessages col-xs-12 active' id='listMessages' data-in='{"top":"0%", "opacity":1}' data-out='{"top":"-100%", "opacity" : 0}'>
                <div id='messages' conversation='{{$conversation->id}}'></div>
            </div>
            @include('deals/formDeal')
            @include('deals/suggestedSites')
        </div>

		<div class='responseBox row'>
			<sendmessage conversation='{{$conversation->id}}' token='{{ csrf_token() }}' sender='{{Auth::user()->id}}' applicant="{{$conversation->applicant_id}}" deal="{{$dealState ? $dealState->state_id : 0}}">
			</sendmessage>

		</div>
	</div>
@include("partial/observationForm")

</div>

@endsection

