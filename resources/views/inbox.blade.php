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
				@foreach($messages as $message)
					<div class='row'>
						<div class='col-md-1'><input type='checkbox'></div>
						<div class='col-md-3'></div>
						<div class='col-md-3'><h4></h4><p>{{str_limit($message->message, 30)}}</p></div>
						<div class='col-md-2'><p>{{$message->created_at}}</p></div>
						<div class='col-md-3'>
							<button type="button" class='button1 background-active-color' v-on:click='putMyData("message{{$message->id}}", true)'>Ver mensaje</button>							
						</div>
						<generalmodal name='message{{$message->id}}' :state='myData.message{{$message->id}}' state-init='false'>
							<div slot="modal" class='box row'>
								{!! Form::open(['url' => '/defaultsend/'.$message->conversation->service->id, 'method' => 'get', 'class' => 'form-custom col-md-10 col-md-offset-1']) !!} 
								
									<div class="row">
										<div class="col-md-10 col-md-offset-1">
											<p>{{$message->message}}</p>
										</div>
									</div>
								
									<div class="row">
										<div class="col-md-10 col-md-offset-1">
											<textarea name="content" class='validation ' id="content" rows="10" placeholder=''  data-validations='["required", "min:10", "max:250"]'></textarea>
		      								<div class='clearfix'></div>
										</div>
									</div>
								
									<div class="row">
					      				<div class="col-md-10 col-md-offset-1">
					      					<input type='submit' value='Enviar' class='col-md-12 button1 background-active-color'>
					      				</div>
					      			</div>
					      			<div class="space10"></div>
					      			<div class="row">
					      				<div class="col-md-10 col-md-offset-1">
					      					<a class='button10 col-md-12 text-center'  v-on:click='putMyData("contactMail", false)'>Cancelar</a>
					      				</div>
					      			</div>
								
								{!! Form::close() !!}
							</div>
						</generalmodal>
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
