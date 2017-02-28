@extends('layouts.app')
@section('content')

@include('nav',array('type' => 2))

<div class="container">
	
	<div class="conversationBox">
		
		<div class="head row">

			@if($conversation->applicant_id == Auth::User()->id)
				
				<div class="col-md-1">
					@include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class='col-md-8'>
					<h1 class='title2 text-white'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</h1>
				</div>

			@else

				<div class="col-md-1">
					@include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
				</div>
				<div class='col-md-8'>
					<h1 class='title2 text-white'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</h1>
				</div>

			@endif

		</div>
		<button type="button" class=''  v-on:click='putMyData("experience", true)'>calificar</button>
		<generalmodal name='experience' :state='myData.experience' state-init='false'>
			<div slot="modal" class='box row'>
				<slider>
					<div slot='sliders'>
						<div class='slide' id='start'>
							<div class='row not-margin'>
								<button type='button' next='calificar' class='next'>Si</button> 
								<button type='button' next='' class='next'>No</button>
							</div>							
						</div>
						<div class='slide' id='calificar'>
							<div class="row not-margin">
								<input type="hidden" name='score' id='score' class='stars'>
								<label for="score">
									<i onclick='score(1)' class='star1'></i>
									<i onclick='score(2)' class='star2'></i>
									<i onclick='score(3)' class='star3'></i>
									<i onclick='score(4)' class='star4'></i>
									<i onclick='score(5)' class='star5'></i>
								</label>
								<script type="text/javascript">
									function score(v){
										jQuery("#score + label > i").removeClass("check")
										jQuery("#score").val(v);
										var s = v;
										while(s > 0){
											jQuery(".star"+s).addClass("check")
											s -= 1; 
										}
									}
								</script>
							</div>	
							<div class="row not-margin">
								<button type='button' next='observations' class='next'>Siguiente</button>
							</div>					
						</div>
						<div class='slide' id='observations'>
							<div class='row not-margin'>
								<label for="observation">Observaciones sobre el servicio</label><br>
								<textarea name="observation" id="observation" cols="30" rows="10"></textarea>
							</div>							
						</div>
					</div>
				</slider>
				
			</div>
		</generalmodal>

		<div class='listMessages scrollBottom' >
			<callmessages conversation='{{$conversation->id}}' ></callmessages>
		</div>
		<div class='responseBox'>
			<sendmessage conversation='{{$conversation->id}}' token='{{ csrf_token() }}' sender='{{Auth::user()->id}}' applicant="{{$conversation->applicant_id}}">
			</sendmessage>		
			{!! Form::open(['url' => '/deal', 'method' => 'post', 'class' => 'form-custom row validation']) !!}
				<deals token='{{ csrf_token() }}' service_id='{{$conversation->service_id}}' applicant="{{$conversation->applicant_id}}"></deals>
			{!!Form::close()!!}

		</div>

	</div>

</div>

@endsection