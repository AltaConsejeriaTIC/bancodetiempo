var Vue = require('vue');
var VueResource = require('vue-resource');
var helpers = require('./helpers');

Vue.component('modal', require('./components/Modal.vue'));
Vue.component('input-tag', require('./components/InputTag.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('interest', require('./components/Interest.vue'));
Vue.component('deactivate', require('./components/DeactivateAccount.vue'));
Vue.component('newservice', require('./components/NewService.vue'));
Vue.component('avatar', require('./components/ImageProfile.vue'));
Vue.component('firstservice', require('./components/FirstService.vue'));
Vue.component('editservice', require('./components/EditService.vue'));
Vue.component('filtersCategories', require('./components/filtersCategories.vue'));
Vue.component('contactmailmodal', require('./components/contactMailModal.vue'));
Vue.component('generalmodal', require('./components/generalModal.vue')); 
Vue.component('modaltimeoff', require('./components/modalTimeOff.vue')); 
Vue.component('callmessages', require('./components/callMessages.vue'));  
Vue.component('sendmessage', require('./components/sendMessage.vue'));
//directives
Vue.directive('validation', require('./components/validations.vue'));



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
    	scrollBottom();
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

function scrollBottom(){
	var elemScroll = document.getElementsByClassName('scrollBottom');
	setTimeout(function(){
		for(var e = 0; e < elemScroll.length; e++){
			elemScroll[e].scrollTop = elemScroll[e].scrollHeight;
		}
	}, 500);
	
}