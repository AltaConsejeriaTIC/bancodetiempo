jQuery(document).ready(function(){
    callMessages();
    jQuery(".score").on("click", score)
    jQuery("form[form-validation]").on("change", ".validation", validation);
    jQuery("form[form-validation]").on("keyup", "textarea.validation", validation);
    jQuery("form[form-validation]").on("submit", validationGeneal);
})

function callMessages(){
    jQuery("#messages").load('/messages/'+jQuery("#messages").attr('conversation'), function(){
        jQuery(".showModal").on("click", showModal);
        jQuery(".hiddenModal").on("click", hiddenModal);
    });
    setTimeout(callMessages, 2000);
}

function showModal(){

    var modal = jQuery(this).attr("modal");
    var deal = jQuery(this).attr("deal");
    jQuery("#"+modal).addClass("show");
    jQuery("#"+modal).find("input[name='deal_id']").val(deal)
    jQuery("#"+modal).find(".shadow").on("click", function(){
         jQuery("#"+modal).removeClass("show");
    })
}

function hiddenModal(){
    var modal = jQuery(this).attr("modal")
    jQuery("#"+modal).removeClass("show");
}


function score(){
    var score = jQuery(this).attr("score");
    var input = jQuery(this).attr("input");
    jQuery("#"+input+" + label > i").removeClass("check")
    jQuery("input[name='"+input+"']").val(score);
    jQuery("input[name='"+input+"']").attr("validation", true);
    var s = score;
    while(s > 0){
        jQuery("#"+input+" + label > .star"+s).addClass("check")
        s -= 1;
    }
}

var allValidations = {
    required : function(it){
        if(it.val() == ''){
            this.showError(it.attr('name'), 'required');
            return 1;
        }
        this.hiddenError(it.attr('name'), 'required');
        return 0;
    },
    requiredCheck : function(it){
        if(!it.is(':checked')){
            this.showError(it.attr('name'), 'requiredCheck');
            return 1;
        }
        this.hiddenError(it.attr('name'), 'requiredCheck');
        return 0;
    },
    min : function(it, v){
        if(it.val().length < v){
            this.showError(it.attr('name'), 'min');
            return 1;
        }
        this.hiddenError(it.attr('name'), 'min');
        return 0;
    },
    max : function(it, v){
        if(it.val().length > v){
            this.showError(it.attr('name'), 'max');
            return 1;
        }
        this.hiddenError(it.attr('name'), 'max');
        return 0;
    },
    email : function(it){
      var expresion = new RegExp(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
        if(!expresion.test(it.val())){
            this.showError(it.attr('name'), 'email');
            return 1;
        }
        this.hiddenError(it.attr('name'), 'email');
        return 0;

    },
    minYear : function(it, v){
        if(this.years(it.val()) < v){
            this.showError(it.attr('name'), 'min');
            return 1;
        }
        this.hiddenError(it.attr('name'), 'min');
        return 0;
    },
    requiredIfNot : function(it, v){
        var br = jQuery("input[name='"+v+"']");
        if(!br.is(":checked") && !it.is(":checked")){
            br.attr('validation', 'false');
            this.showError(it.attr('name'), 'requiredIfNot');
            return 1;
        }
        br.attr('validation', 'true');
        this.hiddenError(br.attr('name'), 'requiredIfNot');
        this.hiddenError(it.attr('name'), 'requiredIfNot');
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
    showError : function(input, error){
        jQuery(".msg[errors='"+input+"'] p[error='"+error+"']").css('display', 'block');
    },
    hiddenError : function(input, error){
        jQuery(".msg[errors='"+input+"'] p[error='"+error+"']").css('display', 'none');
    }
}

function validation(){
    console.log(jQuery(this))
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

    if(allErrors > 0){
        return false;
    }

}



