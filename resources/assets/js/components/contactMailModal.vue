<template>
<div>
	<div class='shadow' :class='this.contactMail'></div>
	<div class='contactMail' :class='this.contactMail'>
		<slot name='modal'></slot>
	</div>
</div>
</template>
<script>

export default {
	props: ['service', "contactMail"],
	mounted(){
		this.$parent.setMyData('contactMail', 'hidden')
	}
}
</script>