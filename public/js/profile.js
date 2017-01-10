// start app
new Vue({
  el: '#app',
  data: {
    name: "",
    gender: ""
  },

  methods: {
  	singUp: function(){
  		alert("Hola " + this.name);
  	}
  }
})
