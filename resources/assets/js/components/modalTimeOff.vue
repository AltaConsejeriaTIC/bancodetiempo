<template>
</template>
<script>

export default {
	props: ["name"],	
	mounted(){		
		var app = this
        jQuery(document).ready(function(){
            setTimeout(function (){
                app.$parent.putMyData(app.name,false);
            },2000);
        })

	}
}
</script>
