var interest = new Vue({
	el: "#interestForm",
	data:{
		interest: {},
		totalInterest: 0
	},
	methods:{
		addInterest:function($id){
			if(this.interest[$id]){
				this.interest[$id] = false;
				this.totalInterest = this.totalInterest -1;
			}else{
				this.interest[$id] = true;
				this.totalInterest = this.totalInterest +1;
			}			
		}
	},
	
})