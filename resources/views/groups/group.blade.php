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
                <div class="col-md-12 groupCover">
                    <img src="/{{$group->image}}" class='groupCover' alt="{{$group->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <h2 class="title title2-service">{{$group->name}}</h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md 12">
                    <p class="paragraph4">{{$group->description}}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md 12">
                    <h2 class="title title2-service">{{ trans("groups.campaign") }}</h2>
                </div>
            </div>

            @if($group->admin_id == Auth::user()->id)

                <div class="row">
                   <div class="col-md-6">
                       <button class="col-xs-12 buttonService background-white" @click='myData.newcampaign = true'>
                          <i class="fa fa-plus-square icons" aria-hidden="true"></i>
                          <p>{{ trans("groups.newCampaign") }}</p>
                        </button>
                   </div>

                </div>

            @endif

            <div class="row">
                @foreach($group->campaigns as $key => $campaign)
                  <div class='col-md-6 col-xs-12 col-sm-6'>
                      @include('partial/campaignBox')
                  </div>
                @endforeach
            </div>

        </article>

        <article class="col-md-4">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="title1">{{ trans("groups.collaborators") }}</h2>
                </div>
            </div>
            <div class="row">
            @foreach($group->collaborators as $k => $collaborator)

                <div class="col-md-6">
                    <div class="col-md-8 col-md-offset-2">
                       @include('partial/imageProfile', array('cover' => $collaborator->user->avatar, 'id' =>$collaborator->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                    </div>
                    <div class="clearfix"></div>
                    <p class="paragraph2 text-center">{{ $collaborator->user->first_name ." ". $collaborator->user->last_name }}</p>
                </div>
                @if($k%2 != 0)
                    <div class="clearfix"></div>
                @endif

            @endforeach
            </div>

        </article>

    </div>

@include('groups/partial/formCampaign')

@endsection
