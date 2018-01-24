@extends('layouts.app')

@section('metas')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$campaign->name}}"/>
    <meta property="og:description" content="{{$campaign->description}}"/>
    <meta property="og:image" content="{{url('/')}}/{{$campaign->image}}"/>
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

    <div class="container campaign" xmlns:v-on="http://www.w3.org/1999/xhtml">

        <article class="col-md-8">

            <div class="row">
                <div class="col-md-12 text-center campaignCover">
                    <img src="/{{$campaign->image}}" alt="{{$campaign->name}}">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <h1 class="title">{{$campaign->name}}</h1>
                </div>
                <div class="col-xs-12">
                    @if($campaign->allows_registration == 0)
                        <h3 class="state">Estado: <span>En periodo de pre-inscripción y/o donaciones</span>
                        </h3>
                    @else
                       @if($campaign->state_id == 1)
                            <h3 class="state">Estado: <span>En periodo de inscripciones</span></h3>
                        @else
                            <h3 class="state">Estado: <span>Finalizada</span></h3>
                        @endif
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <p class="description">{{$campaign->description}}</p>
                </div>
            </div>
            
            @if($campaign->location != '')
            <div class="row">
                <div class="col-xs-12">
                   @php
                       $coordinates = json_decode($campaign->coordinates);
                   @endphp
                    <p class='paragraph1'><strong>Lugar: </strong><a href="http://maps.google.com/?q={{$coordinates->lat}},{{$coordinates->lng}}" target="_blank">{{$campaign->location}}</a></p>
                </div>
            </div>
            @endif
            
            <div class="row">
                <div class="col-xs-12">
                    <p class='paragraph1'><strong>Fecha: </strong>{{date("F j Y", strtotime($campaign->date))}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class='paragraph1'><strong>Hora: </strong>{{date("g:i a", strtotime($campaign->date))}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="dorados">
                        <h1 class="sub-title">Participa en esta campaña y adquiere:</h1>
                        <div class="dorados">
                            <img src="/images/moneda.png">
                            <div>
                                <h1>{{$campaign->hours}} dorados</h1>
                                <p>Cada dorado vale una hora de tu tiempo, y del tiempo de cualquier persona.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="row">
                <div class="join col-xs-12">
                    @if($campaign->allows_registration == 0)
                        <h1>¿Cómo puedo participar?</h1>
                        <p><span class="text-bold">Donaciones:</span> Puedes donar los dorados que desees a esta campaña para retribuir a los cambalacheros que asistan a esta actividad; estos serán descontados de tus dorados disponibles.</p>
                        <p><span class="text-bold">Pre-inscribirme:</span> Si deseas asistir a esta actividad, puedes pre-inscribirte y una vez se cierre el periodo de donaciones, confirmaremos tu inscripción a través de tu correo electrónico.</p>
                    @else
                        <p><span class="text-bold">Inscribirme:</span> Puedes inscribirte y asistir a esta actividad en la fecha y hora señaladas.</p>
                    @endif
                </div>
                <div class="space20"></div>
            </div>
            <div class="row">
            @if(Auth::check() && $campaign->state_id == 1 && $campaign->user->id != Auth::user()->id)
                @if($campaign->allows_registration == 0)
                    @if($campaign->participants->where('participant_id', Auth::id())->count() == 0)                            
                        <div class="col-xs-12 text-center">
                            <button class='button1 background-active-color text-center'
                                    v-on:click='myData.preinscription = true'>{{ trans("campaigns.preInscription") }}
                            </button>
                        </div>                            
                    @else
                        <div class="col-xs-12 text-center">
                            <button class='button1 cancel-button text-center'
                                    v-on:click='myData.cancelpreinscription = true'>{{ trans("campaigns.cancelInscription") }}
                            </button>
                        </div>
                    @endif
                    
                    <div class="space20"></div>
                    <div class="col-xs-12 text-center donation">
                        @php
                           $credits = Session::get('credits')
                        @endphp
                            @if(isset($credits))
                                <p>¡Haz donado {{$credits}} dorados a esta campaña!</p>
                            @endif
                            <button class='button1 background-active-color text-center'
                                    v-on:click='myData.donation = true'>¡Donar Dorados!
                            </button>
                    </div>
                    <div class="space20"></div>
                    
                @else
                        
                    @if($campaign->participants->where('participant_id', Auth::id())->where("confirmed", 1)->count() == 0)
                        <div class="col-xs-12">
                            <p class='paragraph4'>{{ trans("campaigns.textInscription") }}</p>
                        </div>

                        <div class="col-xs-12 text-center">
                            <button class='button1 background-active-color text-center' v-on:click='myData.inscription = true'>{{ trans("campaigns.inscription") }}</button>
                        </div>
                        <br>
                    @else
                        <div class="col-xs-12 text-center">
                            <button class='button1 cancel-button text-center'
                                    v-on:click='myData.cancelpreinscription = true'>Cancelar Inscripción
                            </button>
                        </div>
                    @endif
                @endif
            @endif

            @if($campaign->state_id == 12 && $campaign->user->id == Auth::user()->id)
                <div class="col-xs-12 text-center">
                    <button class='button1 background-active-color text-center' v-on:click='myData.pay = true'>{{ trans("campaigns.pay") }}</button>
                </div>
                <br>
                @include("campaigns/partial/pay")
            @endif
            </div>
            
            <br>
            @if(Auth::check())
                <div class="report-content text-right" v-if='{{Auth::check()}}'>
                    <div class="line"></div>
                    <div class="space15"></div>
                    <a class="text-right" href="" title="Reportar Contenido" data-toggle="modal"
                       data-target="#update-dialog{{$campaign->id}}"><i class='material-icons'>error</i> Reportar
                        contenido</a>
                </div>
                @include('/campaigns/report')
            @endif

        </article>

        <article class="col-md-4">

            <div class="row">
                <div class="text-center host col-xs-12">
                    <h2 class="text-center text-bold montserrat-font">Organiza</h2>
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            @include('partial/imageProfile', array('cover' => $campaign->user->avatar, 'id' =>$campaign->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                        </div>
                    </div>
                    <h1 class="name text-center montserrat-font">{{$campaign->user->first_name.' '.$campaign->user->last_name}}</h1>

                    <div class="space20"></div>

                    <div class="text-left rating">
                        @for($cont = 1 ; $cont <= 5 ; $cont++)
                            @if($cont <= $campaign->user->ranking)
                                <span class='material-icons'>star</span>
                            @else
                                <span class='material-icons'>star_border</span>
                            @endif
                        @endfor
                    </div>

                    <div class="line"></div>

                    <p class="description text-left">{{$campaign->user->aboutMe}}</p>

                    <div class="space15"></div>

                    
                </div>
            </div>
            <br>
            <div class="line"></div>

            <div class="row">
                <div class="partakers col-xs-12">
                    @if($campaign->allows_registration == 0)
                        <div>
                            <h1 class="">Preinscritos a la campaña:</h1>
                            <a>{{$campaign->participants->count()}} personas preinscritas</a>
                        </div>

                        <div class="space15"></div>

                        @foreach($campaign->participants as $participant)
                            <div class="col-xs-4">
                                @include('partial/imageProfile', array('cover' => $participant->participant->avatar, 'id' =>$participant->participant->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                            </div>
                        @endforeach
                    @else
                        <div>
                            <h1 class="">Asistentes a la campaña:</h1>
                            <a>{{$campaign->participants->where("confirmed", 1)->count()}} personas asistirán</a>
                        </div>

                        <div class="space15"></div>

                        @foreach($campaign->participants->where("confirmed", 1) as $participant)
                            <div class="col-xs-4">
                                @include('partial/imageProfile', array('cover' => $participant->participant->avatar, 'id' =>$participant->participant->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                            </div>
                        @endforeach                    
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <h3 class="text-bold text-left">Comparte esta campaña en:</h3>
                </div>
            </div>
            <div class="row">
                <div class="text-center sharing">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" onclick="window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=250,width=600,top=150,left=500');return false;">
                        <button class="button facebook">
                            <img src="/images/facebook.svg">
                        </button>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$campaign->name}}"
                       onclick="window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=250,width=600,top=150,left=500');return false;">
                        <button class="button twitter">
                            <img src="/images/twitter.svg">
                        </button>
                    </a>
                    <a href="https://plus.google.com/share?url={{url()->current()}}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=150,left=500');return false;">
                        <button class="button google">
                            <img src="/images/google.svg">
                        </button>
                    </a>
                </div>
            </div>

            <div class="space15"></div>
        </article>
    </div>
    @if(Auth::check())
        @include("campaigns/partial/donation")
        @include("campaigns/partial/inscription")
        @include("campaigns/partial/preinscription")
        @include("campaigns/partial/cancelpreinscription")
        
    @endif
    @include('services/partial/modalMail', ['service' => $campaign])
@endsection
