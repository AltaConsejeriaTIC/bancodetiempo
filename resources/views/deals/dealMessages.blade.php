
@if($dealState != null)
    @foreach($deals as $dealSearch)
      @foreach($dealSearch->dealStates as $value)
        @if($value->state_id == $message->dealState && $value->deal_id == $message->deal)
          <div class="messageDealText col-md-10">
            <div class="row">
              <h1 class="title1 text-center">Propuesta de acuerdo</h1>

              @if($value->state_id == 8 && Auth()->user()->id == $deal->user_id && $message->sender == $deal->user->id)
                <h4 class="textDealAgreedState text-red text-center">¡No aceptaste la propuesta de {{$deal->service->user->first_name}}!</h4>
              @endif

              @if($value->state_id == 8 && Auth()->user()->id == $deal->service->user->id && $message->sender == $deal->user->id)
                <h4 class="textDealAgreedState text-red text-center">¡{{$deal->user->first_name}} ha declinado tu propuesta!</h4>
              @endif

              @if($value->state_id == 8 && Auth()->user()->id == $deal->user_id && $message->sender == $deal->service->user->id )
                <h4 class="textDealAgreedState text-red text-center">¡{{$deal->service->user->first_name}} ha cancelado la propuesta!</h4>
              @endif

              @if($value->state_id == 8 && $message->sender == $deal->service->user->id && Auth()->user()->id == $deal->service->user->id)
                <h4 class="textDealAgreedState text-red text-center">¡Has cancelado tu propuesta!</h4>
              @endif

            </div>
            <div class="row not-margin">
              <p class="not-margin">
                <strong>Oferta:</strong> {{$dealSearch->service->name}}
              </p>
              <p class="not-margin">
                <strong>Fecha a realizarse:</strong> {{$dealSearch->date}}
              </p>
              <p class="not-margin">
                <strong>Hora:</strong> {{$dealSearch->time}}
              </p>
              <p class="not-margin">
                <strong>Lugar:</strong> {{$dealSearch->location}}
              </p>
              <p class="not-margin">
                <strong>Valor:</strong> <img src="/images/moneda.png" class="not-padding coinSmall icon-nav text-center"> {{$dealSearch->value}} Dorados
              </p>
            </div>
          </div>
        @endif
      @endforeach
    @endforeach
@endif
