<template>
	<div>
		<div class="row">
			<div class="col-md-12 text-center">
				<textarea name="response" id="response" class='col-md-10 col-md-offset-1' v-model='response' v-on:keydown.enter='send'></textarea>
			</div>
		</div>
		<div class="space10"></div>
		<div class="row">
			<div class="col-md-3 col-md-offset-6 text-right">
				<button v-if="this.sender != this.applicant" type="button" class='button1 background-active-green-color col-md-12' data-toggle="modal" data-target="#deal">Proponer acuerdo</button>
			</div>
			<div class="col-md-2">
				<button type="button" class='button1 background-active-color col-md-12 send' v-on:click='send'>Enviar</button>
			</div>
		</div>
	</div>
</template>
<script>
	var Vue = require('vue');

	var VueResource = require('vue-resource');
	Vue.use(VueResource);

	export default {
		data:function(){
			return {
				response: ""
			}
		},
		props:['conversation', 'sender', 'token','applicant'],
		mounted() {

		},
		methods:{
			send:function(){
				if(this.response.length > 1){
					var data = {"message" : this.response, "conversation": this.conversation, "sender" : this.sender, '_token' : this.token}
					this.$http.post('/newMessage', data).then(response => {
						this.response = '';
					}, response => {
					    
					});
				}

			},
			getMessages:function(){

			}
		}
	}
</script>
