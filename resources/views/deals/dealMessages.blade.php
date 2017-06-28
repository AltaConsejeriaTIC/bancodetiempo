
@if($dealState != null)
    @foreach($deals as $dealSearch)
      @foreach($dealSearch->dealStates as $value)
        @if($value->state_id == $message->dealState && $value->deal_id == $message->deal)
          <div class="messageDealText col-md-10">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="title1 text-center">Propuesta de acuerdo</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @if($value->state_id == 8 && Auth()->user()->id == $deal->user_id && $message->sender == $deal->user->id)
                        <h4 class="textDealAgreedState text-red text-center">¡No aceptaste la propuesta de {{$deal->service->user->first_name}}!</br>Solicítale que realice una nueva.</h4>
                    @endif

                    @if($value->state_id == 8 && Auth()->user()->id == $deal->service->user->id && $message->sender == $deal->user->id)
                        <h4 class="textDealAgreedState text-red text-center">¡{{$deal->user->first_name}} ha declinado tu propuesta! </br>Realiza una nueva.</h4>
                    @endif

                    @if($value->state_id == 8 && Auth()->user()->id == $deal->user_id && $message->sender == $deal->service->user->id )
                        <h4 class="textDealAgreedState text-red text-center">¡{{$deal->service->user->first_name}} ha cancelado la propuesta!<br> Solicítale que realice una nueva.</h4>
                    @endif

                    @if($value->state_id == 8 && $message->sender == $deal->service->user->id && Auth()->user()->id == $deal->service->user->id)
                        <h4 class="textDealAgreedState text-red text-center">¡Has cancelado tu propuesta! </br>Realiza una nueva.</h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p>
                        <strong>Oferta:</strong> {{$dealSearch->service->name}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="not-margin">
                        <strong>Fecha a realizarse:</strong> {{$dealSearch->date}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="not-margin">
                        <strong>Hora:</strong> {{$dealSearch->time}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="not-margin">
                        <strong>Lugar:</strong> {{$dealSearch->location}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="not-margin">
                        <strong>Valor:</strong> <img src="/images/moneda.png" class="not-padding coinSmall icon-nav text-center"> {{$dealSearch->value}} Dorados
                    </p>
                </div>
            </div>
          </div>
        @endif
      @endforeach
    @endforeach
@endif
