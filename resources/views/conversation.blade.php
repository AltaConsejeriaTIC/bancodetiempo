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

		<div class='listMessages scrollBottom' >
			<div id='messages' conversation='{{$conversation->id}}'></div>
		</div>
		<div class='responseBox'>
			<sendmessage conversation='{{$conversation->id}}' token='{{ csrf_token() }}' sender='{{Auth::user()->id}}' applicant="{{$conversation->applicant_id}}">
			</sendmessage>		
			{!! Form::open(['url' => '/deal', 'method' => 'post', 'class' => 'form-custom row validation']) !!}
				<deals token='{{ csrf_token() }}' service_id='{{$conversation->service_id}}' applicant="{{$conversation->applicant_id}}" conversation='{{$conversation->id}}'></deals>
			{!!Form::close()!!}

		</div>

	</div>

    <div class='box-modal' id='form-observation'>
        <div class='shadow'></div>
        <div class='panel box-fixed col-md-4 col-md-offset-4'>
           {!! Form::open(['url' => '/addObservation', 'method' => 'post', 'class' => 'form-custom', 'v-validation:msg' => '']) !!}
                <div class="content">
                    <div class="row">
                        <h1 class="title1 col-md-10 col-md-offset-1">¡Califica tu experiencia!</h1>
                    </div>
                    <div class="row">
                        <p class="paragraph4 col-md-12 text-center">Oferta: Fotografía de Bodas</p>
                    </div>
                    <div class="row">
                        <p class="paragraph4 text-center text-red col-md-12">Debes calificar este servicio para seguir ofertando y/o recibiendo servicios dentro de la plataforma.</p>
                    </div>
                    <div class="row">
                        <h3 class="title2 col-md-12">Valora a Joe</h3>
                    </div>
                    <div class="row">
                        <p class="paragraph4 col-md-12">Amabilidad, respeto y confianza</p>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                            <input type="hidden" name='score' id='score' class='stars validation' data-validations='["required"]'>
                            <label for="score">
                                <i score='1' class='star1 score' input='score'></i>
                                <i score='2' class='star2 score' input='score'></i>
                                <i score='3' class='star3 score' input='score'></i>
                                <i score='4' class='star4 score' input='score'></i>
                                <i score='5' class='star5 score' input='score'></i>
                            </label>
                       </div>

                    </div>
                    @if($conversation->service->user->id != Auth::User()->id)
                    <div class="row">
                        <p class="paragraph4 col-md-12">Calidad del servicio</p>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                            <input type="hidden" name='scoreService' id='scoreService' class='stars validation' data-validations='["required"]'>
                            <label for="scoreService">
                                <i score='1' class='star1 score' input='scoreService'></i>
                                <i score='2' class='star2 score' input='scoreService'></i>
                                <i score='3' class='star3 score' input='scoreService'></i>
                                <i score='4' class='star4 score' input='scoreService'></i>
                                <i score='5' class='star5 score' input='scoreService'></i>
                            </label>
                       </div>

                    </div>
                    @endif
                    <div class="row">
                        <p class="paragraph4 col-md-12">Deja un comentario (Max. 250 caracteres)</p>
                    </div>
                    <div class="row">
                        <label class="paragraph4 col-md-12">¿Cómo te pareció la experiencia? ¿Qué fue lo que más te gustó? ¿Qué pudo haber sido mejor?.</label>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                           <textarea name="observation" class='validation' id="observation" cols="30" rows="10" placeholder="Ej. La calidad del servicio fue excelente, pasé un rato agradable y me divertí mucho aunque hubiera sido mejor comenzar con la actividad puntualmente." data-validations='["required", "min:10", "max:200"]'></textarea>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                         <input type="hidden" name='service_id' value='{{$conversation->service->id}}'>
                          <input type="hidden" name='offerer_id' value='{{$conversation->service->user->id}}'>
                          <input type="hidden" name='applicant_id' value='{{$conversation->applicant_id}}'>
                           @if($conversation->service->user->id == Auth::User()->id)
                                <input type="hidden" name="scoreFrom" value='offerer'>
                            @elseif($conversation->applicant_id == Auth::User()->id)
                                <input type="hidden" name="scoreFrom" value='applicant'>
                            @endif
                           <button type="submit" class='button1 background-active-color col-md-12'>Enviar</button>
                       </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                           <button type="button" class='button10 background-white col-md-12 hiddenModal' modal='form-observation'>Cancelar</button>
                       </div>
                    </div>
                    <br>

                </div>
            {!!Form::close()!!}
        </div>
    </div>

</div>

@endsection
