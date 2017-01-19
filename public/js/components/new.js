// modal component Vue.js
var Modal = Vue.component('modal', {
  template: '#modal-template',
  props: {
    show: {
      type: Boolean,
      required: true,
      twoWay: true    
    }
  },

  methods: {
  	
  }
})
