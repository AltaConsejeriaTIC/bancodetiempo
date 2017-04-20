{!! Form::open(['url' => '/deal', 'method' => 'post', 'class' => 'form-custom row validation', 'form-validation']) !!}
    <div class="modal fade" id="deal">
    <div class="modal-box" role="document">
      <div class="modal-content-box">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <button type="button" class="close circle-shape" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-header-welcome">
                <h1 class="title1">Propuesta de acuerdo</h1>
                <h4>Oferta: {{$conversation->service->name}}</h4>
            </div>

            <div class="modal-body">
                <div class="row not-margin">
                                <label for="dealDate" class="paragraph10">Fecha de realización del acuerdo</label>
                            </div>
                            <div class="row not-margin">
                                <input type="text" name="dealDate" id="dealDate" placeholder="dd/mm/aaaa" class="validation datepick"  data-validations='["required", "afterToday"]'>
                                <div class="msg" errors='dealDate'>
                                    <p error='afterToday'>No puedes proponer un acuerdo dias atras.</p>
                                </div>
                            </div>
                            <div class="row not-margin">
                                <label for="dealHour" class="paragraph10">Hora</label>
                            </div>
                            <div class="row not-margin">
                                <input type="time" name="dealHour" id="dealHour" placeholder="hh:mm" class="validation"  data-validations='["required", "time", "afterTime"]' data-date='#dealDate'>
                                <div class="msg" errors='dealHour'>
                                    <p error='time'>El formato no es valido.</p>
                                    <p error='afterTime'>elige un hora diferente.</p>
                                </div>
                            </div>
                            <div class="row not-margin">
                                <label for="dealLocation" class="paragraph10">Lugar</label>
                            </div>
                            <div class="row not-margin">
                                <input type="hidden" name="coordinates" id='coordinates'>
                                <input type="text" name="dealLocation" id="place" placeholder="Parque Simón Bolivar" size="60" class="validation"  data-validations='["required"]' />
                            </div>
                            <div class="row not-margin">
                                <div id="map_canvas" class="map"></div>
                            </div>
                            <div class="row not-margin">
                                <label class="paragraph10">Tiempo de duración de la actividad que estás ofertando</label>
                            </div>
                            <div class="row not-margin">
                                <div class="col-xs-6 col-sm-6">
                                    <input type="radio" name="valueService" value="1" id="dealtime1" class="circle validation" data-validations='["requiredRadio"]'>
                                    <label for="dealtime1">1 Hora</label>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <input type="radio" name="valueService" value="2" id="dealtime2" class="circle validation" data-validations='["requiredRadio"]'>
                                    <label for="dealtime2">2 Horas</label>
                                </div>
                            </div>
                            <div class="row not-margin">
                                <div class="col-xs-6 col-sm-6">
                                    <input type="radio" name="valueService" value="3" id="dealtime3" class="circle validation" data-validations='["requiredRadio"]'>
                                    <label for="dealtime3">3 Horas</label>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <input type="radio" name="valueService" value="4" id="dealtime4" class="circle validation" data-validations='["requiredRadio"]'>
                                    <label for="dealtime4">4 Horas</label>
                                </div>
                            </div>
                            <div class="row not-margin">
                <label for="observations" class="paragraph10">Observaciones</label><span class="opacity">(Opcional)</span>
                </div>
                <div class="row not-margin">

                  <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="observations" id='observations' placeholder="Ej. Pinceles, Acuarelas, Lienzos." ></textarea>

                </div>
                <div class="row not-margin">
                            <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
                                Realizar Propuesta
                            </button>
                            <div class="space10">
                            </div>
                                <button class="col-xs-12 button10 background-white text-center"	data-dismiss="modal" aria-label="Close">
                                    Cancelar
                                </button>
                        </div>
            </div>
            <div class="modal-footer">
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <deals token='{{ csrf_token() }}' service_id='{{$conversation->service_id}}' applicant="{{$conversation->applicant_id}}" conversation='{{$conversation->id}}'>

    </deals>
{!!Form::close()!!}
