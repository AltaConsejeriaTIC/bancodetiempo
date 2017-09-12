<generalmodal  name='editService{{$service->id}}' :state='myData.editService{{$service->id}}' state-init='false'>
        <div slot="modal" class='modal-container' v-cloak>

            <div class="modal-body">
               <button type="button" @click='myData.editService{{$service->id}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
               {!! Form::model($service, ['url' => ['service/save', $service->id], 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation']) !!}

                <div class='serviceForm'>
                    <div class="row">
                        <h1 class="title1 text-center">Actualizar Oferta</h1>
                    </div>

                    <div class="row">
                        <label for="serviceName" class="paragraph10">Nombre de
                            la oferta (Max. 50 caracteres)</label>
                    </div>
                    <div class="row">
                        <input type="text" name="serviceName" autofocus placeholder="Ej. Clase de Inglés, Asesoría penal…" class="col-xs-12 col-sm-12 col-md-12 validation" value='{{$service->name}}' maxlength="50" data-validations='["required", "min:3", "max:50"]'>
                        <i class='icon' for='serviceName'></i>
                        <div class="msg" errors='serviceName'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
                            <p error='max'>Este campo debe ser máximo de 50 caracteres.</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="descriptionService" class="paragraph10">Descripción
                            de la oferta</label>
                    </div>
                    <div class="row">
                        <textarea
                            class="countCharacters col-xs-12 col-sm-12 col-md-12 validation"
                            rows="8" name="descriptionService" id='descriptionService'
                            placeholder="Ej. Ofrezco una hora de una clase de Yoga para principiantes. Podemos acordar un lugar de encuentro cercano al campus de Universidad Nacional. Puedo realizar la sesión los lunes o los miércoles de 6:00 am a 7:00 pm."
                            data-validations='["required", "min:50", "max:250"]'>{{$service->description}}</textarea>
                        <div class="msg" errors='descriptionService'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='min'>Este campo debe ser mínimo de 50 caracteres.</p>
                            <p error='max'>Este campo debe ser máximo de 250
                                caracteres.</p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="paragraph10">Modalidad</label>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 not-padding ">
                            <input type="checkbox" name="modalityServiceVirtually"
                                value="1"
                                id="modalityServiceVirtually{{$service->id}}"
                                class="square validation"
                                @if($service->virtually) checked @endif
                                data-validations='["requiredIfNot:modalityServicePresently"]'>
                            <label for="modalityServiceVirtually{{$service->id}}">Virtual</label>
                        </div>
                        <div class="col-xs-6 col-sm-6 not-padding ">
                            <input type="checkbox" name="modalityServicePresently"
                                value="1" id="modalityServicePresently{{$service->id}}"
                                class="square validation"
                                @if($service->presently) checked @endif
                                data-validations='["requiredIfNot:modalityServiceVirtually"]'>
                            <label for="modalityServicePresently{{$service->id}}">Presencial</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="msg" errors='modalityServicePresently'>
                            <p error='requiredIfNot'>Debes seleccionar una opción.</p>
                        </div>
                        <div class="msg" errors='modalityServiceVirtually'>
                            <p error='requiredIfNot'>Debes seleccionar una opción.</p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="paragraph10">Valor del servicio</label>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <input type="radio" name="valueService" value="1" id="edit_time1{{$service->id}}"
                                @if($service->value == 1) checked @endif
                                class="circle validation"
                                data-validations='["required"]'>
                            <label for="edit_time1{{$service->id}}">1 Hora</label>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <input type="radio" name="valueService" value="2" id="edit_time2{{$service->id}}"
                                @if($service->value == 2) checked @endif
                                class="circle validation"
                                data-validations='["required"]'> <label for="edit_time2{{$service->id}}">2 Horas</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <input type="radio" name="valueService" value="3" id="edit_time3{{$service->id}}"
                                class="circle validation"
                                @if($service->value == 3) checked @endif
                                data-validations='["required"]'>
                                <label for="edit_time3{{$service->id}}">3 Horas</label>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <input type="radio" name="valueService" value="4" id="edit_time4{{$service->id}}"
                                @if($service->value == 4) checked @endif
                                class="circle validation"
                                data-validations='["required"]'> <label for="edit_time4{{$service->id}}">4 Horas</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="msg" errors='valueService'>
                            <p error='required'>Debes seleccionar el valor de tu
                                servicio.</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="categoryService" class="paragraph10">Categoría</label>
                    </div>
                    <div class="row">
                        <select name='categoryService'
                            class='col-xs-12  col-sm-12 validation categories' option='{{$service->category_id}}'
                            data-validations='["requiredSelect"]'>
                        </select>
                        <div class="msg" errors='categoryService'>
                            <p error='required'>Debes seleccionar una categoría.</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="tagService" class="paragraph10">Palabras
                            clave</label><span class="text-opacity"> (Opcional)</span>
                    </div>
                    <div class="row">

                        <input-tag class="col-xs-12  col-sm-12 no-input" placeholder="Ej. EstiloDeVida JuegosDeMesa Collar" validate="text" :tags="{{$service->tags->pluck('tag.tag')->toJson()}}">
                        </input-tag>

                    </div>
                    <div class="row">
                        <label for="imageServices" class="paragraph10">Foto de la
                            oferta</label><span class="text-opacity"> (Opcional)</span>
                    </div>
                    <div class="row">
                        <input type="file" name="imageService" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 validation preview" id='imageService{{$service->id}}'  data-validations='["maxFile:2500000"]'>
                           <label for='imageService{{$service->id}}' class='text-center col-xs-12 col-sm-12' style="background-image:url('{{$service->image}}')"><span>Sube una foto</span></label>
                           <div class="msg" errors='imageService'>
                                <p error='max'>El peso màximo de la imagen debe ser de 3 Megas.</p>
                            </div>
                    </div>
                    <div class='space15'></div>
                    <div class="row">

                        <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                            Actualizar oferta
                        </button>

                        <div class="space10">
                        </div>

                        <button class="col-xs-12 button10 background-white text-center" @click='editService{{$service->id}} = false'>
                            Cancelar
                        </button>

                    </div>
                </div>
                {!!Form::close()!!}
            </div>
    </div>
</generalmodal>
