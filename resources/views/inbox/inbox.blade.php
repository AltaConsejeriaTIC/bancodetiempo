@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">
	<div class="row">
		<h1 class="title1 not-padding col-md-12">Mis mensajes</h1>
	</div>
	<div class="row">
	    <div class="paragraph4 text-bold not-padding col-xs-12">
	        <p>Interesados en mis ofertas</p>
	    </div>
	</div>
    <div class="row" id="received">


            @if(count($conversationsMyService) > 0)
                @foreach($conversationsMyService as $conversation)
                    <div class='hidden-xs row'>
                        <div class="@if($conversation->lastMessage->state == 6 && $conversation->lastMessage->sender != Auth::user()->id) notRead @endif">
                            <div class='col-xs-1 form-custom text-center'>
                                <input type="checkbox" name="" class="square" id='conversationCkeck{{$conversation->id}}'>
                                <label for='conversationCkeck{{$conversation->id}}'></label>
                            </div>
                            <div class='col-xs-1'>
                                <a href="/user/{{$conversation->applicant->id}}">
                                    @include('partial/imageProfile', array('cover' =>'getImg?img='.$conversation->applicant->avatar.'&w=150', 'id' => $conversation->id.$conversation->applicant->id, 'border' => '#0a475b', 'borderSize' => '2px'))
                                </a>
                            </div>
                            <div class="col-xs-2">
                                <a href='/conversation/{{$conversation->id}}' class='paragraph4 text-bold'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</a>
                             </div>
                            <div class='col-xs-3'>
	                            <a href='/conversation/{{$conversation->id}}' class='paragraph4 text-bold'>{{$conversation->service->name}}</a><br>
	                            <a href='/conversation/{{$conversation->id}}' class='paragraph4'>{{ str_limit($conversation->lastMessage->message, 50) }}</a>
	                        </div>
                            <div class='col-xs-2'>
                            	<p>{{$conversation->interval}}</p>
                            </div>
                            <div class='col-xs-3'><br>
                                <a class='button1 background-active-color' href='/conversation/{{$conversation->id}}'>Ver mensaje</a>
                            </div>
                        </div>

                    </div>
                    <div class='visible-xs @if($conversation->lastMessage->state == 6 && $conversation->lastMessage->sender != Auth::user()->id) notRead @endif'>
                        <div class="row">
                            <div class="col-xs-2">
                                <a href="/user/{{$conversation->applicant->id}}">
                                    @include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                </a>
                            </div>
                            <div class="col-xs-10">
                                <a href='/conversation/{{$conversation->id}}' class='paragraph4'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-2">
                                <a href='/conversation/{{$conversation->id}}' class='paragraph4 text-bold'>{{$conversation->service->name}}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2 form-custom text-center">
                                <input type="checkbox" name="" class="square" id='conversationCkeck{{$conversation->id}}'>
                                <label for='conversationCkeck{{$conversation->id}}'></label>
                             </div>
                            <div class='col-xs-10 paragraph6'><p>{{ $conversation->lastMessage->message }}</p></div>
                        </div>
                        <div class="separator"></div>
                    </div>
                @endforeach
            @endif

    </div>
    <br>
    <div class="row">
	    <div class="paragraph4 text-bold not-padding col-xs-12">
	        <p>Ofertas que deseo tomar</p>
	    </div>
	</div>

    <div class="row" id="received">


            @if(count($conversations) > 0)
                @foreach($conversations as $conversation)
                    <div class='hidden-xs row '>
                        <div class="@if($conversation->lastMessage->state == 6 && $conversation->lastMessage->sender != Auth::user()->id) notRead @endif">
                            <div class='col-xs-1 form-custom text-center'>
                                <input type="checkbox" name="" class="square" id='conversationCkeck{{$conversation->id}}'>
                                <label for='conversationCkeck{{$conversation->id}}'></label>
                            </div>
                            <div class='col-xs-1'>
                                <a href="/user/{{$conversation->service->user->id}}">
                                    @include('partial/imageProfile', array('cover' =>'getImg?img='.$conversation->service->user->avatar.'&w=150', 'id' => $conversation->id.$conversation->service->user->id, 'border' => '#0a475b', 'borderSize' => '2px'))
                                </a>
                            </div>
                            <div class="col-xs-2">
                                <a href='/conversation/{{$conversation->id}}' class='paragraph4 text-bold'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</a>
                             </div>
                            <div class='col-xs-3'>
	                            <a href='/conversation/{{$conversation->id}}' class='paragraph4 text-bold'>{{$conversation->service->name}}</p>
	                            <a href='/conversation/{{$conversation->id}}' class='paragraph4'>{{ str_limit($conversation->lastMessage->message, 50) }}</p></div>
                            <div class='col-xs-2'>
                            	<p>{{$conversation->interval}}</p>
                            </div>
                            <div class='col-xs-3'><br>
                                <a class='button1 background-active-color' href='/conversation/{{$conversation->id}}'>Ver mensaje</a>
                            </div>
                        </div>

                    </div>
                    <div class='visible-xs @if($conversation->lastMessage->state == 6 && $conversation->lastMessage->sender != Auth::user()->id) notRead @endif'>
                        <div class="row">
                            <div class="col-xs-2">
                                <a href="/user/{{$conversation->service->user->id}}">
                                    @include('partial/imageProfile', array('cover' =>$conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#0a475b', 'borderSize' => '2px'))
                                </a>
                            </div>
                            <div class="col-xs-10">
                                <a href='/conversation/{{$conversation->id}}' class='paragraph4'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-2">
                                <a href='/conversation/{{$conversation->id}}' class='paragraph4 text-bold'>{{$conversation->service->name}}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2 form-custom text-center">
                                <input type="checkbox" name="" class="square" id='conversationCkeck{{$conversation->id}}'>
                                <label for='conversationCkeck{{$conversation->id}}'></label>
                             </div>
                            <div class='col-xs-10 paragraph6'><p>{{ str_limit($conversation->lastMessage->message, 50) }}</p></div>
                        </div>
                        <div class="separator"></div>
                    </div>
                @endforeach
            @endif

    </div>



</div>

@endsection
