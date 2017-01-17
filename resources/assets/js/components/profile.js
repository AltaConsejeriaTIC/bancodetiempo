// start app
new Vue({
  el: '#profile',
  data: {
    firstName : windowvar.userJs["first_name"],
    lastName : windowvar.userJs["last_name"],
    gender: windowvar.userJs["gender"],
    day: parseInt(windowvar.dayJs),
    mounth: parseInt(windowvar.mounthJs),
    year: parseInt(windowvar.yearJs),
    aboutMe: windowvar.userJs["aboutMe"],
    terms: false,
    editable: "",
    image: ''
  },
   methods: {
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function (e) {
      this.image = '';
    }
  }
})