<template>
	<div class='multi-select' :class='stateSelect'>
		<p class='list' @click='toogleSelect'>{{this.list}}</p>
		<input type='checkbox' name='categories[]' value="0" v-model='filter' id='all0' @change='filters'><label for='all0'>Todas las categorías</label>
		<span v-for='category in this.allCategories'>
		<input type='checkbox' name='categories[]' :value="category.id" :id='category.category' v-model='filter'  @change='filters'><label :for="category.category">{{category.category}}</label>
		</span>
	</div>
</template>
<script>
var Vue = require('vue');

var VueResource = require('vue-resource');
Vue.use(VueResource);

export default {
	data:function(){
		return {filter: [0], allCategories :'', filterList : {}, list : 'Todas las categorias', stateSelect : 'pick'}
	},
	props:['categories'],
	methods:{
		filters:function(el){
			if(el.srcElement.checked){
				if(el.srcElement.id == 'all0'){
					this.filter = [0]
					this.filterList = {}
					this.list = 'Todas las categorias'
				}else{
					delete this.filter[0]
					delete this.filterList[0]
					this.filterList[el.srcElement.value] = el.srcElement.id
					this.list = ''
						for(var f in this.filterList){
							
							this.list += this.filterList[f]+", ";
							
						}
					
					this.list = this.list.substring(0, this.list.length-2)
				}
				
			}else{
				delete this.filterList[el.srcElement.value]
				this.list = ''
					for(var f in this.filterList){
						
						this.list += this.filterList[f]+", ";
						
					}
				
				this.list = this.list.substring(0, this.list.length-2)
				if(Object.keys(this.filterList).length  == 0){
					this.filter = [0]
					this.filterList = {}
					this.list = 'Todas las categorias'
				}
			}
			
			
			
			
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
		},
		toogleSelect:function(){
			console.log('toogle')
			if(this.stateSelect == "pick"){
				this.stateSelect = 'drop'
			}else if(this.stateSelect == "drop"){
				this.stateSelect = 'pick'
			}
			
		}
	},
	mounted(){
		this.allCategories = JSON.parse(this.categories)
	}
}
</script>