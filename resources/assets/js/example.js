module.exports = {
    ProfileUser: function () {
        var profile = {
            data:{
                firstName : '',
                lastName : '',
                gender: '',
                day: '',
                mounth: '',
                year: '',
                aboutMe: '',
                terms: false,
                expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
                maxChar : 250,
                totalChar: 250,
                image:''
            }
        }
        return profile;
    }
}