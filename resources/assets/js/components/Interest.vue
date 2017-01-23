<template>
	<div class='col-xs-12 col-md-4'>
		<input type='checkbox' name='interets[]' :value='val' :id='titleShort' class='boxCheck' v-model='check'>
		<label :for='titleShort'><i class='fa fa-circle'></i>{{title}}</label>
		
	</div>
		
</template>
<script>

export default {
	props: ['val', 'title'],
	data: function(){
		return {
			titleShort : this.title.replace(' ', ''),
			check: 0
			}
	},
	watch:{	 	
	 	check: function(val){
	 		
	 		if(val){	 			
				this.$parent.setMyData('interest', this.$parent.getMyData('interest')+1)
	 		}else{
				this.$parent.setMyData('interest', this.$parent.getMyData('interest')-1)
	 		}
			
		}
	},
	mounted() {
		this.$parent.setMyData('interest', 0); 
		console.log(this.$parent.getMyData('showModal'));		                
    }
}

</script>