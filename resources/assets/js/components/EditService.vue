<template>
<div class="modal fade" :id="name" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-box" role="document">
		<div class="modal-content-box">
			<div class="modal-wrapper">
				<div class="modal-container">
					<div class="modal-header">
						<button type="button" class="close circle-shape"
							data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class='serviceForm'>
							<div class="row">
								<h1 class="title1 text-center">Actualizar Oferta</h1>
							</div>

							<div class="row">
								<label for="serviceName" class="paragraph10">Nombre de
									la oferta (Max. 50 caracteres)</label>
							</div>
							<div class="row">
								<input type="text" name="serviceName" autofocus
									placeholder="Ej. Clase de Inglés, Asesoría penal…"
									class="col-xs-12 col-sm-12 col-md-12 validation"
									v-model="serviceName" maxlength="50"
									data-validations='["required", "min:3", "max:50"]'>
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
									v-model='descriptionService'
									placeholder="Ej. Ofrezco una hora de una clase de Yoga para principiantes. Podemos acordar un lugar de encuentro cercano al campus de Universidad Nacional. Puedo realizar la sesión los lunes o los miércoles de 6:00 am a 7:00 pm."
									data-validations='["required", "min:50", "max:250"]'></textarea>
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
										value="1" :id="'modalityServiceVirtually'+this.id"
										class="square validation" v-model="modalityServiceVirtually"
										data-validations='["requiredIfNot:modalityServicePresently"]'>
									<label :for="'modalityServiceVirtually'+this.id">Virtual</label>
								</div>
								<div class="col-xs-6 col-sm-6 not-padding ">
									<input type="checkbox" name="modalityServicePresently"
										value="1" :id="'modalityServicePresently'+this.id"
										class="square validation" v-model="modalityServicePresently"
										data-validations='["requiredIfNot:modalityServiceVirtually"]'>
									<label :for="'modalityServicePresently'+this.id">Presencial</label>
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
									<input type="radio" name="valueService" value="1" :id="'time1'+this.id"
										class="circle validation" v-model="valueService"
										data-validations='["required"]'> <label :for="'time1'+this.id">1
										Hora</label>
								</div>
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="2" :id="'time2'+this.id"
										class="circle validation" v-model="valueService"
										data-validations='["required"]'> <label :for="'time2'+this.id">2
										Horas</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="3" :id="'time3'+this.id"
										class="circle validation" v-model="valueService"
										data-validations='["required"]'> <label :for="'time3'+this.id">3
										Horas</label>
								</div>
								<div class="col-xs-6 col-sm-6">
									<input type="radio" name="valueService" value="4" :id="'time4'+this.id"
										class="circle validation" v-model="valueService"
										data-validations='["required"]'> <label :for="'time4'+this.id">4
										Horas</label>
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
									class='col-xs-12  col-sm-12 validation' v-model='category'
									data-validations='["requiredSelect"]'>
									<option value="">Seleccione una Categoría....</option>
									<option v-for="op in this.categories" :value="op.id">{{op.category}}</option>
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
								<input-tag class="col-xs-12  col-sm-12 no-input" :on-change="setTags" placeholder="Ej. EstiloDeVida JuegosDeMesa Collar" validate="text" :tags="tags">
								</input-tag>
								<input type="hidden" name="tagService" v-model="tagService">
							</div>
							<div class="row">
								<label for="imageService" class="paragraph10">Foto de la
									oferta</label><span class="text-opacity"> (Opcional)</span>
							</div>
							<div class="row">
								<input type="file" name="imageService"
									class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 "
									:id='"imageService"+this.id' @change='previewPhotoService'> <label
									:for='"imageService"+this.id' class='text-center col-xs-12 col-sm-12'
									v-bind:class="{'text-white' : imageService!='', 'load' : imageService!=''}"
									:style="{ backgroundImage: 'url(' + this.imageService + ')' }"><span>Sube
										una foto</span></label>
							</div>
							<div class='space15'></div>
	            			<div class="row">
	            				
            					<button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
            						Actualizar oferta
	            				</button>
		            			
		            			<div class="space10">		            				
		            			</div>
	            				
								<button class="col-xs-12 button10 background-white text-center"
									data-dismiss="modal" aria-label="Close">
									Cancelar
								</button>
								
	            			</div>                   	                        
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script>
var helpers = require('./../helpers');

export default {   
	props:['name','id'],
	data: function () {
		return helpers.Service().data;
	}, 
	mixins: [helpers.Helpers(),helpers.MethodsService()],
	mounted() {                                    
		for (var i = 0; i < this.services.length; i++) 
		{
			if(this.services[i].id == this.id)
			{
				this.serviceName = this.services[i].name;
				this.imageService = this.services[i].image;
				this.descriptionService = this.services[i].description;
				this.category = this.services[i].category_id;
				this.modalityServiceVirtually = this.services[i].virtually;
				this.modalityServicePresently = this.services[i].presently;    
				this.valueService = this.services[i].value;       
				var editags = new Array();
				for(var j = 0; j < this.tagService.length; j++)
				{
					if(this.tagService[j].service_id == this.services[i].id)
					{						
						editags.push(this.tagService[j].tag);
					}	
				}
				this.tags = editags;
				this.tagService = editags;						
			}             
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
