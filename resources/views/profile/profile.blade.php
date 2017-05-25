@extends('layouts.app')

@section('content')
    @if(session('response'))
      <generalmodal  name='winCoin' :state='myData.winCoin' state-init='true'>
        <div slot="modal" class='box row'>      
          <h1 class='title1 col-md-12 text-center'>¡Acabas de ganar 4 dorados!</h1>     
          <p class="paragraph1 col-md-12 text-center">A partir de este momento puedes tomar una oferta.</p>
        </div>
      </generalmodal>
      <modaltimeoff name="winCoin">
      </modaltimeoff>
    @endif
    @include('nav',array('type' => 2))
    
<section class="row">

    <div class="container">

        @include('profile.partial.detailProfile')

        <ul class="nav nav-pills col-md-8 col-xs-12">
            <li class="active">
                <a href="#tabServices" data-toggle="tab">{{ trans('profile.services') }}</a>
            </li>
            <li>
                <a href="#tabGroups" data-toggle="tab">{{ trans('profile.groups') }}</a>
            </li>
        </ul>

        <div class="tab-content clearfix col-md-8 col-xs-12">
            <div class="tab-pane active" id="tabServices">
                @include('profile.partial.tabService')
            </div>

	       <div class="tab-pane" id="tabGroups">
                @include('profile.partial.tabGroups')
            </div>
        </div>

    </div>

</section>

@include("profile/partial/formNewGroup")
@endsection
