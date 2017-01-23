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
				this.$parent.myData = this.$parent.myData+1;
	 		}else{
				this.$parent.myData = this.$parent.myData-1;
	 		}
		}
	},
	mounted() {
		this.$parent.myData = 0;	                
    }
}

</script>