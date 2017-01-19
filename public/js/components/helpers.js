var Helpers = {
	methods:{
		countCharacters: function(){
        	this.totalChar = this.maxChar - this.aboutMe.length;
        },
        previewPhoto(e) {
			var image = new Image();
		    var reader = new FileReader();
			var files = e.target.files || e.dataTransfer.files;
		    if (!files.length)
		        return;
		    
		     reader.onload = (e) => {
			      this.image = e.target.result;
			 };
			reader.readAsDataURL(files[0]);
		},
	},
	watch:{
		image:function(val){
			Avatar.av = val;
		}
	}
}

var Avatar = new Vue({
	el: "#profilePhoto",
	data: {
		av: avatar
	}
})

var ModalDesactive = {
	 data: {  	
	    showModal: false    
	 }  
}

var ProfileUser = {
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
		maxChar : 250,
		totalChar: 250,
		image:''
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