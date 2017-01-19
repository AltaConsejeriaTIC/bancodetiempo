<template>
    <article class="col-xs-12 col-sm-4 col-md-4">
        <form action="profile/update" method="put" enctype="multipart/form-data" class="col-md-12 form-custom">
            <input type="file" name='avatar' id='avatar' class='hidden'/>
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
                        
                    </select>                    
                </div>                    
                <div class="not-padding col-xs-4">
                    <select name="mounth" placeholder="Mes" class="col-xs-11" v-model="mounth">                        
                        
                    </select>
                </div>                    
                <div class="not-padding col-xs-4">
                    <select name="year" placeholder="Año" class="col-xs-11" v-model="year">                        
                        
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="aboutMe" class="paragraph2">Acerca de mi</label>
                <i class="fa fa-check-circle done" v-if='validateAboutMe'></i>
            </div>
            <div class="row">
                <textarea placeholder="Acerca de mi" class="col-xs-12 countCharacters" name="aboutMe" rows="4" id="aboutMe" v-model="aboutMe" ></textarea>
                <label for='aboutMe'>{{totalChar}}</label>
            </div>

        </form>
    </article>
</template>
<script>
    var helpers = require('./../example');

    export default {
        data: function () {
            return helpers.ProfileUser().data;
        },
        computed: function () {
            return helpers.ProfileUser().computed;
        },
        mounted() {
            console.log('Component ready.');            
        },         
    }
</script>
