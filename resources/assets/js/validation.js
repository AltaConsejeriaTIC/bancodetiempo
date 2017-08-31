jQuery(document).ready(function(){
    jQuery("form[form-validation]").on("change", ".validation", validation);
    jQuery("form[form-validation]").on("keyup", "textarea.validation", validation);
    jQuery("form[form-validation]").on("submit", validationGeneal);
})

var allValidations = {
    required : function(it){
        if(it.val() == ''){
            this.showError(it, 'required');
            return 1;
        }
        this.hiddenError(it, 'required');
        return 0;
    },
    requiredImage : function(it){
        if(it.val() == ''){
            this.showError(it, 'required');
            return 1;
        }
        this.hiddenError(it, 'required');
        return 0;
    },
    requiredSelect : function(it){
        if(it.find("option:selected").val() == '' || it.find("option:selected").val() === undefined){
            this.showError(it, 'required');
            return 1;
        }
        this.hiddenError(it, 'required');
        return 0;
    },
    requiredRadio : function(it){
        var parent = it.closest('form');

        var r = parent.find("input[name='"+it.attr('name')+"']:checked");

        if(r.val() == '' || r.val() === undefined){
            this.showError(it, 'required');
            return 1;
        }
        this.hiddenError(it, 'required');
        return 0;
    },
    requiredCheck : function(it){
        if(!it.is(':checked')){
            this.showError(it, 'requiredCheck');
            return 1;
        }
        this.hiddenError(it, 'requiredCheck');
        return 0;
    },
    min : function(it, v){
        if(it.val().length < v){
            this.showError(it, 'min');
            return 1;
        }
        this.hiddenError(it, 'min');
        return 0;
    },
    max : function(it, v){
        if(it.val().length > v){
            this.showError(it, 'max');
            return 1;
        }
        this.hiddenError(it, 'max');
        return 0;
    },
    maxFile : function(it, v){
        error = 0;
        var files = it[0].files;
        for(var f in files){
            if(files[f].size > v){
                error = 1;
            }
        }
        if(error > 0){
            this.showError(it, 'max');
        }else{
            this.hiddenError(it, 'max');
        }
        return error;
    },
    onlyChar: function(it){
        var expresion = new RegExp('^[^ 0-9][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$');
        if(!expresion.test(it.val())){
            this.showError(it, 'onlyChar');
            return 1;
        }
        this.hiddenError(it, 'onlyChar');
        return 0;
    },
    time:function(it){
        var expresion = new RegExp('^0[0-9]|1[0-9]|2[0-3]:[0-5][0-9]$');
        if(!expresion.test(it.val())){
            this.showError(it, 'time');
            return 1;
        }
        this.hiddenError(it, 'time');
        return 0;
    },
    afterToday:function(it){
        dateUser = it.val().split("-")
        var today = new Date();
        var date = new Date(dateUser[0], dateUser[1]-1, dateUser[2], today.getHours(), today.getMinutes()+5, today.getSeconds());

        if(+date < +today){
            this.showError(it, 'afterToday');
            return 1;
        }
        this.hiddenError(it, 'afterToday');
        return 0;
    },
    afterCurrentDateTime:function(it){
        dateTimeUser = it.val().split(" ");
        dateUser = dateTimeUser[0].split("-")
        timeUser = dateTimeUser[1].split(":")
        var today = new Date();
        var date = new Date(dateUser[0], dateUser[1]-1, dateUser[2], timeUser[0], timeUser[1]+5, timeUser[2]);

        if(+date < +today){
            this.showError(it, 'afterCurrentDateTime');
            return 1;
        }
        this.hiddenError(it, 'afterCurrentDateTime');
        return 0;
    },
    afterTime:function(it){
        timeUser = it.val().split(":")
        var today = new Date();
        if(it.data('date') === undefined || it.data('date') == ''){
            var date = new Date(today.getFullYear(), today.getMonth(), today.getUTCDate(), timeUser[0], timeUser[1], '00');
        }else{
            var customDate = jQuery(it.data('date'));
            myDate = customDate.val().split("-");
            if(myDate[0] == ''){
                var date = new Date(today.getFullYear(), today.getMonth(), today.getUTCDate(), timeUser[0], timeUser[1], '00');
            }else{
               var date = new Date(myDate[0], myDate[1]-1, myDate[2], timeUser[0], timeUser[1], '00');
            }
        }
        if(+date < +today){
            this.showError(it, 'afterTime');
            return 1;
        }
        this.hiddenError(it, 'afterTime');
        return 0;
    },
    email : function(it){
        var expresion = new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@([a-zA-Z0-9]+\.[a-zA-Z0-9]+)+$/);
        if(!expresion.test(it.val())){
            this.showError(it, 'email');
            return 1;
        }
        this.hiddenError(it, 'email');
        return 0;

    },
    dateFormat: function(it){
        var expresion = new RegExp(/^\d{4}-\d{2}-\d{2}$/i);
        if(!expresion.test(it.val())){
            this.showError(it, 'dateFormat');
            return 1;
        }
        this.hiddenError(it, 'dateFormat');
        return 0;

    },
    minYear : function(it, v){
        if(this.years(it.val()) < v){
            this.showError(it, 'min');
            return 1;
        }
        this.hiddenError(it, 'min');
        return 0;
    },
    minNumber : function(it, v){
        if(parseInt(it.val()) < v){
            this.showError(it, 'minNumber');
            return 1;
        }
        this.hiddenError(it, 'minNumber');
        return 0;
    },
    maxNumber : function(it, v){
        if(parseInt(it.val()) > v){
            this.showError(it, 'maxNumber');
            return 1;
        }
        this.hiddenError(it, 'maxNumber');
        return 0;
    },
    minArray : function(it, v){
        console.log(it.val().split(",").length);
        if(it.val().split(",").length < v){
            this.showError(it, 'minArray');
            return 1;
        }
        this.hiddenError(it, 'minArray');
        return 0;
    },
    requiredIfNot : function(it, v){
        var parent = it.closest('form');
        var br = parent.find("input[name='"+v+"']");
        if(!br.is(":checked") && !it.is(":checked")){
            br.attr('validation', 'false');
            this.showError(it, 'requiredIfNot');
            return 1;
        }
        br.attr('validation', 'true');
        this.hiddenError(br, 'requiredIfNot');
        this.hiddenError(it, 'requiredIfNot');
        return 0;
    },
    years : function (date){

        var hoy = new Date()
        var day = date.split("-")[2]
        var mounth = date.split("-")[1]
        var year = date.split("-")[0]
        var yearVal = hoy.getFullYear();
        var mounthVal = hoy.getMonth()+1
        var dayVal = hoy.getUTCDate();
        var years = 0;
        years = yearVal-year
        if(mounth <= mounthVal){
            if(mounth == mounthVal){
                if(day > dayVal){
                    years = years - 1;
                }
            }
        }else{
            years = years - 1;
        }
        return years;
    },
    showError : function(it, error){
        var parent = it.closest('form');
        parent.find(".msg[errors='"+it.attr('name')+"'] p[error='"+error+"']").css('display', 'block');
    },
    hiddenError : function(it, error){
        var parent = it.closest('form');
        parent.find(".msg[errors='"+it.attr('name')+"'] p[error='"+error+"']").css('display', 'none');
    }
}

function validation(){

    var validations = jQuery(this).data('validations');
    var errors = 0;
    for(var v in validations){
        var subValidations = validations[v].split(":");
        if(subValidations.length>=2){
            errors += allValidations[subValidations[0]](jQuery(this), subValidations[1])
        }else{
            errors += allValidations[subValidations[0]](jQuery(this))
        }

    }
    if(errors > 0){
        jQuery(this).attr('validation', 'false');
    }else{
        jQuery(this).attr("validation", "true");
    }

}

function validationGeneal(){
    var allErrors = 0;
    jQuery(this).find(".validation").each(function(){

        var validations = jQuery(this).data('validations');
        var errors = 0;
        for(var v in validations){
            var subValidations = validations[v].split(":");
            if(subValidations.length>=2){
                errors += allValidations[subValidations[0]](jQuery(this), subValidations[1])
            }else{
                errors += allValidations[subValidations[0]](jQuery(this))
            }

        }
        if(errors > 0){
            allErrors += 1;
            jQuery(this).attr('validation', 'false');
        }else{
            jQuery(this).attr("validation", "true");
        }
    })
    console.log(allErrors)
    if(allErrors > 0){
        return false;
    }else{
        jQuery(this).find('[type="submit"]').attr("type", "button");
        return true;
    }

}
