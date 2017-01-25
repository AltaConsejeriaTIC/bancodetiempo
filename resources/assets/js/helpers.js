var optionDay = new Array();
for(var i = 1; i <= 31; i++)
{
    optionDay.push(i);
}
var optionMounth = new Array();
for(var i = 1; i <= 12; i++)
{
    optionMounth.push(i);
}
var optionYear = new Array();
var fecha = new Date();
var currentYear = fecha.getFullYear();

currentYear = currentYear - 18;

for(var i = 1950; i <= currentYear; i++)
{
    optionYear.push(i);
}

var Vue = require('vue');


module.exports = {
    ProfileUser: function () {
    	
    	var terms = false;
    	if(windowvar.userJs["privacy_policy"] == 1){
    		terms = true
    	}
    	
        var profile = {
            data:{
                firstName : windowvar.userJs["first_name"],
                lastName : windowvar.userJs["last_name"],
                gender: windowvar.userJs["gender"],
                day: parseInt(windowvar.dayJs),
                mounth: parseInt(windowvar.mounthJs),
                year: parseInt(windowvar.yearJs),
                aboutMe: windowvar.userJs["aboutMe"],
                terms: terms,
                expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
                exprNum: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$'),
                arrayDay: optionDay,
                arrayMounth: optionMounth,
                arrayYear: optionYear
            }
        }
        return profile;
    },
    ValidateUser: function () {
        var validate = {
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
                    if(this.aboutMe != "" && this.aboutMe.length >= 50 && this.aboutMe.length <= 250){
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
            }
        }
        return validate;
    },
    Helpers: function () {
        var Helpers = {
                methods:{
                    countCharacters: function(){
                    	
                    	var totalChar = this.myData.maxChar - this.myData.aboutMe.length                    	
                        this.putMyData('totalChar', totalChar)
                    },
                    previewPhoto(e) {
                        var image = new Image();
                        var reader = new FileReader();
                        var files = e.target.files || e.dataTransfer.files;
                        if (!files.length)
                            return;
                        
                         reader.onload = (e) => {
                              this.myData.cover = e.target.result
                         };
                         
                        reader.readAsDataURL(files[0]);
                    }
                }
            }
        return Helpers;
    },
    animationSide: function () {
        var animation = {
        		data:function(){
        			return {
        				edit:false,
        				noEdit:true
        			}
        		},
                methods:{
                    showEdit:function(){
                    	this.edit = true;
                    	this.noEdit = false;
                    },
                    hiddenEdit:function(){
                    	this.edit = false;
                    	this.noEdit = true;
                    }
                }
            }
        return animation;
    },
    Service: function () {
        var service = {
            data: {
                imageService:'',
                serviceName: '',
                description: '',
                category:'',
                modalityServiceVirtually : '',
                modalityServicePresently: '',
                valueService: '',
                categories: windowvar.categoriesJs,
                expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
            }                      
        }
        return service;
    },
    ValidateService: function () {
        var validate = {
            computed: {
                validateName: function() {
                    if(this.serviceName != "" && this.serviceName.length >= 3 && this.expr.test(this.serviceName)){
                        return true;
                    }else{
                        return false;
                    }
                },
                validateDescription: function() {
                    if(this.description != "" && this.description.length >= 50){
                        return true;
                    }else{
                        return false;
                    }
                },
                validateModality: function() {
                    if(this.modalityServiceVirtually == 1 || this.modalityServicePresently == 1){
                        return true;
                    }else{
                        return false;
                    }
                },
                validateValueService: function() {
                    if(this.valueService != ''){
                        return true;
                    }else{
                        return false;
                    }
                },
                validateCategory: function() {
                    if(this.category != ''){
                        return true;
                    }else{
                        return false;
                    }
                },
                validateAll: function() {
                    if(this.validateName && this.validateDescription && this.validateModality && this.validateValueService && this.validateCategory){
                        return false;
                    }else{
                        return true;
                    }
                }
            }
        }
        return validate;        
    }
}