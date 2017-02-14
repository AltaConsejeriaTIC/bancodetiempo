<template>
<div>
	<div class='shadow' v-show='this.contactMail'></div>
	<div class='contactMail col-md-4 col-md-offset-4' v-show='this.contactMail'>
		
		<slot name='modal'></slot>
	</div>
</div>
</template>
<script>

export default {
	props: ['service', "contactMail"],		
	mounted(){
		this.$parent.setMyData('contactMail', false)
	}
}
</script>