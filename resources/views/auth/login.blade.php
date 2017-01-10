<!-- template for the modal component -->
<script type="x/template" id="modal-template-login">
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container">

        <div>
          <button type="button" @click.prevent="show = false" class="close" data-dismiss="alert">&times;</button>
        </div>

        <div class="modal-header">          
            <h1 class="title1">Inicia sesión </h1>
        </div>
        
        <div class="modal-body">

          <p class="parrafo2">
            {{ trans('dictionary.registrationMessage') }}
          </p> 
          
          <div>            
            <a href="{{ url('loginRedes/facebook') }}" class="registroFacebook"></a>
			      <a href="{{ url('loginRedes/google') }}" class="registroGoogle"></a>
			      <a href="{{ url('loginRedes/linkedin') }}" class="registroLinkedin"></a>                       
          </div>                      
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</script>

<div> 
  <modal :show.sync="showModal">
  </modal>
</div>

			      