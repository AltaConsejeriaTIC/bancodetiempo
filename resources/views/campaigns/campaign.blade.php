@extends('layouts.app')

@section('metas')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$campaign->name}}"/>
    <meta property="og:description" content="{{$campaign->description}}"/>
    <meta property="og:image" content="{{url('/')}}/{{$campaign->image}}"/>
    <script>
        function shareFb(url) {

            FB.login(function (res) {
                console.log(res);
                FB.ui({
                    method: 'share',
                    href: url
                }, function (response) {
                });
                /*FB.ui({
                 method: 'share_open_graph',
                 action_type: 'og.likes',
                 action_properties: JSON.stringify({
                 object: 'https://developers.facebook.com/docs/',
                 })
                 }, function (response) {
                 console.log(response);
                 }
                 );
                 */
            }, {
                auth_type: 'rerequest',
                scope: 'publish_actions'
            });

            /*FB.getLoginStatus(function(response) {
             if (response.status === 'connected') {
             console.log('Logged in.');
             }
             else {
             FB.login();
             }
             });



             FB.api("/me", function(profile) {
             console.log(profile);
             if (profile.id) {
             app_init();
             } else {
             alert("Problem connecting to Facebook");
             }
             });

             FB.ui({
             method: 'share_open_graph',
             action_type: 'og.likes',
             action_properties: JSON.stringify({
             object:'http://localbancodetiempo.com/',
             })
             }, function(response){
             // Debug response (optional)
             console.log(response);
             });

             FB.ui({
             method: 'share',
             href: url
             }, function (response) {
             });

             */
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
                    <img src="/{{$campaign->image}}" class='campaignCover' alt="{{$campaign->name}}">
                </div>
            </div>

            <div class="row">
                <div class="">
                    <h1 class="title">{{$campaign->name}}</h1>
                </div>
                <div class="">
                    @if($campaign->allows_registration == 0)
                        <h3 class="state">Estado: <span>En periodo de pre-inscripción y/o donaciones</span>
                        </h3>
                    @else
                        <h3 class="state">Estado: <span>En periodo de inscripciones</span></h3>
                    @endif
                </div>
            </div>

            <div class="row">
                <p class="description">{{$campaign->description}}</p>
                <div class="space20"></div>
            </div>

            <div class="row">
                <h3 class="not-margin-y"><span
                            class="text-bold">Fecha: </span>{{date("F j Y", strtotime($campaign->date))}}</h3>
                <div class="space10"></div>
                <h3 class="not-margin-y"><span
                            class="text-bold">Hora: </span>{{date("g:i a", strtotime($campaign->date))}}</h3>
                <div class="space20"></div>
            </div>

            {{--
                        <div class="row">
                            <div class="">
                                <h1 class="date">Lugar: <span>{{date("F j Y g:i a", strtotime($campaign->place))}}</span></h1>
                            </div>
                        </div>
            --}}

            <div class="row">
                <div class="dorados">
                    <h1 class="sub-title">Participa en esta campaña y adquiere:</h1>
                    <div class="dorados">
                        <img src="/images/moneda.png">
                        <div>
                            <h1>{{$campaign->credits}} dorados</h1>
                            <p>Cada dorado vale una hora de tu tiempo, y del tiempo de cualquier persona.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="join">
                    <h1>¿Cómo puedo participar?</h1>
                    <p><span class="text-bold">Inscribirme:</span> Si deseas asistir a esta actividad, puedes
                        inscribirte y el
                        administrador de la campaña te contactará por medio de tu inbox, para ultimar los detalles del
                        evento.</p>
                    <p><span class="text-bold">Donaciones:</span> Puedes donar los dorados que desees a esta campaña,
                        estos serán
                        descontados de tu bolsa y serán añadidos a la bolsa de la campaña para retribuir a los
                        asistentes de la actividad.</p>
                </div>
                <div class="space20"></div>
            </div>

            <div class="row">
                @if($campaign->allows_registration == 0)
                    @if($campaign->participants->where('participant_id', Auth::id())->count() == 0)
                        @if($campaign->user->id != Auth::user()->id)
                            <div class="col-xs-12 text-center">
                                <button class='col-xs-12 button1 background-active-color text-center'
                                        v-on:click='myData.preinscription = true'>¡Pre-inscribirme!
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="col-xs-12 text-center">
                            <button class='button1 cancel-button text-center'
                                    v-on:click='myData.preinscription = true'>Cancelar Pre-inscripción
                            </button>
                        </div>
                    @endif
                    <div class="space20"></div>
                    <div class="col-xs-12 text-center donation">
                        @php($credits = Session::get('credits'))
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
                        @if($campaign->user->id != Auth::user()->id)
                            <div class="col-xs-12">
                                <p class='paragraph4'>{{ trans("campaigns.textInscription") }}</p>
                            </div>

                            <div class="col-xs-12 text-center">
                                <button class='button1 background-active-color text-center'
                                        v-on:click='myData.inscription = true'>{{ trans("campaigns.inscription") }}</button>
                            </div>
                            <br>
                        @endif
                    @endif

                    @if($campaign->state_id == 12 && $campaign->user->id == Auth::user()->id)

                        <div class="col-xs-12 text-center">
                            <button class='button1 background-active-color text-center'
                                    v-on:click='myData.pay = true'>{{ trans("campaigns.pay") }}</button>
                        </div>
                        <br>
                    @endif

                    @if (session('msg'))
                        <div class="msg text-center">
                            <p>{{ session('msg') }}</p>
                        </div>
                    @endif

                @endif
            </div>

            <div class="line"></div>
        </article>

        <article class="col-md-4">
            <div class="row">
                <div class="partakers">
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
                </div>
            </div>
            <div class="space20"></div>
            <div class="line"></div>

            <div class="row">
                <div class="text-center host">
                    <h2 class="text-center text-bold montserrat-font">Organiza</h2>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-4">
                            @include('partial/imageProfile', array('cover' => $campaign->user->avatar, 'id' =>$campaign->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                        </div>
                    </div>
                    <h1 class="name text-center montserrat-font">{{$campaign->user->first_name.' '.$campaign->user->last_name}}</h1>

                    <div class="space20"></div>

                    <h6 class="rate">Amabilidad, respeto y confianza
                        <span>{{number_format($campaign->user->ranking, 1)}}</span></h6>
                    <div class="text-left rating">
                        @for($cont = 1 ; $cont <= 5 ; $cont++)
                            @if($cont <= $campaign->user->ranking)
                                <span class='material-icons'>star</span>
                            @else
                                <span class='material-icons'>star_border</span>
                            @endif
                        @endfor
                    </div>
                    <div class="space20"></div>

                    <p class="description text-left">{{$campaign->user->aboutMe}}</p>

                    <div class="space15"></div>

                    <p class="description text-left">¿Te interesa ésta campaña?</p>

                    <div class="space15"></div>

                    <div class="col-xs-12 text-center">
                        <button class='button1 background-active-color text-center'
                                v-on:click='myData.inscription = true'>Comunícate
                            con {{$campaign->user->first_name}}</button>
                    </div>
                </div>
            </div>

            <div class="space15"></div>
            <div class="line"></div>

            <div class="row">
                <div class="text-center sharing">
                    <h3 class="text-bold text-left">Comparte esta campaña en:</h3>
                    <div class="space15"></div>
                    <div class="row">
                        {{--
                        <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button"
                             data-size="small" data-mobile-iframe="true">
                            <a class="fb-xfbml-parse-ignore" target="_blank"
                               href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse">Compartir</a>
                        </div>
                        --}}
                        <button class="button facebook" onclick="shareFb('{{url()->current()}}')">
                            <img src="/images/facebook.svg">
                        </button>
                        <button class="button twitter">
                            <img src="/images/twitter.svg">
                        </button>
                        <button class="button google">
                            <img src="/images/google.svg">
                        </button>
                    </div>
                </div>
            </div>

            <div class="space15"></div>
            <div class="report-content text-right">
                <div class="line"></div>
                <div class="space15"></div>
                <a class="text-right"><i class='material-icons'>error</i> Reportar contenido</a>
            </div>
        </article>
    </div>
    @include("campaigns/partial/donation")
    @include("campaigns/partial/inscription")
    @include("campaigns/partial/preinscription")
    @include("campaigns/partial/pay")
@endsection
