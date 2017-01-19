var Profile = new Vue({
  el: '#profile',
  data: {   
    type:'show',
    type2:'hidden'
  },
  mixins: [Helpers, ProfileUser, ModalDesactive],
  methods: {
    edit(){
    	this.type = 'hidden'
    	this.type2 = 'show'
    },
    cancel(){    	
    	this.type = 'show'
    	this.type2 = 'hidden'
    }
  }
})