<template>
</template>
<script>

export default {
	props: ["name"],	
	mounted(){		
		var app = this
		setTimeout(function (){
			app.$parent.putMyData(app.name,false);
		},2000);
	}
}
</script>