<template>
	<div class='col-xs-12 col-md-4'>
		<input type='checkbox' name='interets[]' :value='val' :id='titleShort' class='boxCheck' v-model='check'>
		<label :for='titleShort' class='text-center'>{{title}}</label>		
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
				this.$parent.myData.validation = this.$parent.myData.validation+1;
	 		}else{
				this.$parent.myData.validation = this.$parent.myData.validation-1;
	 		}
		}
	},
	mounted() {
		this.$parent.setMyData('validation', 0);
    }
}

</script>