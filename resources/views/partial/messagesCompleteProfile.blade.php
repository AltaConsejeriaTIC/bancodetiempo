@php($hiddenMessagesConpleteProfile = session('hiddenMessagesCompleteProfile'))
@if(!$hiddenMessagesConpleteProfile)
    @if(Auth::user()->aboutMe == '' || Auth::user()->services->count() == 0)
    <div class="container" id='messagesProfile' v-show='{{$state}}' v-cloak>
        <div class="row bg-info">
            <button type="button" class="close col-xs-1 col-xs-offset-11 text-center"><span>×</span></button>
            <div class="col-sm-2 col-sm-offset-2 col-xs-6 col-xs-offset-3 text-center">
               <br>
                <img src="/images/confetti.svg" alt="">
            </div>
            <div class="col-xs-12 col-sm-7">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="title1">¡Bienvenido a Bogotá Cambalachea!</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p>Actualmente cuentas con 1 dorado para Cambalachear. <strong>¿Quieres ganar más dorados?</strong></p>
                    </div>
                </div>
                <div class="row">
                @if(Auth::user()->aboutMe == '')
                    <div class="col-xs-12">
                        <p><strong>- {!! trans('home.completeProfileMsg1') !!}</strong></p>
                    </div>
                @endif
                </div>
                <div class="row">
                @if(Auth::user()->services->count() == 0)
                    <div class="col-xs-12">
                        <p><strong>- {!! trans('home.completeProfileMsg2') !!}</strong></p>
                    </div>
                @endif
                </div>
            </div>
            
        </div>
    </div>
    @endif
@endif
