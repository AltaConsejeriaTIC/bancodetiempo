var Vue = require('vue');

Vue.component('modal', require('./components/Modal.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('category', require('./components/CategorySearch.vue'));
Vue.component('interest', require('./components/Interest.vue'));

var app = new Vue({
    el: '#app',    
    data:{
    	showModal: false,
    	myData : {}

    },
    methods:{
    	getMyData:function($var){
    		return this.myData[$var];
    	},
    	setMyData:function($var, $val){
    		return this.myData[$var] = $val;
    	}
    }
});