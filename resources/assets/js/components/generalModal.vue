<template>
<div>
	<div class='shadow' v-show='this.state' transition="fade" v-on:click='close()'></div>
	<div class='contactMail col-md-4 col-md-offset-4' v-show='this.state' transition="fade">
		
		<slot name='modal'></slot>
	</div>
</div>
</template>
<script>

export default {
	props: ["name", "state", "stateInit", 'closeTime'],
	mounted(){
		var state = (this.stateInit === 'true');		
		this.$parent.setMyData(this.name, state);
        if((this.closeTime === 'true')){
            setTimeout(this.close, 6000);
        }
	},
	methods:{
		close:function(){
			this.$parent.putMyData(this.name, false);
		}
	}
}
</script>
