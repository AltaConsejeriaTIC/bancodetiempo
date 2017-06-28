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
	props: ["name", "state", "stateInit", 'closeTime', 'time'],
	mounted(){
		var state = (this.stateInit === 'true');		
		this.$parent.setMyData(this.name, state);
        var _time = 6000;
        if(this.time !== undefined){
            _time = parseInt(this.time);
        }
        if((this.closeTime === 'true')){
            setTimeout(this.close, _time);
        }
	},
	methods:{
		close:function(){
			this.$parent.putMyData(this.name, false);
		}
	}
}
</script>
