// modal component Vue.js
Vue.component('modal', {
  template: '#modal-template-new',
  props: {
    show: {
      type: Boolean,
      required: true
    }
  },

  methods: {
  	
  }
})

// start app
new Vue({
  el: '#new',
  data: {  	
    showModal: false    
  }  
})