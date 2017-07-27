@extends('layouts.app')
@section('content')

@include('nav',['type' => 2])

<div class="container">
	<div class="row">
	    <div class="col-xs-12">
	        <ul class="nav nav-pills">
                <li role="presentation" class="active">
                    <a href="#servicesInterested" data-toggle="tab" class="closeConversation">Ofertas que deseo recibir</a>
                </li>
                <li role="presentation">
                    <a href="#myServices" data-toggle="tab" class="closeConversation">Interesados en mis ofertas</a>
                </li>
            </ul>
	    </div>
	</div>
	<div class="tab-content">
        <article class="tab-pane fade active in" id="servicesInterested">
            <div class="row relative">
                <div class="col-xs-12 col-sm-5 col-md-4 panel listConversation active">
                    @include('inbox.partial.listConversationsServicesInterested', ['conversations' => $conversations])
                </div>
                <div class="col-xs-12 col-sm-7 conversation">
                    <div class="row">
                        <div class="col-xs-12 visible-xs">
                            <a href="#" class='closeConversation'>
                                <i class="fa fa-arrow-left" style="color:#0f6784"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box">
                    </div>
                    <div class="controllers">
                        <div class="row">
                            <form action="#" class="sendMenssages" method="get">
                                <div class="col-xs-10">
                                    <input name="message" id="message" class="col-xs-12" placeholder="Escribe tu mensaje aquí…">
                                    <input type="hidden" id='conversationInput'>
                                    <input type="hidden" id='senderInput' value="{{Auth::id()}}">
                                    {{ csrf_field() }}
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit">
                                       <i class="fa fa-send" style="color:#0f6784"></i>
                                    </button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="tab-pane fade" id="myServices">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-4 panel listConversation active">
                    @include('inbox.partial.listConversationsMyServices', ['conversations' => $conversationsMyService])
                </div>
                <div class="col-xs-12 col-sm-7 conversation">
                    <div class="row">
                        <div class="col-xs-12 visible-xs">
                            <a href="#" class='closeConversation'>
                                <i class="fa fa-arrow-left" style="color:#0f6784"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box">
                    </div>
                    <div class="controllers">
                        <div class="row">
                            <form action="#" class="sendMenssages" method="get">
                                <div class="col-xs-10">
                                    <input name="message" id="message" class="col-xs-12" placeholder="Escribe tu mensaje aquí…">
                                    <input type="hidden" id='conversationInput'>
                                    <input type="hidden" id='senderInput' value="{{Auth::id()}}">
                                    {{ csrf_field() }}
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit">
                                       <i class="fa fa-send" style="color:#0f6784"></i>
                                    </button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>

@endsection
