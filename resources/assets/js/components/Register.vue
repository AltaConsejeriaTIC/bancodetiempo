<template>
    <article class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <label for="firstName" class="paragraph2">Nombre</label>                
                <i class="fa fa-check-circle done" v-if='validateFirstName'></i>    
            </div>
            <div class="row">       
                <input type="text" name="firstName" required autofocus placeholder="Nombre del usuario" class="col-xs-12" v-model="firstName">
            </div>

            <div class="row">
                <label for="lastName" class="paragraph2">Apellido</label>                
                <i class="fa fa-check-circle done" v-if='validateLastName'></i>    
            </div>
            <div class="row">       
                <input type="text" name="lastName" required autofocus placeholder="Nombre del usuario" class="col-xs-12" v-model="lastName">
            </div>

            <div class="row">
                <label for="gender" class="paragraph2">Género</label>                
                <i class="fa fa-check-circle done" v-if='validateGender'></i>
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
                <i class="fa fa-check-circle done" v-if='validateDate'></i>
            </div>         
            <div class="row">       
                <div class='not-padding col-xs-4'>
                    <select name="day" placeholder="Día" class="col-xs-11" v-model="day"> 
                    	<option value='0'>Día</option>                       
                        <option v-for="op in arrayDay" :value="op">{{op}}</option>
                    </select>                    
                </div>                    
                <div class="not-padding col-xs-4">
                    <select name="mounth" placeholder="Mes" class="col-xs-11" v-model="mounth">   
                    	<option value='0'>Mes</option>                     
                        <option v-for="op in arrayMounth" :value="op">{{op}}</option>
                    </select>
                </div>                    
                <div class="not-padding col-xs-4">
                    <select name="year" placeholder="Año" class="col-xs-11" v-model="year"> 
                    	<option value='0'>Año</option>                       
                        <option v-for="op in arrayYear" :value="op">{{op}}</option>
                    </select>
                </div>
                <input type='hidden' name='birthDate' :value='birthDate'>
            </div>

            <div class="row">
                <label for="aboutMe" class="paragraph2">Acerca de mi</label>
                <i class="fa fa-check-circle done" v-if='validateAboutMe'></i>
            </div>
            <div class="row">
                <textarea placeholder="Acerca de mi" class="col-xs-12 countCharacters" name="aboutMe" rows="4" id="aboutMe" v-model="aboutMe" @keyup='this.$parent.countCharacters'></textarea>
                <label for='aboutMe'>{{this.$parent.myData.totalChar}}</label>
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