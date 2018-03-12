@php
$state = (Auth::user()->state_id == 1)
@endphp
<nav class='navbar navbar-default navbar-static-top nav2'>
    <div class="container">
        <div class='row flex-center'>

            <div class="col-xs-2 visible-xs paragraph1 text-white text-center">
                <i class="fa fa-search" id="openSearch"></i>
            </div>

            <div class="col-xs-8 col-sm-3" id='logo'>
                <a href="/index">
                    <img class="iconbar2" src="{{ asset('images/logo2.png') }}" alt="Logo" :style='{zIndex:myData.zindex}'/>
                </a>
            </div>

            <div class='hidden-xs col-sm-3'>
                {!! Form::open(['url' => 'filter', 'method' => 'get']) !!}
                <input type='text' class='filter col-sm-12' name='filter' value='{{ Session::get("filters.text") }}' id='filter1' placeholder='{{ trans("nav.inputFind") }}' v-show='{{$state}}' v-cloak>
                <label for="filter1" class=" fa fa-search " v-show='{{$state}}'></label>
                {!! Form::close() !!}
            </div>

            <div class="hidden-xs col-sm-5 flex-center not-padding">
                    <div class="col-sm-4 flex-center not-padding"   v-show='{{$state}}' v-cloak>
                        <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav text-center col-sm-2" />&nbsp;&nbsp;
                        <p class="paragraph4 text-white">Tienes<br>{{ Auth::user()->credits }} {{ trans('nav.credits') }}</p>
                    </div>
                    <div class="hidden-xs not-padding text-center col-sm-6"   v-show='{{$state}}' v-cloak>
                        <button class="button9 newservice" data-toggle="modal" data-target="#NewService">{{ trans('nav.newOffer') }}</button>
                    </div>
                    <div class="col-sm-1 not-padding" onclick='location.href="/inbox"' v-show='{{$state}}' v-cloak>
                        @if(App\Helpers::getNotificationsUser()>0)
                            <i class="fa fa-envelope icon-nav notification text-left"><span>{{App\Helpers::getNotificationsUser()}}</span></i>
                        @else
                            <i class="fa fa-envelope icon-nav notification text-left"></i>
                        @endif
                    </div>
            </div>

            <div class='hidden-xs col-xs-1 col-sm-1 text-right icon-profile padding-top'>
                @include('partial/imageProfile', array('cover' => 'getImg?img='.Auth::user()->avatar.'&w=200', 'id' => 'myAvatar', 'border' => '#fff', 'borderSize' => '1px'))
            </div>

            <div class=' hidden-xs col-xs-2 col-sm-2 padding-top text-left dropdown'>

                <div class='col-xs-12 not-padding menu dropdown-toggle flex-center ' data-toggle="dropdown">

                    <span class='not-padding not-margin paragraph4  text-white'>{{Auth::user()->first_name}}</span>
                    <i class='iconmenu menu fa fa-angle-down'></i>

                </div>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('profile') }}">{{ trans('nav.profile') }}</a>
                    </li>
                    <li>
                        <a href="{{ url('/validateLogout') }}" class="link1">{{ trans('nav.logout') }}</a>
                    </li>
                </ul>

            </div>

            <ul class="menuMobile visible-xs col-xs-2 not-padding">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-bars"></i></a>
                    <ul class="dropdown-menu">
                        <li v-show='{{$state}}'>
                            <a href="/inbox">
                                <i class="material-icons notification item-icon">question_answer<span
                                            class="reset-font">{{App\Helpers::getNotificationsUser()}}</span></i> {{ trans('nav.messages') }}
                            </a>
                        </li>
                        <li v-show='{{$state}}'>
                            <a data-toggle="modal" data-target="#NewService">
                                <i class="material-icons item-icon">add_circle</i> {{ trans('nav.newOffer') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('profile') }}"><i
                                        class="material-icons item-icon">account_circle</i> {{ trans('nav.profile') }}</a>
                        </li>
                        <li>
                            <a href="/how">
                                <i class="material-icons item-icon">info</i> {{ trans('nav.howitworks') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/validateLogout') }}"><i
                                        class="material-icons item-icon">exit_to_app</i> {{ trans('nav.logout') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
<button class="btn-notificationPush hide" id='btnPush'>
    Bogotá Cambalachea necesita tu permiso para habilitar las notificaciones de escritorio
</button>
@if($state)
    @include('partial.messagesCompleteProfile')
@endif

{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation']) !!}
	<newservice :categories='this.myData.categories' :tags-service='this.myData.tags'></newservice>
{!! Form::close() !!}
<div class="clearfix"></div>
<div id="findMobile">
    <div class="shadow findMobile"></div>
    <div class="box">
        {!! Form::open(['url' => 'filter', 'method' => 'get', 'class' => 'col-xs-12']) !!}
        <div class="row">
            <button type="button" @click='myData.newcampaign = false' class="close circle-shape"><span
                        aria-hidden="true">×</span></button>
            <div class="col-xs-12">
                <input type='text' class='filter col-xs-12' name='filter' value='{{ Session::get("filters.text") }}'
                       id='filter1' placeholder='{{ trans("nav.inputFind") }}'>
                <label for="filter1" class=" fa fa-search "></label>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="button9 col-xs-12">{{ trans('nav.find') }}</button>
            </div>
        </div>
        <br>
        {!! Form::close() !!}
    </div>
</div>


