@extends('layouts.app')

@section('content')

@include('nav',array('type' => 2))
    
<div class="row">

    <div class="container">

        @include('profile.partial.detailProfile')

        <ul class="nav nav-pills col-md-8 col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-0">
            <li class="active">
                <a href="#tabServices" data-toggle="tab" class="paragraph1">{{ trans('profile.services') }}</a>
            </li>
            <li>
                <a href="#tabCampaings" data-toggle="tab" class="paragraph1">{{ trans('profile.campaigns') }}</a>
            </li>
        </ul>

        <div class="tab-content clearfix col-md-8 col-sm-6 col-xs-12">
            <div class="tab-pane active" id="tabServices">
                @include('profile.partial.tabService')
            </div>

	       <div class="tab-pane" id="tabCampaings">
                @include('profile.partial.tabCampaigns')
            </div>
        </div>

        <div class="row visible-xs">
            <div class="col-xs-12">
                 {!! Form::open(['url' => 'deactivateAccount', 'method' => 'post', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <deactivate></deactivate>
                {!! Form::close() !!}
                <button class="col-xs-10 col-xs-offset-1 button10 background-white" data-toggle="modal" data-target="#deactivate">{{ trans('profile.desactiveAccount') }}</button>
            </div>
        </div>

    </div>

</div>

@include("profile/partial/formNewCampaign")
@endsection
