var service = new Vue({
    el : "#service",
    data: {
        image:'',
        serviceName: '',
        description: '',
        category:'',
        modalityServiceVirtually : '',
        modalityServicePresently: '',
        valueService: '',
        expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
    },
    methods: {
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
    filters: {
      truncate: function(string, value) {
        if(string.length > value){
            return string.substring(0, value) + '...';
        }else{
            return string;
        }       
      }
    },
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
        },
    }
})