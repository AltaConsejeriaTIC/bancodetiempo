<!-- template for the modal component -->
<script type="x/template" id="modal-template">
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container">

        <div class="modal-header">
          <slot name="header">
            default header
          </slot>
        </div>
        
        <div class="modal-body">
          
            Esta realmente
            sdasas sdasas sada 
            as Desactivard sada
            asdsadsa
            as Desactivardasa
            sadsad
            asdsadsaasdsa
            btn-dangersadsa
            btn-dangersadsasad
            sadasads
            asdsadsaasdsadsa
            btn-dangersadsasadad
            sadasadssa
            btn-dangersadsasadadad
            sadasadssasa
            btn-dangersadsasadadadad
            sadasadssasasa
            vm.$delete(key)
          
        </div>

        <div class="modal-footer">          
        	<div class="col-md-6">
	        	<button class="modal-default-button btn btn-raised btn-success"
	            @click="">
	            Si
	          </button>
        	</div>
        	<div class="col-md-6">
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