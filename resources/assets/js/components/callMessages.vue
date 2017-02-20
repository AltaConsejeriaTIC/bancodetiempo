<template>
	<div v-html='this.html'>
	</div>
</template>
<script>
	var Vue = require('vue');

	var VueResource = require('vue-resource');
	Vue.use(VueResource);

	export default {
		data:function(){
			return {
				html: ""
			}
		},
		props:['conversation'],
		mounted() {   
			this.getMessages()
		},
		methods:{
			getMessages:function(){
				this.$http.get('/messages/'+this.conversation).then(response => {
					this.html = response.body
					setTimeout(this.getMessages, 2000);

				}, response => {
					setTimeout(this.getMessages, 2000);
				    console.log("error")
				});
			}
		}
	}
</script>