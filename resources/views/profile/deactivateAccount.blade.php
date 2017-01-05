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
            <form @submit.prevent="deactivateAccount">
              <input type="hidden" name="token" id="token" value="{{ csrf_token() }}" >
  	        	<button class="modal-default-button btn btn-raised btn-success">
  	            Si
  	          </button>
              <button class="modal-default-button btn btn-raised btn-danger"
                @click.prevent="show = false">
                No
              </button>
            </form>
        	</div>           	
        </div>
      </div>
    </div>
  </div>
</script>

<div>  
  <button id="show-modal" @click="showModal = true" class="col-md-12 deleteProfile">Desactivar Cuenta</button>  
  <modal :show.sync="showModal">

  </modal>
  <hr>
      <pre> @{{ $data | json }} </pre> 
</div>