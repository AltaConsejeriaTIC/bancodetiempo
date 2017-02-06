<template>
    <article class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0">
            <div class="row not-margin">
                <label for="firstName" class="paragraph10">Nombre</label>  
            </div>
            <div class="row not-margin"> 
				<div v-validationText:text.required.min:3.max:25.onlyChar='firstName' data-name='nombre' data-placeholder="Nombre" class='col-xs-12 not-padding'></div>
				
            </div>

            <div class="row not-margin">
                <label for="lastName" class="paragraph10">Apellido</label>          
            </div>
            <div class="row not-margin">       
                <div v-validationText:text.required.min:3.max:25.onlyChar='lastName' data-name='apellido' data-placeholder="Apellido" data-inputclass='t' class='col-xs-12 not-padding'></div>  
                
            </div>

            <div class="row not-margin">
                <label for="lastName" class="paragraph10" >Correo electrónico</label>          
            </div>
            <div class="row not-margin">       
                <div v-validationText:text.required.email='email2' data-name='email2' data-inputclass='t' class='col-xs-12 not-padding'></div>  
                
            </div>

            <div class="row not-margin">
                <label for="gender" class="paragraph10">Género</label>        
            </div>            
            <div class="row not-margin">
                
            	<div v-validationOptions:radio.required='gender' data-name='gender' data-options='{"Hombre" : "male", "Mujer" : "female", "Indeterminado" : "indeterminate"}' data-inputclass='square' class='col-xs-12 not-padding'></div>  
            	
                                                             
            </div>   

            <div class="row not-margin">
                <label for="birthdate" class="paragraph10">Fecha de nacimiento</label>                
            </div>         
            <div class="row not-margin">       
            <div v-validationDate:date.required.min:18='birthDate' data-name='fecha de nacimiento' class='col-xs-12 not-padding'></div>
                
                <input type='hidden' name='birthDate' :value='birthDate'>
            </div>

            <div class="row not-margin">
                <label for="aboutMe" class="paragraph10">Acerca de mi</label>
                
            </div>
            <div class="row not-margin">
                <div v-validationText:textarea.required.min:50.max:250='aboutMe' data-name='acerca de mi' data-rows='5' data-placeholder='Ej. ¡Hola! Soy diseñador gráfico, tengo 25 años. Me encanta la fotografía, el teatro, el cine y la música…' class='col-xs-12 not-padding'></div> 
                
            </div>
			
            <div class="row not-margin" v-show='this.profile == 0'>
                <div class='col-xs-12'>
                    <div v-validationOptions:checkbox.required='terms' data-name='terms' data-options='{"terms" : "1"}' data-label='true' data-labeltext='{"terms" : "Aceptar los <a href=terms>términos y condiciones</a> de la plataforma"}' data-inputclass='square' class='col-xs-12 not-padding'></div>                    
                    
                </div>
            </div>

            <div class="row not-margin">
                <input type="submit" value='Siguiente' class='button1 col-xs-12 background-active-color' :class='{inactive : this.$parent.myData.validation > 0}' v-if='profile == 0'/>
                
                <input type="submit" value='Actualizar' class='button1 col-xs-12 background-active-color' :class='{inactive : this.$parent.myData.validation > 0}' v-if='profile == 1'/>
                
            </div>
    </article>
</template>
<script>
    var helpers = require('./../helpers');
    
    		
    export default {
        data: function () {
            return helpers.ProfileUser().data;
        },
        props:['profile'],        
        mixins: [helpers.ValidateUser()],
        computed: {
        	birthDate: function(){
        		return this.year+"-"+this.mounth+"-"+this.day;
        	}
        },
        watch:{
        	aboutMe:function(val){
        		this.$parent.putMyData('aboutMe', this.aboutMe)
        	}
        },
        mounted() {            
            this.$parent.setMyData('totalChar', 250)
            this.$parent.setMyData('maxChar', 250)
            this.$parent.setMyData('aboutMe', this.aboutMe)
            this.$parent.validation()
        },    
    }
</script>