var register = new Vue('register', {
	el: "#form",
	data:{
		firstName : '',
		lastName : '',
		gender: '',
		day: '2',
		mounth: '',
		year: '',
		aboutMe: ''
	}, 
	computed: {
        validateFirstname: function() {
            return "daza";
        }      
        
	}
})