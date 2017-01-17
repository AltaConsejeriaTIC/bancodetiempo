var service = new Vue({
	el : "#form",
	data: {
		image:'',
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
	}
})