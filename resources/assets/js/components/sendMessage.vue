<template>
	<div>
		<div class="row">
			<div class="col-md-12 col-xs-12 text-center">
				<textarea name="response" id="response" class='col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1' v-model='response' v-on:keydown.enter='send'></textarea>
			</div>
		</div>
		<div class="space10"></div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<button type="button" class='button1 background-active-color send col-xs-12' v-on:click='send'>Enviar</button>
			</div>
			<div class="space15 visible-xs"></div>
			<div class="col-xs-10 col-xs-offset-1">
				<button v-if="this.sender != this.applicant && (this.deal == 8 || this.deal == 0 || this.deal == 10 || this.deal == 11)" type="button" class='button1 background-active-green-color buttonTransition col-xs-12' data-open='#dealBox'>Proponer acuerdo</button>
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
		props:['conversation', 'sender', 'token','applicant','deal'],
		mounted() {

		},
		methods:{
			send:function(){
				if(this.response.length > 1){
					var data = {"message" : this.response, "conversation": this.conversation, "sender" : this.sender, '_token' : this.token}

                    jQuery.ajax({
                            type: "POST",
                            url: "/newMessage",
                            data: data
                    });
                    this.response = ''
				}

			},
			getMessages:function(){

			}
		}
	}
</script>
