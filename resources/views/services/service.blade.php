@extends('layouts.app')

@section('metas')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$service->name}}"/>
    <meta property="og:description" content="{{$service->description}}"/>
    <meta property="og:image" content="{{url('/')}}/{{$service->image}}"/>
    <script>
        function shareFb(url) {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: url
            }, function (response) {
                console.log(response);
            });
        }
    </script>
@endsection

@section('content')

@if(!is_null(Auth::User()))
    @include('nav',array('type' => 2))
@else
    @include('nav',array('type' => 3))
@endif

<div class="container">
  <div class="row">
        <article class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="image-service col-xs-12">
                    <span class='category'>{{$service->category->category}}</span>
                    <img src="@if(strpos($service->image, 'http') === false) /{{$service->image}} @else {{$service->image}} @endif" alt=""/>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <h2 class="title1 col-xs-12">
                        {{$service->name}}
                    </h2>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-xs-12">
                            @for($cont = 1 ; $cont <= 5 ; $cont++)
                                @if($cont <= $service->ranking)
                                    <span class='material-icons paragraph9'>grade</span>
                                @else
                                    <span class='material-icons paragraph9 rankingInactive'>grade</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="paragraph1">{{$service->description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                             @foreach($service->tags as $tag)
                                @if($tag->service_id == $service->id)
                                    <a class="col-xs-6 input-tag button7 tag-margin" tag='{{ $tag->tag->id }}'
                                       href='/filterTag?filter={{ $tag->tag->tag }}'>
                                        <span>{{ $tag->tag->tag }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="paragraph1"><strong>{{ trans("service.modality") }}:</strong> @if($service->presently==1) Presencial @endif @if($service->virtually !== 0) Virtual @endif</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>{{ trans("service.value") }}:</h4>
                            <div class="col-xs-2 col-sm-3">
                                <img src="{{ asset('images/moneda.png') }}" class="moneda icon-nav text-center"/>
                            </div>
                            <div class="col-xs-10 col-sm-7">
                                <strong>{{$service->value}} dorados</strong>
                                <p>{{ trans("service.textCredits") }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="line visible-xs"></div>
        </article>

        <article class="col-xs-12 col-sm-4">
           <br>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h2 class="title1 text-center">{{ trans("service.offeredBy") }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <a href="/user/{{$service->user->id}}">
                        @include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' =>$service->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="title1 text-center">{{$service->user->first_name." ".$service->user->last_name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph4">{{ trans("service.textRanking") }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @for($cont = 1 ; $cont <= 5 ; $cont++)
                        @if($cont <= $user->ranking)
                            <span class='material-icons paragraph9'>grade</span>
                        @else
                            <span class='material-icons paragraph9 rankingInactive'>grade</span>
                        @endif
                    @endfor
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph1 text-center visible-xs">{{$service->user->aboutMe}}</p>
                    <p class="paragraph1 text-left hidden-xs">{{$service->user->aboutMe}}</p>
                </div>
            </div>
            @if(Auth::id() != $service->user->id)
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph1">{{ trans("service.question") }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                	@if(Auth::check())
                    	<button class='col-xs-12 button1 background-active-color text-center' v-on:click='putMyData("contactMail", true)'>Comunícate con {{$user->first_name}}</button>
                    @else
                    	<button class='col-xs-12 button1 background-active-color text-center' @click='myData.login = true'>Comunícate con {{$user->first_name}}</button>
                   @endif
                </div>
            </div>
            @endif
            <br>
            <div class="line visible-xs"></div>
            <div class="row">
               <br>
                <div class="col-xs-12">
                    <p class="paragraph1"><strong>
                        {{ trans("service.share") }}:
                    </strong></p>
                </div>
            </div>
            <div class="row">
                <div class="text-center sharing">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" onclick="window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=250,width=600,top=150,left=500');return false;">
                        <button class="button facebook">
                            <img src="/images/facebook.svg">
                        </button>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$service->name}}" onclick="window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=250,width=600,top=150,left=500');return false;">
                        <button class="button twitter">
                            <img src="/images/twitter.svg">
                        </button>
                    </a>
                    <a href="https://plus.google.com/share?url={{url()->current()}}" onclick="javascript:window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=150,left=500');return false;">
                        <button class="button google">
                            <img src="/images/google.svg">
                        </button>
                    </a>
                </div>
            </div>
            <br>
            <div class="line visible-xs"></div>
        </article>
        <article class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph1">
                        <strong>{{ trans("service.comments") }}</strong>
                    </p>
                </div>
            </div>
            @foreach($service->serviceScore as $commentary)
                @if($commentary->observation != '')
                    <div class="row">
                        <div class="col-xs-1 not-padding col-xs-offset-1">
                            <a href="/user/{{$commentary->user->id}}">
                                @include('partial/imageProfile', array('cover' => $commentary->user->avatar, 'id' =>"comment".$commentary->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                            </a>
                        </div>
                        <div class="col-xs-8">
                            <div class="dialog">
                                <p class="dialogHeader">
                                    <strong>{{$commentary->user->first_name." ".$commentary->user->last_name}}</strong>
                                    Hace {{App\Helpers::intervalDate($commentary->created_at)}} días
                                </p>
                                <p>{{$commentary->observation}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach
            <div class="line"></div>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    @if(Auth::check())
                        <a class="report" href="" title="Reportar Contenido" data-toggle="modal" data-target="#update-dialog{{$service->id}}">
                            <i class=" material-icons" aria-hidden="true">report</i>Reportar contenido
                        </a>
                        @include('/services/report')
                    @endif
                </div>
            </div>
        </article>
    </div>
</div>

@if(Auth::id() != $service->user->id)
    @include('services/partial/modalMail')
@endif

@endsection
