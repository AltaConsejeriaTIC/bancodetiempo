@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">

	<div class="conversationBox col-xs-12">

		@include('inbox.partial.headConversation')

        <div id="conversation" class="row transition">
            <div class='listMessages col-xs-12 active' id='listMessages' data-in='{"top":"0%", "opacity":1}' data-out='{"top":"-100%", "opacity" : 0}'>
                <div id='messages' class=" scrollBottom" conversation='{{$conversation->id}}'></div>
            </div>
            @include('deals/formDeal')
            @include('deals/suggestedSites')
            @include('deals/detailSite')
        </div>
	</div>
@include("partial/observationForm")

</div>

@endsection

