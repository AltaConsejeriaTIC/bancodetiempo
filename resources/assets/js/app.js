var Vue = require('vue');

Vue.component('register', require('./components/Register.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('category', require('./components/CategorySearch.vue'));

var app = new Vue({
    el: '#app',    
    data:{
    	showModal: false

}}
);