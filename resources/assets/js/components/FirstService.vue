<template>
	<div v-validation:msg='' class='serviceForm'>
		<div class="row col-sm-12">
			<div class="row">
				<label for="serviceName" class="paragraph10">Nombre de la oferta (Max. 50 caracteres)</label>
			</div>
			<div class="row"> 
				<input type="text" name="serviceName" autofocus placeholder="Ej. Clase de Inglés, Asesoría penal…" class="col-xs-12 col-sm-12 col-md-12 validation" v-model="serviceName"   maxlength="50" data-validations='["required", "min:3", "max:50"]'>
				<i for='serviceName'></i>
				<div class="msg" errors='serviceName'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
					<p error='max'>Este campo debe ser máximo de 50 caracteres.</p>
				</div>
			</div>
			<div class="row">
				<label for="descriptionService" class="paragraph10">Descripción de la oferta</label>
			</div>
			<div class="row">
				<textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="descriptionService" id='descriptionService' v-model='descriptionService' placeholder="Ej. Ofrezco una hora de una clase de Yoga para principiantes. Podemos acordar un lugar de encuentro cercano al campus de Universidad Nacional. Puedo realizar la sesión los lunes o los miércoles de 6:00 am a 7:00 pm."  data-validations='["required", "min:50", "max:250"]'></textarea>                    
				<div class="msg" errors='descriptionService'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='min'>Este campo debe ser mínimo de 50 caracteres.</p>
					<p error='max'>Este campo debe ser máximo de 250 caracteres.</p>
				</div>
			</div>
		
			<div class="row">
				<label class="paragraph10">Modalidad</label>
			</div>
			<div class="row">                
				<div class="col-xs-6 col-sm-6 not-padding ">
					<input type="checkbox" name="modalityServiceVirtually" value="1" id="modalityServiceVirtually" class="square validation" v-model="modalityServiceVirtually" data-validations='["requiredIfNot:modalityServicePresently"]'>
					<label for="modalityServiceVirtually">Virtual</label>                        
				</div>
				<div class="col-xs-6 col-sm-6 not-padding ">
					<input type="checkbox" name="modalityServicePresently" value="1" id="modalityServicePresently" class="square validation" v-model="modalityServicePresently" data-validations='["requiredIfNot:modalityServiceVirtually"]'>
					<label for="modalityServicePresently">Presencial</label>                        
				</div>        
			</div>
			<div class="row">
				<div class="msg" errors='modalityServicePresently' >
					<p error='requiredIfNot'>Debes seleccionar una opción.</p>
				</div>
				<div class="msg" errors='modalityServiceVirtually' >
					<p error='requiredIfNot'>Debes seleccionar una opción.</p>
				</div>
			</div>
			<div class="row">
				<label class="paragraph10">Valor del servicio</label>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<input type="radio" name="valueService" value="1" id="time1" class="circle validation" v-model="valueService" data-validations='["required"]'>
					<label for="time1">1 Hora</label>                        
				</div>
				<div class="col-xs-6 col-sm-6">
					<input type="radio" name="valueService" value="2" id="time2" class="circle validation" v-model="valueService" data-validations='["required"]'>
					<label for="time2">2 Horas</label>                        
				</div>                 
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<input type="radio" name="valueService" value="3" id="time3" class="circle validation" v-model="valueService" data-validations='["required"]'>
					<label for="time3">3 Horas</label>                        
				</div>
				<div class="col-xs-6 col-sm-6">
					<input type="radio" name="valueService" value="4" id="time4" class="circle validation" v-model="valueService" data-validations='["required"]'>
					<label for="time4">4 Horas</label>                        
				</div>                  
			</div>
			<div class="row">
				<div class="msg" errors='valueService'>
					<p error='required'>Debes seleccionar el valor de tu servicio.</p>
				</div>
			</div>
			<div class="row">
				<label for="categoryService" class="paragraph10">Categoría</label>
			</div>
			<div class="row">
				<select name='categoryService' class='col-xs-12  col-sm-12 validation' v-model='category'  data-validations='["required"]'>
					<option value="">Seleccione una Categoría....</option>
					<option v-for="op in this.categories" :value="op.id">{{op.category}}</option>
				</select> 
				<div class="msg" errors='categoryService'>
					<p error='required'>Debes seleccionar una categoría.</p>
				</div>
			</div>
			<div class="row">
				<label for="tagService" class="paragraph10">Palabras clave</label><span class="text-opacity"> (Opcional)</span>
			</div>
			<div class="row">				
				<input-tag class="col-xs-12  col-sm-12 no-input" :on-change="setTags" placeholder="Ej. EstiloDeVida JuegosDeMesa Collar" validate="text" :tags="tags"></input-tag>
				<input type="hidden" name="tagService" v-model="tagService">
			</div>
			<div class="row">
				<label for="imageService" class="paragraph10">Foto de la oferta</label><span class="text-opacity"> (Opcional)</span>
			</div>
			<div class="row">    		
				<input type="file" name="imageService" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 " id='imageService' @change='previewPhotoService'>
				<label for="imageService" class='text-center col-xs-12 col-sm-12' v-bind:class="{'text-white' : imageService!='', 'load' : imageService!=''}" :style="{ backgroundImage: 'url(' + imageService + ')' }"><span>Sube una foto</span></label>
			</div>
			<div class='space'></div>
			<div class="row">
				<button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
				Publicar oferta
				</button>
			</div>    
		</div>
	</div>
</template>
<script>		
    var helpers = require('./../helpers');    
    
    export default {       
      data: function () {
          return helpers.Service().data;
      }, 
      mixins: [helpers.Helpers(),helpers.MethodsService()],
      mounted() {        		
          this.$parent.setMyData('totalChar', 250);
          this.$parent.setMyData('maxChar', 250);
          this.$parent.setMyData('imageService', 'images/previewService.jpg');
          this.$parent.setMyData('serviceName', 'Titulo de la oferta');
          this.$parent.setMyData('descriptionService', 'Descripción de la oferta'); 	                       
          this.$parent.setMyData('tags', Array('PalabrasClave'));
      },      
      watch : {
	        category : function (value) { 
	        	if(value != ''){
	        		var cat = this.categories[value-1].category;
	        		this.$parent.setMyData('category', cat);
	        	}	          
	        },
	        imageService: function (value){
	        	this.$parent.setMyData('imageService', value);
	        },
	        serviceName: function (value){
	        	if(value.length > 30){
	        		this.$parent.setMyData('serviceName', value.substring(0, 30)+"...");
	        	}else{
	        		this.$parent.setMyData('serviceName', value);
	        	}	        	
	        },
	        descriptionService: function (value){
	        	this.$parent.setMyData('descriptionService', value);
	        }
    	},
    	methods: {
    		setTags: function(value){
    			this.tagService = value;	
    			this.$parent.setMyData('tags', value);    			
    		}
    	}
    }
</script>