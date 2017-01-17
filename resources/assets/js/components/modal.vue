<script>
  export default {
    template: '#modal-template',
    data: function(){

      show: {
        type: Boolean,
        required: true
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
  }
</script>