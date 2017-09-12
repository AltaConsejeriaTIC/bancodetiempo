@extends('layouts.app')
@section('content')

@include('nav',['type' => 2])

<div class="container">
	<div class="row">
	    <div class="col-xs-12">
	        <ul class="nav nav-pills">
                <li role="presentation" class="active">
                    <a href="#servicesInterested" data-toggle="tab" class="closeConversation">Ofertas que deseo recibir <span class="notificationAlert">{{App\Helpers::getCountNotificationsServicicesInterest() + App\Helpers::getCountNotificationsDealsInterest()}}</span></a>
                </li>
                <li role="presentation">
                    <a href="#myServices" data-toggle="tab" class="closeConversation">Interesados en mis ofertas <span class="notificationAlert">{{App\Helpers::getCountNotificationsMyServices() + App\Helpers::getCountNotificationsDealsMyServices()}}</span></a>
                </li>
            </ul>
	    </div>
	</div>
	<div class="tab-content col-xs-12 col-sm-5 col-md-4">
        <article class="tab-pane fade active in" id="servicesInterested">
            <div class="row relative">
                <div class="col-xs-12 panel listConversation active">
                    @include('inbox.partial.listConversationsServicesInterested', ['conversations' => $conversations])
                </div>

            </div>
        </article>
        <article class="tab-pane fade" id="myServices">
            <div class="row">
                <div class="col-xs-12 panel listConversation active">
                    @include('inbox.partial.listConversationsMyServices', ['conversations' => $conversationsMyService])
                </div>

            </div>
        </article>
    </div>
    @include('inbox.partial.conversation')
</div>

@endsection
