<!-- template for the modal component -->
<script type="x/template" id="modal-template-deactivate">
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container">

        <div class="modal-header">          
            <h1 class="titulo1">Desactivar tu Cuenta </h1>
        </div>
        
        <div class="modal-body">

          <p class="parrafo1">
            Al desactivar tu cuenta, se inhabilitará tu nombre y perfil completo, com también no serán visibles tus fotos, ofertas y temas de interés del contenido que hayas compartido.
          </p>          

          <p class="parrafo1">
            ¿ Estás seguro de inhabilitar tu Cuenta ?
          </p>          

        </div>

        <div class="modal-footer">          
        	<div class="col-md-12">
	        	<button class="modal-default-button btn btn-raised btn-success"
	            @click="deactivateAccount()">
	            Si
	          </button>
            <button class="modal-default-button btn btn-raised btn-danger"
              @click="show = false">
              No
            </button>
        	</div>           	
        </div>
      </div>
    </div>
  </div>
</script>

<div id="app">
  <button id="show-modal" @click="showModal = true" class="col-md-12 deleteProfile">Desactivar Cuenta</button>  
  <modal :show.sync="showModal">
  </modal>
</div>