<template>
</template>
<script>

export default {
	props: ["name"],	
	mounted(){		
		var app = this
		setTimeout(function (){
			app.$parent.putMyData(app.name,false);
		},3000);
	}
}
</script>