
@if($dealState != null)
  {!! Form::open(['url' => '/deal', 'method' => 'put', 'class' => 'form-custom row validation']) !!}
    <div class="messageDealText col-md-10">
      <input type="hidden" name="deal" value="{{$deal->id}}">
      <input type="hidden" name="conversation" value="{{$conversation->id}}">
      <div class="row">
        @if($dealState->state_id == 4 || $dealState->state_id == 8)
          <h1 class="title1 text-center">Propuesta de acuerdo</h1>
        @endif
        
        @if($dealState->state_id == 7)
          <h1 class="title1 text-center">Acuerdo</h1>
        @endif
        
        @if($dealState->state_id == 4 && Auth()->user()->id == $deal->user_id)
          <h4 class="textDealIntialState text-center">¡Tienes 72 horas para aceptar!</h4>
        @endif
        
        @if($dealState->state_id == 4 && Auth()->user()->id == $deal->service->user->id)
          <h4 class="textDealIntialState text-center">¡Esperando a que {{$deal->user->first_name}} acepte tu propuesta!</h4>
        @endif

        @if($dealState->state_id == 7 && Auth()->user()->id == $deal->service->user->id)
          <h4 class="textDealAgreedState text-center">¡Tienes un acuerdo con {{$deal->user->first_name}}!</h4>
        @endif

        @if($dealState->state_id == 7 && Auth()->user()->id == $deal->user->id)
          <h4 class="textDealAgreedState text-center">¡Tienes un acuerdo con {{$deal->service->user->first_name}}!</h4>
        @endif
        
        @if($dealState->state_id == 8 && Auth()->user()->id == $deal->user_id && $message->sender == $deal->user->id)
          <h4 class="textDealAgreedState text-red text-center">¡No aceptaste la propuesta de {{$deal->service->user->first_name}}!</h4>
        @endif

        @if($dealState->state_id == 8 && Auth()->user()->id == $deal->service->user->id && $message->sender == $deal->user->id)
          <h4 class="textDealAgreedState text-red text-center">¡{{$deal->user->first_name}} ha declinado tu propuesta!</h4>
        @endif

        @if($dealState->state_id == 8 && $message->sender == $deal->service->user->id && Auth()->user()->id == $deal->user_id)
          <h4 class="textDealAgreedState text-red text-center">¡{{$deal->user->first_name}} ha cancelado la propuesta!</h4>
        @endif

        @if($dealState->state_id == 8 && $message->sender == $deal->service->user->id && Auth()->user()->id == $deal->service->user->id)
          <h4 class="textDealAgreedState text-red text-center">¡Has cancelado tu propuesta!</h4>
        @endif

      </div>
      <div class="row not-margin">
        <p class="not-margin">
          <strong>Oferta:</strong> {{$deal->service->name}}
        </p>
        <p class="not-margin">
          <strong>Fecha a realizarse:</strong> {{$deal->date}}
        </p>
        <p class="not-margin">
          <strong>Hora:</strong> {{$deal->time}}
        </p>
        <p class="not-margin">
          <strong>Lugar:</strong> {{$deal->location}}
        </p>
        <p class="not-margin">
          <strong>Valor:</strong> <img src="/images/moneda.png" class="not-padding coinSmall icon-nav text-center"> {{$deal->value}} Dorados
        </p>
      </div>
      <div class="space20"></div>
      @if($dealState->state_id == 4)
        <div class="row not-margin mapMessage">
        </div>
      @endif

      @if($dealState->state_id != 8)
        <div class="space20"></div>
        <div class="row not-margin text-center">
            @if($dealState->state_id == 4 && Auth()->user()->id == $deal->user_id)
              <div class="col-md-4 col-md-offset-2 text-center">
                <button name="agree" class='button1 background-active-green-color col-md-12'>Aceptar</button>
              </div>
            @endif
            @if($dealState->state_id == 4 && Auth()->user()->id == $deal->user_id)
              <div class="col-md-4 text-center">
                <button name="decline" class='dealButtonCancel background-white col-md-12'>
                    Declinar
                </button>
              </div>
            @else
              <div class="col-md-4 col-md-offset-4 text-center">
                <button name="decline" class='dealButtonCancel background-white col-md-12'>
                    Cancelar
                </button>
              </div>
            @endif
        </div>
      @endif
    </div>
  {!!Form::close()!!}
@endif
