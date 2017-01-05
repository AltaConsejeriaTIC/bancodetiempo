//script modal window for errors
/*
$(document).ready(function() {
	
		
		type = $(this).attr('data-type');
		
		$('.overlay-container').fadeIn(function() {
			
			window.setTimeout(function(){
				$('.window-container.'+type).addClass('window-container-visible');
			}, 100);
			
		});
	
	
	$('.close').click(function() {
		$('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
	});
	
});
*/
// register modal component Vue.js
Vue.component('modal', {
  template: '#modal-template-deactivate',
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