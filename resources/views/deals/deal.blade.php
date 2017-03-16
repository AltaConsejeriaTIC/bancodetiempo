
@if($dealState != null)
  {!! Form::open(['url' => '/deal', 'method' => 'put', 'class' => 'form-custom row validation']) !!}
    <div class="messageDealText col-md-10">
      <input type="hidden" name="deal" value="{{$deal->id}}">
      <input type="hidden" name="applicant" value="{{$deal->user_id}}">
      <input type="hidden" name="userService" value="{{$deal->service->user->id}}">
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
          <h4 class="textDealAgreedState textColorSuccessDeal text-center">¡Tienes un acuerdo con {{$deal->user->first_name}}!</h4>
        @endif

        @if($dealState->state_id == 7 && Auth()->user()->id == $deal->user->id)
          <h4 class="textDealAgreedState textColorSuccessDeal text-center">¡Tienes un acuerdo con {{$deal->service->user->first_name}}!</h4>
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

        @if($dealState->state_id == 12)
            @if($conversation->applicant_id == Auth::User()->id)
                @if(is_null($deal->response_applicant))
                    @if(!is_null($deal->response_offerer))
                        <h4 class="textDealAgreedState text-red text-center">{{$conversation->service->user->first_name}} ha confirmado la realización del acuerdo. ¡Tienes 72 horas para confirmar!</h4>
                    @else
                        <h4 class="textDealAgreedState text-red text-center">¡Califica tu experiencia!</h4>
                    @endif
                @else
                    <h4 class="textDealAgreedState text-red text-center">¡Esperando la confirmación de {{$conversation->service->user->first_name}} !</h4>
                @endif
            @endif

            @if($conversation->service->user_id == Auth::User()->id)
                @if(is_null($deal->response_offerer))
                    @if(!is_null($deal->response_applicant))
                        <h4 class="textDealAgreedState text-red text-center">{{$conversation->applicant->first_name}} ha confirmado la realización del acuerdo. ¡Tienes 72 horas para confirmar!</h4>
                    @else
                        <h4 class="textDealAgreedState text-red text-center">¡Califica tu experiencia!</h4>
                    @endif
                @else
                    <h4 class="textDealAgreedState text-red text-center">¡Esperando la confirmación de {{$conversation->applicant->first_name}} !</h4>
                @endif
            @endif
        @endif

        @if($dealState->state_id == 10)
            @if($conversation->applicant_id == Auth::User()->id)
                @if(is_null($deal->response_applicant))
                    <h4 class="textDealAgreedState text-red text-center">No confirmaste a tiempo</h4>
                @endif
                <h4 class="textDealAgreedState text-red text-center">¡El acuerdo con {{$conversation->service->user->first_name}} ha finalizado!</h4>
            @elseif($conversation->service->user_id == Auth::User()->id)
                @if(is_null($deal->response_offerer))
                    <h4 class="textDealAgreedState text-red text-center">No confirmaste a tiempo</h4>
                @endif
                <h4 class="textDealAgreedState text-red text-center">¡El acuerdo con {{$conversation->applicant->first_name}} ha finalizado!</h4>
            @endif
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
            @elseif($dealState->state_id != 12 && $dealState->state_id != 10)
              <div class="col-md-4 col-md-offset-4 text-center">
                <button name="decline" class='dealButtonCancel background-white col-md-12'>
                    Cancelar
                </button>
              </div>
            @endif
        </div>
      @endif

      @include('deals/responseDeal')

      <hr>

      @if($dealState->state_id == 12)
        @if($conversation->applicant_id == Auth::User()->id && is_null($deal->response_applicant))
            <div class='row not-margin'>
               <div class='content'>
                   <div class="row">
                       <div class="col-md-12">
                            <h1 class="title2">¿Recibiste con éxito el servicio: <i>{{$deal->service->name}}</i> de {{$conversation->service->user->first_name}}?</h1>
                       </div>
                   </div>
                   <div class="row">
                      <div class="col-md-2 col-md-offset-4">
                          <button type="button" class="button1 showModal background-active-green-color col-xs-12 " deal='{{$conversation->deals->last()->id}}'  modal='form-observation'>Si</button>
                      </div>
                      <div class="col-md-2">
                          <button type="button" class='button10 background-white col-xs-12 showModal' deal='{{$conversation->deals->last()->id}}' modal='form-bad-observation'>No</button>
                      </div>

                   </div>
               </div>
            </div>
        @elseif($conversation->service->user_id == Auth::User()->id && is_null($deal->response_offerer))
           <div class='row not-margin'>
               <div class='content'>
                   <div class="row">
                       <div class="col-md-12">
                            <h1 class="title2">¿Realizaste exitosamente el intercambio con {{$conversation->applicant->first_name}}?</h1>
                       </div>
                   </div>
                   <div class="row">
                      <div class="col-md-2 col-md-offset-4">
                          <button type="button" class="button1 showModal background-active-green-color col-xs-12 " deal='{{$conversation->deals->last()->id}}'  modal='form-observation'>Si</button>
                      </div>
                      <div class="col-md-2">
                          <button type="button" class='button10 background-white col-xs-12 showModal' deal='{{$conversation->deals->last()->id}}' modal='form-bad-observation'>No</button>
                      </div>

                   </div>
               </div>
            </div>
        @endif
    @endif



    </div>
  {!!Form::close()!!}
@endif
