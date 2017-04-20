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

                aboutMe: windowvar.userJs["aboutMe"],
                email: windowvar.userJs["email"],
                email2: windowvar.userJs["email2"],
                terms: terms, 
                expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
                exprNum: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$'),
            }
        }
        return profile;
    },
    Helpers: function () {
        var Helpers = {
                methods:{
                    previewPhoto(e) {
                    	this.$el.getElementsByClassName('profilePhoto')[0].classList.add('validation');
                    	this.$el.getElementsByClassName('profilePhoto')[0].setAttribute('validation', 'true');
                        var files = e.target.files || e.dataTransfer.files;
                        if (!files.length){
                            return;
                        }
                        if(files[0].size > 2000000){
                        	this.$el.getElementsByClassName('profilePhoto')[0].setAttribute('validation', 'false');
                        	this.$el.getElementsByClassName('avatarMsg')[0].classList.remove('hidden')
                        	this.$el.getElementsByClassName('avatarMsg')[0].classList.add('visible')
                        }else{

                        	var image = new Image();
                            var reader = new FileReader();
	                         reader.onload = (e) => {
	                        	 
	                        	 this.$el.getElementsByClassName('avatarMsg')[0].classList.remove('visible')
	                         	 this.$el.getElementsByClassName('avatarMsg')[0].classList.add('hidden')
	                             this.myData.cover = e.target.result
	                         };
	                        
	                        reader.readAsDataURL(files[0]);
                       }
                    },
                    filterCategory:function(filter, category){

                        this.$children[2].filter = [filter];
                        if(filter != 0){                            
                            this.$children[2].list = category;  
                        }else{
                            this.$children[2].list = "Todas las categorias"
                        }
                    	this.$http.get('/service/category/'+filter).then(response => {
            				document.getElementById('filterAll').firstChild.innerHTML = response.body
            			  }, response => {
            			    console.log("error")
            			  });
                    },
                    
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
                services: '',
            }                      
        }
        return service;
    },
    
    MethodsService: function () {
        var methodsService = {
            methods: {
                previewPhotoService(e) {
                    this.$el.getElementsByClassName('imageService')[0].classList.add('validation');
                    this.$el.getElementsByClassName('imageService')[0].setAttribute('validation', 'true');
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length){
                        return;
                    }
                    if(files[0].size > 2000000){
                        this.$el.getElementsByClassName('imageService')[0].setAttribute('validation', 'false');
                        this.$el.getElementsByClassName('avatarMsg')[0].classList.remove('hidden')
                        this.$el.getElementsByClassName('avatarMsg')[0].classList.add('visible')
                    }else{

                        var image = new Image();
                        var reader = new FileReader();
                         reader.onload = (e) => {

                             this.$el.getElementsByClassName('avatarMsg')[0].classList.remove('visible')
                             this.$el.getElementsByClassName('avatarMsg')[0].classList.add('hidden')
                             this.myData.cover = e.target.result
                         };

                        reader.readAsDataURL(files[0]);
                   }
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

