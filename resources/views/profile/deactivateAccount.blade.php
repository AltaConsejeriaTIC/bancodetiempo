<!-- template for the modal Deactivate Account -->
	<script type="x/template" id="modal-template">
	  <div class="modal-mask" v-show="show" transition="modal">
	    <div class="modal-wrapper">
	      <div class="modal-container">
	        <div class="modal-header">
	          <slot name="header">
	            <h3>Desactivar Cuenta</h3>
	          </slot>
	        </div>
	        
	        <div class="modal-body">
	          <slot name="body">
	            Contenido...
	          </slot>
	        </div>

	        <div class="modal-footer">
	          <slot name="footer">
	            default footer
	            <button class="modal-default-button"
	              @click="show = false">
	              Cancelar
	            </button>
	          </slot>
	        </div>
	      </div>
	    </div>
	  </div>
	</script>

	<div id="app">
    <button id="show-modal" class="col-md-12 deleteProfile" @click="showModal = true">Desactivar Cuenta</button>
    <!-- use the modal component, pass in the prop -->
    <modal :show.sync="showModal">

    </modal>
  </div> 