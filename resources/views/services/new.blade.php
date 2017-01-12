<!-- template for the modal component -->
<script type="x/template" id="modal-template-new">
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
        <div class="modal-container">

            <div>
              <button type="button" @click.prevent="show = false" class="close" data-dismiss="alert">&times;</button>
            </div>

            <div class="row modal-header">
                <h1 class="title1 text-center">Añadir oferta</h1>
            </div>

            <div class="modal-body">                
              <form @submit.prevent="" class="form-custom">
                <input type="hidden" name="token" id="token" value="{{ csrf_token() }}" >
                <div class="row">
                    <label for="nameService" class="paragraph2">Nombre de la oferta</label>
                </div>
                <div class="row">
                    <input type="text" name="nameService" value="" class="col-md-12">
                </div>
                <div class="row">
                    <label for="descriptionService" class="paragraph2">Descripción de la oferta</label>
                </div>
                <div class="row">
                    <textarea class="col-md-12" rows="5" name="descriptionService" placeholder="Ej. Ofrezco una clase de una hora de Yoga para principantes, podemos acordar un lugar de encuentro cercano al Parque de la 93. Puedo los Lunes y Miércoles de 6:00 am a 7:00 am."></textarea>                    
                </div>
                <div class="row">
                    <label for="imageService" class="paragraph2">Foto de la oferta</label><span class="opcional"> (Opcional)</span>
                </div>
                <div class="row">
                    <input type="file" name="imageService" class="col-md-12">
                </div>
                <div class="row">
                    <label class="paragraph2">Modalidad</label>
                </div>
                <div class="row">
                    <input type="checkbox" name="modalityServiceVirtual" class="col-md-12 square">
                    <label for="modalityService" class="paragraph2">Virtal</label>
                </div>
                <div class="row">
                    <input type="checkbox" name="modalityServicePresently" class="col-md-12 square">
                    <label for="modalityService" class="paragraph2">Presencial</label>
                </div>

                <div class="row">
                    <button class="col-md-12 button1">
                      Publicar oferta
                    </button>
                </div>
                <div class="row">    
                    <button class="col-md-12 button1 background-active-color"
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
  <button id="show-modal" @click="showModal = true" class="btn btn-raised btn-success">Añadir un ofrecimiento</button>
  <modal :show.sync="showModal">

  </modal>

</div>
