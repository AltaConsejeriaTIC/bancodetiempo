@extends('layouts.app')

@section('metas')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$service->name}}"/>
    <meta property="og:description" content="{{$service->description}}"/>
    <meta property="og:image" content="{{url('/')}}/{{$service->image}}"/>
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
                    @include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' =>$service->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
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
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph1">{{ trans("service.question") }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button class='col-xs-12 button1 background-active-color text-center' v-on:click='putMyData("contactMail", true)'>Comunícate con {{$user->first_name}}</button>
                </div>
            </div>
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
                <div class="col-xs-12">
                    <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="small" data-mobile-iframe="true">
                        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse">Compartir</a>
                    </div>
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
                            <p class="dialog">{{$commentary->observation}}</p>
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach
            <hr>
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


{{--
<div class='row'>
                <article class="col-md-8 col-xs-12">


                    <h3 class='title title2-service'></h3>
                    <div class='ranking left'>
                        <div class='left'>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="content">
                                <p class="paragraph4 "></p>
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
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('images/moneda.png') }}"
                                         class=" moneda icon-nav text-center"></image>
                                </div>
                                <div class="col-md-10">
                                    <p class="paragraph4 text-bold">{{$service->value}} <span> Dorados</span></p>
                                    <p class="paragraph4 ">Cada dorado vale una hora de tu tiempo, y del tiempo de
                                        cualquier persona.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class='col-xs-12  col-sm-12'>

                            @foreach($service->tags as $tag)
                                @if($tag->service_id == $service->id)
                                    <a class="col-xs-6 input-tag button7 tag-margin" tag='{{ $tag->tag->id }}'
                                       href='/filter?filter={{ $tag->tag->tag }}'>
                                        <span>{{ $tag->tag->tag }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>



                    <div class="row">
                        <h1 class="title1">Comentarios</h1>
                        <br>
                        @foreach($service->serviceScore as $commentary)
                            @if($commentary->observation != '')
                                <div class="row">
                                    <div class="col-xs-1 not-padding col-xs-offset-1">
                                        <a href="/user/{{$commentary->user->id}}">
                                            @include('partial/imageProfile', array('cover' => $commentary->user->avatar, 'id' =>$commentary->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                        </a>
                                    </div>
                                    <p class="col-xs-8">{{$commentary->observation}}</p>
                                </div>
                                <br>
                            @endif
                        @endforeach
                    </div>

                    <div class="row">
                        <hr class="col-md-12 report_line hidden-xs">
                        @if(!is_null(Auth::User()))
                            <a class="report" href="" title="Reportar Contenido" data-toggle="modal"
                               data-target="#update-dialog{{$service->id}}"><i class=" material-icons "
                                                                               aria-hidden="true">report</i>Reportar
                                contenido</a>
                            @include('/services/report')
                        @else
                            <a class="report" href="" title="Reportar Contenido" data-toggle="modal"
                               data-target="#update-dialog{{$service->id}}"><i class=" material-icons "
                                                                               aria-hidden="true">report</i>Reportar
                                contenido</a>
                        @endif

                    </div>
                </article>
                <div class="space visible-xs"></div>
                <div class="space visible-xs"></div>
                <article class='col-md-4 col-xs-12 col-sm-6'>
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            @if(is_null(Auth::User()))
                                <a @click='myData.login = true'>
                                    <avatar :cover='myData.cover'>
                                        <template scope="props">
                                            @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                        </template>
                                    </avatar>
                                </a>
                            @else
                                <a href="/user/{{$service->user->id}}">
                                    <avatar :cover='myData.cover'>
                                        <template scope="props">
                                            @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>$user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                        </template>
                                    </avatar>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class='ranking'>
                            <div class='left'>
                                @for($cont = 1 ; $cont <= 5 ; $cont++)
                                    @if($cont <= $service->user->ranking)
                                        <span class='material-icons'>grade</span>
                                    @else
                                        <span class='material-icons rankingInactive'>grade</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div>
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
                                        <button class='col-xs-12 button1 background-active-color text-center'
                                                v-on:click='putMyData("contactMail", true)'>Comunícate
                                            con {{$user->first_name}}</button>
                                    </div>
                                @endif
                            @else

                                <div class="col-xs-12">
                                    <p class='paragraph4'>¿Te interesa está oferta?</p>
                                </div>

                                <div class="col-xs-12 ">
                                    <button class='col-xs-12 button1 background-active-color text-center'
                                            @click='myData.login = true'>Comunícate con {{$user->first_name}}</button>
                                </div>
                            @endif

                            <div class="space"></div>

                            <div class="col-xs-12">

                                <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="small" data-mobile-iframe="true">
                                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse">Compartir</a>
                                </div>
                            </div>

                        </div>
                    </div>


                </article>

            </div>
--}}

@include('services/partial/modalMail')

@endsection
