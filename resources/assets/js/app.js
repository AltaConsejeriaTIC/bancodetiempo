var Vue = require('vue');

Vue.component('register', require('./components/Register.vue'));
Vue.component('modal', require('./components/Modal.vue'));

var app = new Vue({
    el: '#app',    
    data:{
    	showModal: false
    },
    methods:{
      closeModal: function () {
        console.log("llego al app");
        showModal = false;
      }
    }   
});