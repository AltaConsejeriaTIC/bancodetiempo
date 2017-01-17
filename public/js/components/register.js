var Register = new Vue({
	el: "#form",
	data:{
		firstName : '',
		lastName : '',
		gender: '',
		day: '',
		mounth: '',
		year: '',
		aboutMe: '',
		terms: false,
		expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
		exprNum: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$'),
		maxChar : 250,
		totalChar: 250
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
})