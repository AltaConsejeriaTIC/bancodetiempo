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
	        	<a  href="#received" data-toggle="tab" class='parrafo3'>Interesados en mis ofertas</a>
			</li>
			<li>
	        	<a  href="#sent" data-toggle="tab" class='parrafo3'>Ofertas que deseo recibir</a>
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
				@foreach($conversations as $conversation)
					<div class='row'>
						<div class='col-md-1'><input type='checkbox'></div>
						<div class='col-md-3'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</div>
						<div class='col-md-3'><h4></h4><p>{{ $conversation->lastMessage->message }}</p></div>
						<div class='col-md-2'><p>{{$conversation->created_at}}</p></div>
						<div class='col-md-3'>
							<a class='button1 background-active-color' href='/conversation/{{$conversation->id}}'>Ver mensaje</a>							
						</div>
						
					</div>
				@endforeach
			
			</div>
			<div class="tab-pane" id="sent">
			
			enviados 
			</div>
		</div>
	</div>
	
</div>

@endsection
