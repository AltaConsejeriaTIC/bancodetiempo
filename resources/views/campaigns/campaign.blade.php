@extends('layouts.app')

@section('content')

@if(!is_null(Auth::User()))
    @include('nav',array('type' => 2))
@else
    @include('nav',array('type' => 3))
@endif

    <div class="container">

        <article class="col-md-8">

            <div class="row">
                <div class="col-md-12 campaignCover">
                    <img src="/{{$campaign->image}}" class='campaignCover' alt="{{$campaign->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <h2 class="title title2-service">{{$campaign->name}}</h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md 12">
                    <p class="paragraph4">{{$campaign->description}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <p class="paragraph4">
                        <strong>Dorados de esta campaña</strong> {{$campaign->credits}}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md 12">
                    <p class="paragraph4">
                        <strong>Fecha de la campaña</strong>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md 12">
                    <p class="paragraph4">
                        {{date("F j Y g:i a", strtotime($campaign->date))}}
                    </p>
                </div>
            </div>

        </article>

        <article class="col-md-4">

            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    @include('partial/imageProfile', array('cover' => $campaign->groups->image, 'id' =>$campaign->groups->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                </div>
            </div>
            <div >
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2 class="title1">{{$campaign->groups->name}}</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 text-center">
                        <p class='paragraph4'>{{ str_limit($campaign->groups->description, 100)}}</p>
                    </div>

                    @if($campaign->groups->admin_id != Auth::user()->id)
                        <!--<div class="col-xs-12">
                            <p class='paragraph4'>¿Te interesa está campaña?</p>
                        </div>

                        <div class="col-xs-12 ">
                            <button class='col-xs-12 button1 background-active-color text-center' v-on:click='putMyData("contactMail", true)'>Comunícate con {{$campaign->groups->name}}</button>
                        </div>-->

                    @endif

                    @if($campaign->allows_registration == 0)
                        <div class="col-xs-12">
                            <p class='paragraph4'>{{ trans("campaigns.textDonation") }}</p>
                        </div>

                        <div class="col-xs-12 ">
                            <button class='col-xs-12 button1 background-active-color text-center' v-on:click='myData.donation = true'>{{ trans("campaigns.donation") }}</button>
                        </div>
                        <br>
                        <div class="col-xs-12">
                            <p class='paragraph4'>Podras inscribirte a esta campaña el dia <br><strong class="text-center">{{ date("Y-m-d", strtotime($campaign->date_donations)) }}</strong></p>
                        </div>
                    @else
                       @if($campaign->groups->admin_id != Auth::user()->id)
                            <div class="col-xs-12">
                                <p class='paragraph4'>{{ trans("campaigns.textInscription") }}</p>
                            </div>

                            <div class="col-xs-12 ">
                                <button class='col-xs-12 button1 background-active-color text-center' v-on:click='myData.donation = true'>{{ trans("campaigns.inscription") }}</button>
                            </div>
                            <br>

                        @endif


                    @endif

                </div>
            </div>

        </article>

    </div>
@include("campaigns/partial/donation")
@endsection
