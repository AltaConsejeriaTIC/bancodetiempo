@extends('layouts.app')
@section('content')

@include('nav',['type' => 2])

<div class="container">
	<div class="row">
	    <div class="col-xs-12">
	        <ul class="nav nav-pills">
                <li role="presentation" class="active">
                    <a href="#servicesInterested" data-toggle="tab">Ofertas que deseo recibir</a>
                </li>
                <li role="presentation">
                    <a href="#myServices" data-toggle="tab">Interesados en mis ofertas</a>
                </li>
            </ul>
	    </div>
	</div>
	<section class="tab-content">
        <article class="tab-pane fade active in" id="servicesInterested">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-4 panel">
                    @include('inbox.partial.listConversationsServicesInterested', ['conversations' => $conversations])
                </div>
                <div class="col-xs-12 conversation">
                    conversation
                </div>
            </div>
        </article>
        <article class="tab-pane fade" id="myServices">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-4 panel">
                    @include('inbox.partial.listConversationsMyServices', ['conversations' => $conversationsMyService])
                </div>
            </div>
        </article>
    </section>
</div>

@endsection
