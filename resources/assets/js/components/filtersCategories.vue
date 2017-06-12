<template>
	<div class='multi-select' :class='stateSelect'>
		<p class='list' @click='toogleSelect'>{{this.list}}</p>
		<input type='checkbox' name='categories[]' value="0" v-model='filter' id='all0' @change='filters'><label for='all0'>Todas las categorías</label>
		<span v-for='category in this.allCategories'>
		<input type='checkbox' name='categories[]' :value="category.id" :id='name+"_"+category.category' v-model='filter'  @change='filters'><label :for="name+'_'+category.category">{{category.category}}</label>
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
	props:['categories', 'name'],
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
					this.filterList[el.srcElement.value] = el.srcElement.id.split("_")[1]
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
            var tab = this.$root.myData.tabFilter
            jQuery.ajax({
                    type: "GET",
                    url: this.$root.myData.urlFilter,
                    data : {'filter' : filter},
                    success : function(data){
                        document.getElementById(tab).innerHTML = data;
                        jQuery('.pagination > li').on('click', getPagination);
                    }
            });
		},
		toogleSelect:function(){
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


function getPagination(){
    var page = jQuery(this).data('page');
    var route = jQuery(this).parent().data('route');
    var list = jQuery(this).parent().data('list');
    var filters = jQuery("input#filters").val();
    jQuery(this).parent().children(".active").removeClass('active')
    jQuery(this).addClass('active');
    jQuery.ajax({
        url: route,
        type : 'GET',
        data : {'page' : page, 'filter' : filters},
        success : function(response){
            jQuery("#"+list).html(response);
            jQuery('.pagination > li').on('click', getPagination);
        }
    });

}
</script>
