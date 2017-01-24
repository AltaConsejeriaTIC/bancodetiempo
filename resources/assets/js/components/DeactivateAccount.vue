<template>
	<transition name="modal" >
    <div class="modal-mask" >
      <div class="modal-wrapper">
        <div class="modal-container">
          <div class="col-md-1 col-md-offset-11">
            <button type="button" @click="$emit('close')" class="close" data-dismiss="alert">&times;</button>
          </div>
					
					<div class="row">
						<div class='col-xs-12'>
							<div class="row">
								<h1 class="title1 col-xs-12 text-center">¡Lamentamos que te vayas! </h1>
							</div>
							<div class='row'>
								<p class="paragraph2">
				      		Recuerda que puedes volver cuando lo  desees. Tu información permanecerá intacta.
				    		</p>
							</div>
							<div class="row">
								 <p class="paragraph2">
							      ¿Podrías contarnos el motivo de tu decisión? <span class="text-opacity">(Opcional)</span>
							    </p>
							</div>								
							<div class="row">
								<textarea class="form-bt col-xs-12" rows="6"  name="justification" placeholder="Ej. Tengo poco tiempo, no lo encuentro útil, tengo otra cuenta, otro..."></textarea>			
							</div>
							<div class="space10"></div>
							<div class="row">				             
			          <button type="submit" class="col-xs-12 button10 background-white">
			            Desactivar Cuenta
			          </button>
							</div>
							<div class="space10"></div>
							<div class="row">
								<button class="col-xs-12 button1 background-active-color" @click.prevent="$emit('close')">
						      Cancelar
						    </button>
							</div>
							<div class="space10"></div>
						</div>
					</div>					
      </div>
    </div>
  </transition>
</template>