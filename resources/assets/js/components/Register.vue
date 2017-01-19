<template>
    <article class="col-xs-12 col-sm-4 col-md-4">
        <form action="profile/update" method="put" enctype="multipart/form-data" class="col-md-4 form-custom" role="form" id="form">
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
                <textarea placeholder="Acerca de mi" class="col-xs-12 countCharacters" name="aboutMe" rows="4" id="aboutMe" v-model="aboutMe" @keyUp='countCharacters'></textarea>
                <label for='aboutMe'>{{totalChar}}</label>
            </div>

        </form>
    </article>
</template>
<script>
    export default {
        data: function () {
            return {
                firstName : windowvar.userJs["first_name"],
                lastName : windowvar.userJs["last_name"],
                gender: windowvar.userJs["gender"],
                day: parseInt(windowvar.dayJs),
                mounth: parseInt(windowvar.mounthJs),
                year: parseInt(windowvar.yearJs),
                aboutMe: windowvar.userJs["aboutMe"],
                terms: false,
                expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
                exprNum: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$'),
                maxChar : 250,
                totalChar: 250
            }
        },
        mounted() {
            console.log('Component ready.')
        }, 
        computed: {
            validateFirstName: function() {
                if(this.firstName != "" && this.firstName.length >= 3 && this.expr.test(this.firstName)){
                    return true;
                }else{
                    return false;
                }
            },
            validateLastName: function() {
                if(this.lastName != "" && this.lastName.length >= 3 && this.expr.test(this.lastName)){
                    return true;
                }else{
                    return false;
                }
            },
            validateGender: function(){
                if(this.gender != "" && (this.gender == 'male' || this.gender == 'female')){
                    return true;
                }else{
                    return false;
                }
            },
            validateDate: function(){
                if((this.day != "" && this.day > 0) && (this.mounth != "" && this.mounth > 0) && (this.year != "" && this.year > 0)){
                    return true;
                }else{
                    return false;
                }
            },
            validateAboutMe: function() {
                if(this.aboutMe != "" && this.aboutMe.length >= 50 && this.aboutMe.length <= 250 && this.exprNum.test(this.aboutMe)){
                    return true;
                }else{
                    return false;
                }
            },
            validateAll: function() {
                if(this.validateFirstName && this.validateLastName && this.validateGender && this.validateDate && this.validateAboutMe && this.terms){
                    return false;
                }else{
                    return true;
                }
            },
            
        },
        methods: {      
            countCharacters: function(){
                this.totalChar = this.maxChar - this.aboutMe.length;
            }
        }
    }
</script>
