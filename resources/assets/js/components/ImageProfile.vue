<template>
	<div>
		<slot :cover="cover"></slot>
	</div>
</template>
<script>

export default {
	props: ['cover'],
	mounted(){
		this.$parent.setMyData('cover', windowvar.userJs["avatar"])
	}
}
</script>