<template>
<div>
	<div class='shadow' v-show='this.state'></div>
	<div class='contactMail col-md-4 col-md-offset-4' v-show='this.state'>
		
		<slot name='modal'></slot>
	</div>
</div>
</template>
<script>

export default {
	props: ["name", "state", "stateInit"],
	mounted(){
		
		var state = (this.stateInit === 'true');
		this.$parent.setMyData(this.name, state)
	}
}
</script>