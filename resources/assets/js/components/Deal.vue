<template>
  <div class="modal fade" id="deal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-box" role="document">
      <div class="modal-content-box">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <button type="button" class="close circle-shape" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-header-welcome">
                <h1 class="title1">Propuesta de acuerdo</h1>
                <h4>Oferta:</h4>
            </div>
            <div class="modal-body">
            	<input type="hidden" name="service" v-model="this.service_id">
            	<input type="hidden" name="applicant" v-model="this.applicant">
            	<input type="hidden" name="conversation" v-model="this.conversation">
            	<div class="row not-margin">
								<label for="dealDate" class="paragraph10">Fecha de realización del acuerdo</label>
							</div>
							<div class="row not-margin">
								<input type="date" name="dealDate" id="dealDate" placeholder="dd/mm/aaaa">
							</div>
							<div class="row not-margin">
								<label for="dealHour" class="paragraph10">Hora</label>
							</div>
							<div class="row not-margin">
								<input type="time" name="dealHour" id="dealHour" placeholder="hh:mm">
							</div>
							<div class="row not-margin">
								<label for="dealLocation" class="paragraph10">Lugar</label>
							</div>
							<div class="row not-margin">
								<input type="text" name="dealLocation" placeholder="Parque Simón Bolivar">
							</div>
							<div class="row not-margin">
								<label class="paragraph10">Tiempo de duración de la actividad que estás ofertando</label>
							</div>
							<div class="row not-margin">
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="1" id="time1" class="circle validation" v-model="valueService" data-validations='["required"]'>
									<label for="time1">1 Hora</label>
								</div>
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="2" id="time2" class="circle validation" v-model="valueService" data-validations='["required"]'>
									<label for="time2">2 Horas</label>
								</div>
							</div>
							<div class="row not-margin">
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="3" id="time3" class="circle validation" v-model="valueService" data-validations='["required"]'>
									<label for="time3">3 Horas</label>
								</div>
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="4" id="time4" class="circle validation" v-model="valueService" data-validations='["required"]'>
									<label for="time4">4 Horas</label>
								</div>
							</div>
							<div class="row not-margin">
                <label for="observations" class="paragraph10">Observaciones</label>
            	</div>
	            <div class="row not-margin">
	              <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="observations" id='observations' v-model='observations' placeholder="Ej. Pinceles, Acuarelas, Lienzos."  data-validations='["required", "min:50", "max:250"]'></textarea>
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
</template>
<script>

	export default
	{
		props:['service_id', 'token','applicant','conversation'],
		mounted()
		{

		}
	}
</script>
