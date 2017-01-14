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
              {!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-custom']) !!}                
                <div class="row">
                    <label for="nameService" class="paragraph2">Nombre de la oferta</label>
                </div>
                <div class="row">
                    <input type="text" name="nameService" value="" class="col-md-12" placeholder="Nombre de la oferta">
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
                <div class="row col-md-6">
                    <input type="checkbox" name="modalityServiceVirtual" class="square">
                    <label for="modalityService" class="">Virtal</label>
                </div>
                <div class="row col-md-6">
                    <input type="checkbox" name="modalityServicePresently" class="square">
                    <label for="modalityService" class="">Presencial</label>
                </div>

                <div class="row">
                    <label class="paragraph2">Valor del servicio</label>
                </div>

                <div class="row col-md-6">
                    <input type="radio" name="valueService" class="" value="1"> 1 Hora                    
                </div>
                <div class="row col-md-6">
                    <input type="radio" name="valueService" class="" value="2"> 2 Horas                    
                </div>
                <div class="row col-md-6">
                    <input type="radio" name="valueService" class="" value="3"> 3 Horas                    
                </div>
                <div class="row col-md-6">
                    <input type="radio" name="valueService" class="" value="4"> 4 Horas                    
                </div>
                <div class="row">
                    <label for="categoryService" class="paragraph2 col-md-12">Categoría</label>
                </div>
                <div class="row">
                    <select name='categoryService' class='col-md-12'>
                        <option value="">Seleccione una Categoría....</option>
                        @foreach($categories as $category)
                            <option value='{{ $category->id }}' @if(old('category')){{ $category->id == old('category') ? "selected" : "" }}@endif {{ $category->selected }}>
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>                    
                </div>
                <div class="row">
                    <label for="tagService" class="paragraph2">Palabras clave</label><span class="opcional"> (Opcional)</span>
                </div>
                <div class="row">
                    <input type="text" name="tagService" class="col-md-12" placeholder="Ej. Diseño, papel...">
                </div>

                <div class="row">
                    <button type="submit" class="col-md-12 button1">
                      Publicar oferta
                    </button>
                </div>
                <div class="row">    
                    <button class="col-md-12 button1 deleteProfile background-active-color"
                      @click.prevent="show = false">
                      Cancelar
                    </button>
                </div>
              {!! Form::close() !!}
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
