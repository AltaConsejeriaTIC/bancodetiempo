@extends('layouts.app')

@section('content')

	@if(!is_null(Auth::User()))
		@include('nav',array('type' => 2))
	@else
		@include('nav',array('type' => 3))
	@endif

	<section class="row not-padding">
		<div class="container">
			<div class='row'>
				<article class="col-md-8 col-xs-12">

					<div class="image-service">
						<span class='category'>{{$service->category->category}}</span>
						<img src="@if(strpos($service->image, 'http') === false) /{{$service->image}} @else {{$service->image}} @endif" alt="" />

					</div>
					<h3 class='title title2-service'>{{$service->name}}</h3>

					<div class="row">
						<div class="col-md-6">
							<div class="content">
								<p class="paragraph4 ">{{$service->description}}</p>
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
							<p class="paragraph4 text-bold"> Participa en esta oferta y rebiras: </p>
							<div class="row">
								<div class="col-md-2">
									<img src="{{ asset('images/moneda.png') }}" class=" moneda icon-nav text-center"></image>
								</div>
								<div class="col-md-10">
									<p class="paragraph4 text-bold">{{$service->value}} <span> Dorados</span></p>
									<p class="paragraph8 ">Cada dorado vale una hora de tu tiempo, y del tiempo de cualquier persona.</p>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
					    <div class='col-xs-12  col-sm-12'>

                            @foreach($service->tags as $tag)
                                @if($tag->service_id == $service->id)
                                    <a class="col-xs-6 input-tag button7 tag-margin" tag='{{ $tag->tag->id }}' href='/filter?filter={{ $tag->tag->tag }}'>
                                        <span>{{ $tag->tag->tag }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
					</div>

					<div class="row">
						<hr class="  col-md-12 report_line hidden-xs">
						@if(!is_null(Auth::User()))
							<a class="report" href="" title="Reportar Contenido" data-toggle="modal" data-target="#update-dialog{{$service->id}}"><i class=" material-icons " aria-hidden="true">report</i>Reportar contenido</a>
							@include('/services/report')
						@else
							<a class="report" href="" title="Reportar Contenido" data-toggle="modal" data-target="#update-dialog{{$service->id}}"><i class=" material-icons " aria-hidden="true">report</i>Reportar contenido</a>
						@endif

					</div>
				</article>
                <div class="space visible-xs"></div>
                 <div class="space visible-xs"></div>
				<article class='col-md-4 col-xs-12 col-sm-6'>
					<div class="row">
						<div class="col-xs-6 col-xs-offset-3">
				            @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
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


							@if(!is_null(Auth::User()))
								@if($service->user_id != Auth::user()->id)
								<div class="col-xs-12">
									<p class='paragraph4'>¿Te interesa está oferta?</p>
								</div>

									<div class="col-xs-12 ">
										<button class='col-xs-12 button1 background-active-color text-center' v-on:click='putMyData("contactMail", true)'>Comunícate con {{$user->first_name}}</button>
									</div>
								@endif
							@else

								<div class="col-xs-12">
									<p class='paragraph4'>¿Te interesa está oferta?</p>
								</div>

								<div class="col-xs-12 ">
									<button class='col-xs-12 button1 background-active-color text-center' data-toggle="modal" data-target="#login">Comunícate con {{$user->first_name}}</button>
								</div>
							@endif

						</div>
					</div>

				</article>

			</div>
	</section>

@endsection
