@extends('layouts.app')

@section('content')

    @if(!is_null(Auth::User()))
        @include('nav',array('type' => 2))
    @else
        @include('nav',array('type' => 3))
    @endif

    <div class="container campaign">

        <article class="col-md-8">

            <div class="row">
                <div class="col-md-12 text-center campaignCover">
                    <img src="/{{$campaign->image}}" class='campaignCover' alt="{{$campaign->name}}">
                </div>
            </div>

            <div class="row">
                <div class="">
                    <h2 class="title">{{$campaign->name}}</h2>
                </div>
                <div class="">
                    @if($campaign->allows_registration == 0)
                        <h1 class="state">Estado: <span>En periodo de pre-inscripción y/o donaciones</span>
                        </h1>
                    @else
                        <h1 class="state">Estado: <span>En periodo de inscripciones</span></h1>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="">
                    <p class="description">{{$campaign->description}}</p>
                </div>
            </div>

            <div class="row">
                <div class="">
                    <h1 class="date">Fecha: <span>{{date("F j Y", strtotime($campaign->date))}}</span></h1>
                </div>
            </div>

            <div class="row">
                <div class="">
                    <h1 class="time">Hora: <span>{{date("g:i a", strtotime($campaign->date))}}</span></h1>
                </div>
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
                    <div class="row">
                        <div class="col-xs-2">
                            <img src="/images/moneda.png">
                        </div>
                        <div class="col-xs-10">
                            <h1>{{$campaign->credits}} dorados</h1>
                            <p>Cada dorado vale una hora de tu tiempo, y del tiempo de cualquier persona.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="join">
                    <h1>¿Cómo puedo participar?</h1>
                    <p><span>Inscribirme:</span> Si deseas asistir a esta actividad, puedes inscribirte y el administrador de la campaña te contactará por medio de tu inbox, para ultimar los detalles del evento.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 text-center">
                    <p class='paragraph4'>{{ str_limit($campaign->groups->description, 100)}}</p>
                </div>

                @if($campaign->allows_registration == 0)
                    <div class="col-xs-12">
                        <p class='paragraph4'>{{ trans("campaigns.textDonation") }}</p>
                    </div>

                    <div class="col-xs-12 ">
                        <button class='col-xs-12 button1 background-active-color text-center'
                                v-on:click='myData.donation = true'>{{ trans("campaigns.donation") }}</button>
                    </div>
                    <div class="space10"></div>
                    @if($campaign->participants->where('participant_id', Auth::id())->count() == 0)
                        @if($campaign->groups->admin_id != Auth::user()->id)
                            <div class="col-xs-12 ">
                                <button class='col-xs-12 button1 background-active-color text-center'
                                        v-on:click='myData.preinscription = true'>{{ trans("campaigns.preInscription") }}</button>
                            </div>
                            <br>
                        @endif
                    @else
                        <div class="col-xs-12">
                            <p class='paragraph4 text-bold'>Te encuentras pre inscrito a esta campaña</p>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <p class='paragraph4'>Podras inscribirte a esta campaña el dia <br><strong
                                    class="text-center">{{ date("Y-m-d", strtotime($campaign->date_donations)) }}</strong>
                        </p>
                    </div>
                @else
                    @if($campaign->participants->where('participant_id', Auth::id())->where("confirmed", 1)->count() == 0)
                        @if($campaign->groups->admin_id != Auth::user()->id)
                            <div class="col-xs-12">
                                <p class='paragraph4'>{{ trans("campaigns.textInscription") }}</p>
                            </div>

                            <div class="col-xs-12 ">
                                <button class='col-xs-12 button1 background-active-color text-center'
                                        v-on:click='myData.inscription = true'>{{ trans("campaigns.inscription") }}</button>
                            </div>
                            <br>
                        @endif
                    @endif

                    @if($campaign->state_id == 12 && $campaign->groups->admin_id == Auth::user()->id)

                        <div class="col-xs-12 ">
                            <button class='col-xs-12 button1 background-active-color text-center'
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

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title1">{{trans('campaigns.participants')}}</h2>
                </div>
            </div>
            <div class="row">
                @foreach($campaign->participants->where("confirmed", 1) as $participant)
                    <div class="col-md-2">
                        @include('partial/imageProfile', array('cover' => $participant->participant->avatar, 'id' =>$participant->participant->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                        <p class='text-center'>{{$participant->participant->first_name." ".$participant->participant->last_name}}</p>
                    </div>
                @endforeach
            </div>

        </article>

        <article class="col-md-4">

            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    @include('partial/imageProfile', array('cover' => $campaign->groups->image, 'id' =>$campaign->groups->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2 class="title1">{{$campaign->groups->name}}</h2>
                    </div>
                </div>

            </div>

        </article>

    </div>
    @include("campaigns/partial/donation")
    @include("campaigns/partial/inscription")
    @include("campaigns/partial/preinscription")
    @include("campaigns/partial/pay")
@endsection
