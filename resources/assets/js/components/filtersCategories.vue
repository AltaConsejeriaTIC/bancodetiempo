<template>
	<select name="categories" id="categories" v-model='filter' @change='filters'>
		<slot></slot>
	</select>
</template>
<script>
var Vue = require('vue');

var VueResource = require('vue-resource');
Vue.use(VueResource);

export default {
	data:function(){
		return {filter: 0}
	},
	methods:{
		filters:function(){
			this.$http.get('/service/category/'+this.filter).then(response => {
				document.getElementById('filterAll').firstChild.innerHTML = response.body
			  }, response => {
			    alert("error")
			  });
		}
	},
	mounted(){
		console.log("filtros")
	}
}
</script>