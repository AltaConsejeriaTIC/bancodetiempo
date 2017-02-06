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
					<h3 class='title title2'>{{$service->name}}</h3>
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
							<p class="paragraph4 text-bold">Modalidad: </p>

							<p class="paragraph4 text-bold"> Adquiere esta oferta por: </p>
							<img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav text-center col-sm-2  col-md-2 "></image>
							<p>{{$service->value}} <span> Laches</span></p>
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

@endsection
