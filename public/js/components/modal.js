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
    showModal: false    
  }  
})