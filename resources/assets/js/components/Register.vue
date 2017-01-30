<template>
    <article class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <label for="firstName" class="paragraph2">Nombre</label>  
            </div>
            <div class="row"> 
				<div v-validationText:text.required.min:3.max:25.onlyChar='firstName' data-name='nombre' class='col-xs-12 not-padding'></div>
				    
            </div>

            <div class="row">
                <label for="lastName" class="paragraph2">Apellido</label>          
            </div>
            <div class="row">       
                <div v-validationText:text.required.min:3.max:25.onlyChar='lastName' data-name='apellido' data-inputclass='t' class='col-xs-12 not-padding'></div>  
            </div>

            <div class="row">
                <label for="gender" class="paragraph2">Género</label>        
            </div>            
            <div class="row">
                <div class='col-xs-6'>
                    <input type="radio" name="gender" value="male" id="man" class="square" v-model="gender">
                    <label for="man" class="paragraph2">Hombre</label>                    
                </div>                                
                <div class='col-xs-6'>
                    <input type="radio" name="gender" value="female" id="woman" class="square" v-model="gender">
                    <label for="woman" class="paragraph2">Mujer</label>
                </div>                
            </div>   

            <div class="row">
                <label for="birthdate" class="paragraph2">Fecha de nacimiento</label>                
                
            </div>         
            <div class="row">       
                <div v-validationDate:date.required.min:18='birthDate' data-name='fecha de nacimiento' class='col-xs-12 not-padding'></div>
                <input type='hidden' name='birthDate' :value='birthDate'>
            </div>

            <div class="row">
                <label for="aboutMe" class="paragraph2">Acerca de mi</label>
                
            </div>
            <div class="row">
                <div v-validationText:textarea.required.min:50.max:250='aboutMe' data-name='acerca de mi' data-rows='5' class='col-xs-12 not-padding'></div>  
            </div>
			
            <div class="row" v-show='this.profile == 0'>
                <div class='col-xs-12'>
                    <input type="checkbox" name="terms" v-model="terms" class="square" id="terms" value="1">                    
                    <label for="terms">Aceptar los <a href="terms">términos y condiciones</a> de la plataforma</label>
                </div>
            </div>

            <div class="row">
                <input type="submit" value='Guardar Cambios' class='button1 col-xs-12 background-active-color' :class='{inactive : validateAll}' v-if='profile == 0'/>
                
                <input type="submit" value='Actualizar' class='button1 col-xs-12 background-active-color' :class='{inactive : validateAll}' v-if='profile == 1'/>
                
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
        },    
    }
</script>