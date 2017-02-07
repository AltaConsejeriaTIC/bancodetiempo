<template>
	<div class='multi-select'>
		<input type='checkbox' name='categories[]' value="0" v-model='filter' id='all0' @change='filters'><label for='all0'>Todas las categorías</label>
		<span v-for='category in this.allCategories'>
		<input type='checkbox' name='categories[]' :value="category.id" :id='category.category+category.id' v-model='filter'  @change='filters'><label :for="category.category+category.id">{{category.category}}</label>
		</span>
	</div>
</template>
<script>
var Vue = require('vue');

var VueResource = require('vue-resource');
Vue.use(VueResource);

export default {
	data:function(){
		return {filter: [0], allCategories :''}
	},
	props:['categories'],
	methods:{
		filters:function(){
			var filter = '';
			for(var f in this.filter){
				filter += this.filter[f]+":";
			}
			filter = filter.substring(0, filter.length-1)
			if(filter == ''){
				filter = 0;
			}
			this.$http.get('/service/category/'+filter).then(response => {
				document.getElementById('filterAll').firstChild.innerHTML = response.body
			  }, response => {
			    alert("error")
			  });
		}
	},
	mounted(){
		this.allCategories = JSON.parse(this.categories)
	}
}
</script>