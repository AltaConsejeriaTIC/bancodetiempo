var Vue = require('vue');
var VueResource = require('vue-resource');
var helpers = require('./helpers');
var categories = [];
var tags = [];
jQuery.ajax({
    url : '/categories',
    async : false,
    context: this,
    success : function(data){
        categories =  JSON.parse(data);
    }
});

jQuery.ajax({
    url : '/tags',
    async : false,
    context: this,
    success : function(data){
        tags = JSON.parse(data);
    }
});
window.categories = categories;
window.tags = tags;

Vue.component('input-tag', require('./components/InputTag.vue'));
Vue.component('deactivate', require('./components/DeactivateAccount.vue'));
Vue.component('editservice', require('./components/EditService.vue'));
Vue.component('filtersCategories', require('./components/filtersCategories.vue'));
Vue.component('contactmailmodal', require('./components/contactMailModal.vue'));
Vue.component('generalmodal', require('./components/generalModal.vue'));
Vue.component('sendmessage', require('./components/sendMessage.vue'));
Vue.component('deals', require('./components/Deal.vue'));
Vue.component('newservice', require('./components/NewService.vue'));
Vue.component('select-icon', require('./components/selectIcon.vue'));
Vue.component('popup', require('./components/popup.vue'));

var app = new Vue({

    el: '#app',    
    data:{   
    	myData : {'validation' : 1}
    },
    mixins: [helpers.Helpers(), helpers.animationSide(),helpers.Filters()],
    methods:{
    	setMyData($var, $val){
    		Vue.set(this.myData, $var, $val)
    	},
    	putMyData($var, $val){
    		this.myData[$var] = $val
    	} 
    },
    mounted(){   	
    	scrollFixed();
        this.setMyData('categories', categories);
        this.setMyData('tags' , tags);
    }
    
});


function scrollFixed(){
	var top = 0;
	document.body.onscroll = scrollChange
	var elemScroll = document.getElementsByClassName('scrollFixed');
	for(var e = 0; e < elemScroll.length; e++){
		elemScroll[e].style.top = top+"px"
		elemScroll[e].style.margin = "-150px 0px 0px 0px";
	}
	
	
}

function scrollChange(){
	var top = 0;
	var scrollTop = document.body.scrollTop
	var elemScroll = document.getElementsByClassName('scrollFixed');
	if(scrollTop > 200){
		top = (scrollTop-200)
		if(top < 750){
			for(var e = 0; e < elemScroll.length; e++){
				elemScroll[e].style.top = top+"px"
			}
		}
		
	}
}

