{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}                
    <div class="row">
        <label for="nameService" class="paragraph2">Nombre de la oferta</label>
    </div>
    <div class="row">
        <input type="text" name="nameService" value="" class="col-xs-12 col-sm-12 col-md-12" placeholder="Nombre de la oferta">
    </div>
    <div class="row">
        <label for="descriptionService" class="paragraph2">Descripción de la oferta</label>
    </div>
    <div class="row">
        <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12" rows="5" name="descriptionService" id='descriptionService' placeholder="Ej. Ofrezco una clase de una hora de Yoga para principantes, podemos acordar un lugar de encuentro cercano al Parque de la 93. Puedo los Lunes y Miércoles de 6:00 am a 7:00 am."></textarea>                    
    	<label for="descriptionService">250</label>
    </div>
    <div class="row">
        <label for="imageService" class="paragraph2">Foto de la oferta</label><span class="text-opacity"> (Opcional)</span>
    </div>
    <div class="row">
        <input type="file" name="imageService" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 " id='cover' @change='previewPhoto'>
        <label for="cover" class='text-center col-xs-12 col-sm-12' v-bind:class="{'text-white' : image!=''}" :style="{ backgroundImage: 'url(' + image + ')' }">Sube una foto</label>
    </div>
    <div class="row">
        <label class="paragraph2">Modalidad</label>
    </div>
    <div class="row">
    
    	<div class="col-xs-6 col-sm-6 not-padding ">
    		<input type="checkbox" name="modalityServiceVirtually" id='modalityServiceVirtually' class="square" value="1">
        	<label for="modalityServiceVirtually" class="">Virtual</label>
    	</div>
    	<div class="col-xs-6 col-sm-6 not-padding ">
    		<input type="checkbox" name="modalityServicePresently" id='modalityServicePresently' class="square" value="1">
        	<label for="modalityServicePresently" class="">Presencial</label>
    	</div>        
     </div>

    <div class="row">
        <label class="paragraph2">Valor del servicio</label>
    </div>

    <div class="row">
    	<div class="col-xs-6 col-sm-6">
    		<input type="radio" name="valueService" id='time1' class="circle" value="1"> 
        	<label for="time1">1 Hora</label> 
    	</div>
        <div class="col-xs-6 col-sm-6">
        	<input type="radio" name="valueService" id='time2' class="circle" value="2"> 
        	<label for="time2">2 Horas</label>
        </div>                 
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6">
    		<input type="radio" name="valueService" id='time3' class="circle" value="4"> 
        	<label for="time3">4 Hora</label> 
    	</div>
        <div class="col-xs-6 col-sm-6">
        	<input type="radio" name="valueService" id='time4' class="circle" value="8"> 
        	<label for="time4">8 Horas</label>
        </div>                  
    </div>
    <div class="row">
        <label for="categoryService" class="paragraph2">Categoría</label>
    </div>
    <div class="row">
        <select name='categoryService' class='col-xs-12  col-sm-12'>
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
        <input type="text" name="tagService" class="col-xs-12  col-sm-12" placeholder="Ej. Diseño, papel...">
    </div>

    <div class="row">
        <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
          Publicar oferta
        </button>
    </div>

{!! Form::close() !!}