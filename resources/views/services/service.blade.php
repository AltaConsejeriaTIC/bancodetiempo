@extends('layouts.app')

@section('content')

	@include('nav',array('type' => 2))

	<section class="row not-padding">
		<div class="container">
			<div class='row'>
				<article class="col-md-8">
					<div class="image-service">
						<span class='category'>{{$service->category->category}}</span>
						<img src="@if(strpos($service->image, 'http') === false) /{{$service->image}} @else {{$service->image}} @endif" alt="" />

					</div>
					<h3 class='title title2-service'>{{$service->name}}</h3>
					<div class='ranking left'>
						<div class='left'>
							@for($cont = 1 ; $cont <= 5 ; $cont++)
								@if($cont <= $service->user->ranking)
									<span class='material-icons paragraph9'>grade</span>
								@else
									<span class='material-icons paragraph8 '>fiber_manual_record</span>
								@endif
							@endfor
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="content">
								<p class="paragraph4 text-center">{{$service->description}}</p>
								<div class="space15">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<p class="paragraph4">
								<span class="paragraph4 text-bold">Modalidad:</span>
								@if($service->presently==1) Presencial @endif
								@if($service->presently==1 && $service->virtually !== 0) y @endif
								@if($service->virtually !== 0) Virtual @endif</p>
							<p class="space15"></p>
							<p class="paragraph4 text-bold"> Adquiere esta oferta por: </p>
							<div class="row space10">
								<div class="col-md-2">
									<img src="{{ asset('images/moneda.png') }}" class=" moneda icon-nav text-center"></image>
								</div>
								<div class="col-md-10">
									<p class="paragraph4 text-bold">{{$service->value}} <span> Laches</span></p>
									<p class="paragraph8 ">Cada lache vale una hora de tu tiempo, y del tiempo de cualquier persona.</p>
								</div>
							</div>
						</div>
					</div>
						<div class='tags'>
							<p>
								<a class='button7'>#Palabraclave</a>
								<a class='button7'>#Palabraclave</a>
								<a class='button7'>#Palabraclave</a>
							</p>
						</div>
				</article>

				<article class='col-md-4 col-xs-12 col-sm-6'>
					<div class="row">
						<div class="col-xs-6 col-xs-offset-3">
							<avatar :cover='myData.cover'>
								<template scope="props">
									@include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#0f6784', 'borderSize' => '3px', 'extra' => array('image' => ':xlink:href=props.cover')))
								</template>
							</avatar>
						</div>
					</div>
					<div >
						<div class="row">
							<div class="col-xs-12 text-center">
								<h2 class="title1">{{$user->first_name." ".$user->last_name}}</h2>
							</div>
						</div>
						<div class="row">

							<div class="col-xs-12 text-center">
								<p class='paragraph4'>{{$user->aboutMe}}</p>
							</div>
							<div class="col-xs-12">
								<p class='paragraph4'>¿Te interesa esta oferta?</p>
							</div>
							@if($service->user_id != Auth::user()->id)
								<div class="col-xs-12 ">
									<button class='col-xs-12 button1 background-active-color'>Comunicate con {{$user->first_name}}</button>
								</div>
							@endif
						</div>
					</div>

				</article>

			</div>
	</section>
	
	<button v-on:click='putMyData("contactMail", "visible")'>abrir</button>
	
	<contactmailmodal service='{{$service->id}}' :contact-mail='myData.contactMail'>
		<div slot="modal">
			<div>coso</div>
		</div>
	</contactmailmodal>
	
@endsection
