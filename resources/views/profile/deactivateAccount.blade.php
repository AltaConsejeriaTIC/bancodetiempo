<!-- template for the modal component -->
<script type="x/template" id="modal-template">
  <div class="modal-mask" v-show="show" transition="modal">
    <section class='row'>
      <div class="container background-white">
		<div class='col-xs-12'>
			<div class="row">
				<h1 class="title1 col-xs-12">¡Lamentamos que te vayas! </h1>
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
			<form @submit.prevent="deactivateAccount" class='row form-custom'>
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" >
					<textarea class="form-bt col-xs-12" rows="6"  name="justification" placeholder="Ej. Tengo poco tiempo, no lo encuentro útil, tengo otra cuenta, otro..."></textarea>			
			</form>
			<div style='height:10px;'></div>
			<div class="row">				             
                <button class="col-xs-12  button10 background-white">
                  Desactivar Cuenta
                </button>
			</div>
			<div style='height:10px;'></div>
			<div class="row">
				<button class="col-xs-12 editProfile button1 background-active-color" @click.prevent="show = false">
                  Cancelar
                </button>
			</div>
			<div style='height:10px;'></div>
			
		</div>
	  </div>
	</section>

</script>

<div>
  <button id="show-modal" @click="showModal = true" class="col-xs-12 button10 background-white">Desactivar Cuenta</button>
  <modal :show.sync="showModal">

  </modal>

</div>
