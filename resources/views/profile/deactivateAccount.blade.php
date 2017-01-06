<!-- template for the modal component -->
<script type="x/template" id="modal-template-deactivate">
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container">

        <div>
          <button type="button" @click.prevent="show = false" class="close" data-dismiss="alert">&times;</button>
        </div>

        <div class="modal-header">          
            <h1 class="titulo1">¡Lamentamos que te vayas! </h1>
        </div>
        
        <div class="modal-body">

          <p class="parrafo2">
            Recuerda que puedes volver cuando lo  desees. Tu información permanecerá intacta.
          </p>          

          <p class="parrafo2">
            ¿Podrías contarnos el motivo de tu decisión? <span class="opcional">(Opcional)</span>
          </p> 

          
            <textarea class="form-bt col-md-12" rows="8"  name="justification" placeholder="Ej. Tengo poco tiempo, no lo encuentro útil, tengo otra cuenta, otro..."></textarea>
          
            <form @submit.prevent="deactivateAccount">
            <div class="">
              <input type="hidden" name="token" id="token" value="{{ csrf_token() }}" >              
                <button class="col-md-12 deleteProfile modal-default-button-success">
                  Desactivar Cuenta
                </button>
                <button class="col-md-12 editProfile modal-default-button-close"
                  @click.prevent="show = false">
                  Cancelar
                </button>
            </div>              
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</script>

<div>  
  <a id="show-modal" @click="showModal = true" class="col-md-12 deleteProfile">Desactivar Cuenta</a>  
  <modal :show.sync="showModal">

  </modal>
  
</div>
