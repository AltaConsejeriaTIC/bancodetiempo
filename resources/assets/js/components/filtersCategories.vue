<template>
	<select name="categories" id="categories" multiple='multiple' v-model='filter' @change='filters'>
		<slot></slot>
	</select>
</template>
<script>
var Vue = require('vue');

var VueResource = require('vue-resource');
Vue.use(VueResource);

export default {
	data:function(){
		return {filter: [0]}
	},
	methods:{
		filters:function(){
			var filter = '';
			for(var f in this.filter){
				filter += this.filter[f]+":";
			}
			filter = filter.substring(0, filter.length-1)
			
			this.$http.get('/service/category/'+filter).then(response => {
				document.getElementById('filterAll').firstChild.innerHTML = response.body
			  }, response => {
			    alert("error")
			  });
		}
	}
}
</script>