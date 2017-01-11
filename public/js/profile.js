// start app
var profile = new Vue({
  el: '#profile',
  data: {
    name: "",
    gender: "",
    avatar: "",
  },

  methods: {
  	singUp: function(){
  		alert("Hola " + this.name);
  	},
  }
})
