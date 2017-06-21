<div id="dealBox" class="col-xs-12 transition" data-in='{"top":"0%", "opacity":1}' data-out='{"top":"200%", "opacity":0}'>

    {!! Form::open(['url' => '/deal', 'method' => 'post', 'class' => 'form-custom validation', 'form-validation']) !!}
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title1">Propuesta de acuerdo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label for="dealDate" class="paragraph10">Fecha de realización del acuerdo</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="text" name="dealDate" id="dealDate" placeholder="dd/mm/aaaa" class="validation datepick col-xs-12"  data-validations='["required", "afterToday"]'>
                <div class="msg" errors='dealDate'>
                    <p error='afterToday'>No puedes proponer un acuerdo dias atras.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label for="dealHour" class="paragraph10">Hora</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="time" name="dealHour" id="dealHour" placeholder="hh:mm" class="validation col-xs-12"  data-validations='["required", "time", "afterTime"]' data-date='#dealDate'>
                <div class="msg" errors='dealHour'>
                    <p error='time'>El formato no es valido.</p>
                    <p error='afterTime'>elige un hora diferente.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label for="dealLocation" class="paragraph10">Lugar</label>
                <p><a class="buttonTransition" data-open='#suggestedSites'>{{trans('deals.suggestedSites')}}</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="hidden" name="coordinates" id='coordinates'>
                <input type="text" name="dealLocation" id="place" placeholder="Parque Simón Bolivar" size="60" class="validation col-xs-12"  data-validations='["required"]' />
                <div id="map_canvas" class="map"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="paragraph10">Tiempo de duración de la actividad que estás ofertando</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <input type="radio" name="valueService" value="1" id="dealtime1" class="circle validation" data-validations='["requiredRadio"]'>
                <label for="dealtime1">1 Hora</label>
            </div>
            <div class="col-xs-6">
                <input type="radio" name="valueService" value="2" id="dealtime2" class="circle validation" data-validations='["requiredRadio"]'>
                <label for="dealtime2">2 Horas</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6">
                <input type="radio" name="valueService" value="3" id="dealtime3" class="circle validation" data-validations='["requiredRadio"]'>
                <label for="dealtime3">3 Horas</label>
            </div>
            <div class="col-xs-6 col-sm-6">
                <input type="radio" name="valueService" value="4" id="dealtime4" class="circle validation" data-validations='["requiredRadio"]'>
                <label for="dealtime4">4 Horas</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label for="observations" class="paragraph10">Observaciones</label><span class="opacity">(Opcional)</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="observations" id='observations' placeholder="Ej. Pinceles, Acuarelas, Lienzos." ></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
                    Realizar Propuesta
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button class="col-xs-12 button10 background-white text-center buttonTransition" type="button" data-open='#listMessages'>
                    Cancelar
                </button>
            </div>
        </div>
    {!!Form::close()!!}

</div>
