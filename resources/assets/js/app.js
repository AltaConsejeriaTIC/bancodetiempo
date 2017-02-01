var Vue = require('vue');
var helpers = require('./helpers');

Vue.component('modal', require('./components/Modal.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('category', require('./components/CategorySearch.vue'));
Vue.component('interest', require('./components/Interest.vue'));
Vue.component('deactivate', require('./components/DeactivateAccount.vue'));
Vue.component('newservice', require('./components/NewService.vue'));
Vue.component('avatar', require('./components/ImageProfile.vue'));
Vue.component('firstservice', require('./components/FirstService.vue'));
Vue.component('editservice', require('./components/EditService.vue'));
//directives
Vue.directive('validationText', require('./components/validationsText.vue'));
Vue.directive('validationDate', require('./components/validationsDate.vue'));
Vue.directive('validationOptions', require('./components/validationsOptions.vue'));

var app = new Vue({

    el: '#app',    
    data:{
    	showModal: false,
        showModal1: false,        
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
    	
    }
    
});
