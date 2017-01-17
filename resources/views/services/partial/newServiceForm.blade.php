{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}                
    <div class="row">
        <label for="nameService" class="paragraph2">Nombre de la oferta</label> <i class="fa fa-check-circle done" v-if='validateName'></i>
    </div>
    <div class="row">
    	{{ Form::text('nameService', '', ['autofocus', 'placeholder' => 'Nombre de la oferta', 'class' => 'col-xs-12 col-sm-12 col-md-12', 'v-model' => "serviceName"]) }}
    </div>
    <div class="row">
        <label for="descriptionService" class="paragraph2">Descripción de la oferta</label> <i class="fa fa-check-circle done" v-if='validateDescription'></i>
    </div>
    <div class="row">
        <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12" rows="5" name="descriptionService" id='descriptionService' v-model='description' placeholder="Ej. Ofrezco una clase de una hora de Yoga para principantes, podemos acordar un lugar de encuentro cercano al Parque de la 93. Puedo los Lunes y Miércoles de 6:00 am a 7:00 am.">{{old('descriptionService')}}</textarea>                    
    	<label for="descriptionService">250</label>
    </div>
    <div class="row">
        <label for="imageService" class="paragraph2">Foto de la oferta</label><span class="text-opacity"> (Opcional)</span>
    </div>
    <div class="row">
        <input type="file" name="imageService" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 " id='cover' @change='previewPhoto'>
        <label for="cover" class='text-center col-xs-12 col-sm-12' v-bind:class="{'text-white' : image!='', 'load' : image!=''}" :style="{ backgroundImage: 'url(' + image + ')' }"><span>Sube una foto</span></label>
    </div>
    <div class="row">
        <label class="paragraph2">Modalidad</label> <i class="fa fa-check-circle done" v-if='validateModality'></i>
    </div>
    <div class="row">
    
    	<div class="col-xs-6 col-sm-6 not-padding ">
    		{{ Form::checkbox('modalityServiceVirtually', 1, '' ,['id' => 'modalityServiceVirtually', 'class'=>'square', 'v-model' => 'modalityServiceVirtually']) }}
			{{ Form::label('modalityServiceVirtually', 'Virtual', ['class' => '']) }}
    	</div>
    	<div class="col-xs-6 col-sm-6 not-padding ">
    		{{ Form::checkbox('modalityServicePresently', 1, '' ,['id' => 'modalityServicePresently', 'class'=>'square', 'v-model' => 'modalityServicePresently']) }}
			{{ Form::label('modalityServicePresently', 'Presencial', ['class' => '']) }}
    	</div>        
     </div>

    <div class="row">
        <label class="paragraph2">Valor del servicio</label> <i class="fa fa-check-circle done" v-if='validateValueService'></i>
    </div>

    <div class="row">
    	<div class="col-xs-6 col-sm-6">
    		{{ Form::radio('valueService', 1, '' ,['id' => 'time1', 'class'=>'circle', 'v-model' => 'valueService']) }}
			{{ Form::label('time1', '1 Hora') }}
    	</div>
        <div class="col-xs-6 col-sm-6">
        	{{ Form::radio('valueService', 2, '' ,['id' => 'time2', 'class'=>'circle', 'v-model' => 'valueService']) }}
			{{ Form::label('time2', '2 Hora') }}
        </div>                 
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6">
    		{{ Form::radio('valueService', 4, '' ,['id' => 'time3', 'class'=>'circle', 'v-model' => 'valueService']) }}
			{{ Form::label('time3', '4 Hora') }}
    	</div>
        <div class="col-xs-6 col-sm-6">
        	{{ Form::radio('valueService', 8, '' ,['id' => 'time4', 'class'=>'circle', 'v-model' => 'valueService']) }}
			{{ Form::label('time4', '8 Hora') }}
        </div>                  
    </div>
    <div class="row">
        <label for="categoryService" class="paragraph2">Categoría</label> <i class="fa fa-check-circle done" v-if='validateCategory'></i>
    </div>
    <div class="row">
        <select name='categoryService' class='col-xs-12  col-sm-12' v-model='category'>
            <option value="">Seleccione una Categoría....</option>
            @foreach($categories as $category)
                <option value='{{ $category->id }}' @if(old('categoryService')){{ $category->id == old('categoryService') ? "selected" : "" }}@endif {{ $category->selected }}>
                    {{ $category->category }}
                </option>
            @endforeach
        </select>                    
    </div>
    <div class="row">
        <label for="tagService" class="paragraph2">Palabras clave</label>
    </div>
    <div class="row">
        <input type="text" name="tagService" class="col-xs-12  col-sm-12" placeholder="Ej. Diseño, papel...">
    </div>

    <div class="row">
        <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" :class='{inactive:validateAll}'>
          Publicar oferta
        </button>
    </div>

{!! Form::close() !!}