<template>
	<transition name="modal" >
    <div class="modal-mask" >
      <div class="modal-wrapper">
        <div class="modal-container">

            <div class="close-modal">
              <button @click="$emit('close')" class="close circle-shape" data-dismiss="alert">&times;</button>
            </div>

            <div class="row modal-header">
                <h1 class="title1 text-center">¿Qué deseas ofrecer?</h1>
            </div>

            <div class="modal-body">                
            	<div class="row">
                    <label for="serviceName" class="paragraph2">Nombre de la oferta</label> <i class="fa fa-check-circle done" v-if='validateName'></i>
                </div>
                <div class="row"> 
                    <input type="text" name="serviceName" autofocus placeholder="Ej. Clase de Inglés, Asesoría penal…" class="col-xs-12 col-sm-12 col-md-12" v-model="serviceName">
                </div>
                <div class="row">
                    <label for="descriptionService" class="paragraph2">Descripción de la oferta</label> <i class="fa fa-check-circle done" v-if='validateDescription'></i>
                </div>
                <div class="row">
                    <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12" rows="5" name="descriptionService" id='descriptionService' v-model='description' placeholder="Ej. Ofrezco una hora de una clase de Yoga para principiantes. Podemos acordar un lugar de encuentro cercano al campus de Universidad Nacional. Puedo realizar la sesión los lunes o los miércoles de 6:00 am a 7:00 pm."></textarea>                    
                    <label for="descriptionService">250</label>
                </div>
                <div class="row">
                    <label for="imageService" class="paragraph2">Foto de la oferta</label><span class="text-opacity"> (Opcional)</span>
                </div>
                <div class="row">
                    <input type="file" name="imageService" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 " id='cover' @change='previewPhoto'>
                    <label for="cover" class='text-center col-xs-12 col-sm-12' v-bind:class="{'text-white' : image!='', 'load' : image!=''}" :style="{ backgroundImage: 'url(' + imageService + ')' }"><span>Sube una foto</span></label>
                </div>
                <div class="row">
                    <label class="paragraph2">Modalidad</label> <i class="fa fa-check-circle done" v-if='validateModality'></i>
                </div>
                <div class="row">                
                    <div class="col-xs-6 col-sm-6 not-padding ">
                        <input type="checkbox" name="modalityServiceVirtually" value="1" id="modalityServiceVirtually" class="square" v-model="modalityServiceVirtually">
                        <label for="modalityServiceVirtually">Virtual</label>                        
                    </div>
                    <div class="col-xs-6 col-sm-6 not-padding ">
                        <input type="checkbox" name="modalityServicePresently" value="1" id="modalityServicePresently" class="square" v-model="modalityServicePresently">
                        <label for="modalityServicePresently">Presencial</label>                        
                    </div>        
                </div>
                <div class="row">
                    <label class="paragraph2">Valor del servicio</label> <i class="fa fa-check-circle done" v-if='validateValueService'></i>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <input type="radio" name="valueService" value="1" id="time1" class="circle" v-model="valueService">
                        <label for="time1">1 Lache</label>                        
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <input type="radio" name="valueService" value="2" id="time2" class="circle" v-model="valueService">
                        <label for="time2">2 Laches</label>                        
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <input type="radio" name="valueService" value="3" id="time3" class="circle" v-model="valueService">
                        <label for="time3">3 Laches</label>                        
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <input type="radio" name="valueService" value="4" id="time4" class="circle" v-model="valueService">
                        <label for="time4">4 Laches</label>                        
                    </div>                  
                </div>
                <div class="row">
                    <label for="categoryService" class="paragraph2">Categoría</label> <i class="fa fa-check-circle done" v-if='validateCategory'></i>
                </div>
                <div class="row">
                    <select name='categoryService' class='col-xs-12  col-sm-12' v-model='category'>
                        <option value="">Seleccione una Categoría....</option>
                        <option v-for="op in this.categories" :value="op.id">{{op.category}}</option>
                    </select>                    
                </div>
                <div class="row">
                    <label for="tagService" class="paragraph2">Palabras clave</label><span class="text-opacity"> (Opcional)</span>
                </div>
                <div class="row">
                    <input type="text" name="tagService" class="col-xs-12  col-sm-12" placeholder="Ej. #EstiloDeVida, #JuegosDeMesa, #Collar">
                </div>

                <div class="row">
                    <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" :class='{inactive:validateAll}'>
                      Publicar oferta
                    </button>
                </div>
                <div class="row">
                    <button  class="col-xs-12 button10 background-white text-center"  @click.prevent="$emit('close')">Cancelar</button> 
                </div>
                
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>
  </transition>
</template>
<script>
    var helpers = require('./../helpers');

    export default {       
         data: function () {
            return helpers.Service().data;
        }, 
        mixins: [helpers.Helpers(),helpers.ValidateService()],
        mounted() {
            this.$parent.setMyData('totalChar', 250);
            this.$parent.setMyData('maxChar', 250);                
        },    
    }
</script>