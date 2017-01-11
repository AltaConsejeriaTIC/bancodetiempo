<!-- template for the modal component -->
<script type="x/template" id="modal-template">
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
          <p class="paragraph2">
            {{ trans('dictionary.registrationMessage') }}
          </p>            
          <div class="row">
            <div class="col-xs-12">
              <a href="{{ url('loginRedes/facebook') }}" class="col-xs-12 col-md-12 button6 social-button facebook">Ingresa con Facebook <i class="fa fa-facebook"></i></a>
            </div>
            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <a href="{{ url('loginRedes/google') }}"  class="col-xs-12 col-md-12 button6 social-button google">Ingresa con Google <i class="fa fa-google"></i></a>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <a href="{{ url('loginRedes/linkedin') }}"  class="col-xs-12 col-md-12 button6 social-button linkedin">Ingresa con Linkedin <i class="fa fa-linkedin"></i></a>
            </div>
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