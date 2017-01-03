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
  template: '#modal-template',
  props: ['show'],
  methods: {
    savePost: function () {
      // Insert AJAX call here...
      this.show = false;
    }
  }
});

new Vue({
  el: 'body',
  data: {
  	name: "hola",
    showModal: false
  }
});