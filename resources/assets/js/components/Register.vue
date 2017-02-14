<template>
    <article class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 serviceForm" id='formRegister' v-validation:msg=''>
            <div class="row not-margin">
                <label for="firstName" class="paragraph10">Nombre</label>  
            </div>
            <div class="row not-margin"> 
				
				<input type="text" value="" v-model='firstName' name="firstName" class="col-xs-12 validation" placeholder="Nombre"  data-validations='["required", "min:3", "max:50"]'>
				<i for='firstName'></i>
				<div class="msg" errors='firstName'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
					<p error='max'>Este campo debe ser máximo de 50 caracteres.</p>
				</div>
            </div>

            <div class="row not-margin">
                <label for="lastName" class="paragraph10">Apellido</label>          
            </div>
            <div class="row not-margin">       
                 
                <input type="text" value="" v-model='lastName' name="lastName" class="col-xs-12 validation" placeholder="Apellido"  data-validations='["required", "min:3", "max:50"]'>
                <i for='lastName'></i>
                <div class="msg" errors='lastName'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
					<p error='max'>Este campo debe ser máximo de 50 caracteres.</p>
				</div>
            </div>

            <div class="row not-margin">
                <label for="email" class="paragraph10" >Correo electrónico</label>          
            </div>
            <div class="row not-margin">       
                <input type="text" value="" v-model='email2' name="email2" class="col-xs-12 validation" placeholder="email"  data-validations='["required", "email"]'>
                <i for='email2'></i>
                <div class="msg" errors='email2'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='email'>El formato del correo electrónico no es válido.</p>
				</div>
            </div>

            <div class="row not-margin">
                <label for="gender" class="paragraph10">Género</label>        
            </div>            
            <div class="row not-margin">
                <div class="col-md-4 not-padding">
                	<input type='radio' value='male' name='gender' id='male' class='square validation' v-model='gender'   data-validations='["required"]'>
                	<label for="male" class="paragraph10">Hombre</label>
                </div>
                <div class="col-md-3 not-padding">
	                <input type='radio' value='famale' name='gender' id='famale' class='square validation' v-model='gender'   data-validations='["required"]'>
	                <label for="famale" class="paragraph10">Mujer</label>
                </div>
                <div class="col-md-5 not-padding">
	                <input type='radio' value='indeterminate' name='gender' id='indeterminate' class='square validation' v-model='gender'   data-validations='["required"]'>
	                <label for="indeterminate" class="paragraph10">Indeterminado</label>
                </div>
            	                                                             
            </div>   
            <div class="space"></div>

            <div class="row not-margin">
                <label for="birthdate" class="paragraph10">Fecha de nacimiento</label>                
            </div>         
            <div class="row not-margin">               	                
                <input type='date' name='birthDate' v-model='birthDate' class=' validation' data-validations='["required", "min:18"]'>
                <div class="msg" errors='birthDate'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='min'>Debes ser mayor de edad para registrarte en Cambalachea.</p>
				</div>
            </div>

            <div class="row not-margin">
                <label for="aboutMe" class="paragraph10">Acerca de mi</label>
                
            </div>
            <div class="row not-margin">
                <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="aboutMe" id='aboutMe' v-model='aboutMe' placeholder="Ej. ¡Hola! Soy diseñador gráfico, tengo 25 años. Me encanta la fotografía, el teatro, el cine y la música…"  data-validations='["required", "min:50", "max:250"]'></textarea>                    
				<div class="msg" errors='aboutMe'>
					<p error='required'>Este campo es obligatorio.</p>
					<p error='min'>Este campo debe ser mínimo de 50 caracteres.</p>
					<p error='max'>Este campo debe ser máximo de 250 caracteres.</p>
				</div>
            </div>
			
            <div class="row not-margin" v-show='this.profile == 0'>
                <div class='col-xs-12'>
                    <input type="checkbox" name="terms" value="1" id="terms" class="square validation" v-model="terms" data-validations='["required"]'>
					<label for="terms">Aceptar los <a href=terms>términos y condiciones</a> de la plataforma</label> 
                </div>
            </div>

            <div class="row not-margin">
                <input type="submit" value='Siguiente' class='button1 col-xs-12 background-active-color'  v-if='profile == 0' v-on:click=""/>
                
                <input type="submit" value='Actualizar' class='button1 col-xs-12 background-active-color'  v-if='profile == 1'/>
                
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
        		if(this.mounth.toString().length < 2){
        			this.mounth = '0'+this.mounth
        		}
        		if(this.day.toString().length < 2){
        			this.day = '0'+this.day
        		}
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