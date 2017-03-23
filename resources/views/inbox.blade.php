@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">
	<div class="row">
		<h1 class="title1 col-md-12">Mis mensajes</h1>
	</div>
	<div class="row">
		<ul  class="nav nav-pills col-md-8">
			<li class="active">
	        	<a  href="#received" data-toggle="tab" class="button11">Interesados en mis ofertas</a>
			</li>
			<li>
	        	<a  href="#sent" data-toggle="tab" class="button11">Ofertas que deseo recibir</a>
			</li>
		</ul>
	</div>
	
	<div class='row'>
		<div class="tab-content clearfix">
			<div class="tab-pane active" id="received">
				<div class='row header'>
					<div class='col-md-1'>*</div>
					<div class='col-md-3'><h2 class="title1">De</h2></div>
					<div class='col-md-3'><h2 class="title1">mensaje</h2></div>
					<div class='col-md-2'><h2 class="title1">Fecha</h2></div>
					<div class='col-md-3'><h2 class="title1">Accción</h2></div>
				</div>
				@if(count($conversationsMyService) > 0)
					@foreach($conversationsMyService as $conversation)
						<div class='row'>
							<div class='col-md-1'><input type='checkbox'></div>
							<div class='col-md-3'><a href='/conversation/{{$conversation->id}}'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</a></div>
							<div class='col-md-3'><h4></h4><p>{{ $conversation->lastMessage->message }}</p></div>
							<div class='col-md-2'><p>{{$conversation->created_at}}</p></div>
							<div class='col-md-3'>
								<a class='button1 background-active-color' href='/conversation/{{$conversation->id}}'>Ver mensaje</a>							
							</div>
							
						</div>
					@endforeach
				@endif
			
			</div>
			<div class="tab-pane" id="sent">
				<div class='row header'>
					<div class='col-md-1'>*</div>
					<div class='col-md-3'><h2 class="title1">De</h2></div>
					<div class='col-md-3'><h2 class="title1">mensaje</h2></div>
					<div class='col-md-2'><h2 class="title1">Fecha</h2></div>
					<div class='col-md-3'><h2 class="title1">Accción</h2></div>
				</div>
				@if(count($conversations) > 0)
					@foreach($conversations as $conversation)
						<div class='row'>
							<div class='col-md-1'><input type='checkbox'></div>
							<div class='col-md-3'><a href='/conversation/{{$conversation->id}}'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</a></div>
							<div class='col-md-3'><h4></h4><p>{{ $conversation->lastMessage->message }}</p></div>
							<div class='col-md-2'><p>{{$conversation->created_at}}</p></div>
							<div class='col-md-3'>
								<a class='button1 background-active-color' href='/conversation/{{$conversation->id}}'>Ver mensaje</a>							
							</div>
							
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
	
</div>

@endsection
