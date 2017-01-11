// modal component Vue.js
Vue.component('modal', {
  template: '#modal-template',
  props: {
    show: {
      type: Boolean,
      required: true,
      twoWay: true    
    }
  },

  methods: {
  	deactivateAccount: function(){
  		var token = $('#token').val();
  		$.ajax({
  			url: 'deactivateAccount',
  			method: 'POST',
  			headers: {
                'X-CSRF-TOKEN': token
            },
  			dataType: 'json',
  			success: function(data){
  				if(data)
  				{
  					window.location.href = "/";
  				}
  			},
  			error: function(data) {
          alert("Error!!");
        }
  		});
  	}
  }
})

// start app
new Vue({
  el: '#app',
  data: {  	
    showModal: false,
    editable: "",
    image: ''
  },
   methods: {
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function (e) {
      this.image = '';
    }
  }  
})