@extends('layouts.app')

@section('metas')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$service->name}}"/>
    <meta property="og:description" content="{{$service->description}}"/>
    <meta property="og:image" content="{{$service->image}}"/>
@endsection

@section('content')

    @if(session('response'))
        <generalmodal name='notificationEmail' :state='myData.notificationEmail' state-init='true'>
            <div slot="modal" class='box row'>
                <button type="button" class='close' v-on:click='myData.notificationEmail = false'><i
                            class='fa fa-close'></i></button>
                <h1 class='title1 col-md-12 text-center'>¡Notificación enviada!</h1>
                <p class='text-center col-md-12'>Se ha enviado un correo electrónico a {{ $service->user->first_name }}
                    informándole sobre tu interés en tomar su oferta. <br>
                    En los próximos días {{ $service->user->first_name }} te contactará a través de la plataforma.</p>
                <p class='text-center col-md-12 title1'>
                    <i class="fa fa-signal" aria-hidden="true"
                       style='font-size: 60px;font-size: 50px;transform: rotateZ(-90deg) translateX(40px) translateY(-10px);'></i><i
                            class="fa fa-envelope" aria-hidden="true" style='font-size: 120px;'></i>
                </p>
            </div>
        </generalmodal>
    @endif

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
                        <img src="@if(strpos($service->image, 'http') === false) /{{$service->image}} @else {{$service->image}} @endif"
                             alt=""/>

                    </div>
                    <h3 class='title title2-service'>{{$service->name}}</h3>
                    <div class='ranking left'>
                        <div class='left'>
                            @for($cont = 1 ; $cont <= 5 ; $cont++)
                                @if($cont <= $service->ranking)
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
                            <p class="paragraph4 text-bold"> Adquiere esta oferta por: </p>
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('images/moneda.png') }}"
                                         class=" moneda icon-nav text-center"></image>
                                </div>
                                <div class="col-md-10">
                                    <p class="paragraph4 text-bold">{{$service->value}} <span> Dorados</span></p>
                                    <p class="paragraph8 ">Cada dorado vale una hora de tu tiempo, y del tiempo de
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

                        <div class="col-xs-12">

                            <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button"
                                 data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
                                                                                target="_blank"
                                                                                href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse">Compartir</a>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <hr class="  col-md-12 report_line hidden-xs">
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
                                        <span class='material-icons paragraph4 '>fiber_manual_record</span>
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

                        </div>
                    </div>
                    <div>
                        <h1 class="title1">Comentarios</h1>
                        @foreach($service->serviceScore as $commentary)
                            @if($commentary->observation != '')
                                <div class="row">
                                    <div class="col-md-2 not-padding">
                                        <a href="/user/{{$commentary->user->id}}">
                                            @include('partial/imageProfile', array('cover' => $commentary->user->avatar, 'id' =>$commentary->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                        </a>
                                    </div>
                                    <p class="col-md-8">{{$commentary->observation}}</p>
                                </div>
                                <br>
                            @endif
                        @endforeach
                    </div>

                </article>

            </div>
    </section>

    <contactmailmodal service='{{$service->id}}' :contact-mail='myData.contactMail'>
        <div slot="modal" class='box row'>
            <button type="button" class='close' v-on:click='putMyData("contactMail", false)'><i class='fa fa-close'></i>
            </button>
            {!! Form::open(['url' => '/defaultsend/'.$service->id, 'method' => 'get', 'class' => 'form-custom col-md-10 col-md-offset-1', 'form-validation']) !!}
            <div class='row'>
                <div class="col-md-12 text-center title1 not-padding">Comunícate
                    con {{$service->user->first_name}}</div>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12 paragraph2  not-padding">
                    <p>- ¡Preséntate!<br>
                        - Cuéntale por qué estás interesado en tomar su oferta.<br>
                        - Coméntale lo que esperas recibir.<br>
                        - Concreta los datos del acuerdo y envíale una propuesta.</p>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="content" class='validation col-xs-12' id="content" rows="10"
                                      placeholder='Ej. ¡Hola! Me llamo Joe, me gustaría tomar tu oferta ya que dentro de poco será mi matrimonio, y quiero conservar los mejores recuerdos de ese día. ¿Te parece bien si nos encontramos el Lunes, 6 de Agosto a las 3 PM en el Parque Simón Bolivar para realizar la actividad? Espero tu respuesta.'
                                      data-validations='["required", "min:20", "max:250"]'></textarea>
                            <div class='clearfix'></div>
                            <div class="msg" errors='content'>
                                <p error='required'>Este campo es obligatorio.</p>
                                <p error='min'>Este campo debe ser mínimo de 20 caracteres.</p>
                                <p error='max'>Este campo debe ser máximo de 250 caracteres.</p>
                            </div>
                        </div>
                    </div>
                    <div class="space10"></div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <input type='submit' value='Enviar' class='col-md-12 button1 background-active-color'>
                        </div>
                    </div>
                    <div class="space10"></div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <a class='button10 col-md-12 text-center' v-on:click='putMyData("contactMail", false)'>Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </contactmailmodal>

@endsection
