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
                email: windowvar.userJs["email"],
                email2: windowvar.userJs["email2"],
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
            methods: {
                validateAll: function() {
                	var v = ''
                    for(var elem = 0; elem < app.getElementsByClassName('validate').length; elem++){
                    	v += app.getElementsByClassName('validate')[elem].getAttribute('validate')
                    }
                	return v;
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
                    },
                    validation:function (){
                    	var v = 0
                    	if(this.$el.getElementsByClassName('validation').length == 0){v=1}
                        for(var elem = 0; elem < this.$root.$el.getElementsByClassName('validation').length; elem++){                            
                            if(this.$el.getElementsByClassName('validation')[elem].getAttribute('validation') == 'false'){
                            	v+=1;
                            }
                        }
                    	this.myData.validation = v;
                        	
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
                descriptionService: '',
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
                    if(this.descriptionService != "" && this.descriptionService.length >= 50){
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
    },
    MethodsService: function () {
        var methodsService = {
            methods: {
                previewPhotoService(e) {
                    var image = new Image();
                    var reader = new FileReader();
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    
                     reader.onload = (e) => {
                          this.imageService = e.target.result;
                     };
                    reader.readAsDataURL(files[0]);
                },
            }
        }
        return methodsService;
    },
    Filters: function() {
        var filters = {
            filters: {
              truncate: function(string, value) {
                if(string.length > value){
                    return string.substring(0, value) + '...';
                }else{
                    return string;
                }       
              }
            }
        }
        return filters;
    }
}