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
    email : function(it){
      var expresion = new RegExp(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
        if(!expresion.test(it.val())){
            this.showError(it, 'email');
            return 1;
        }
        this.hiddenError(it, 'email');
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

    if(allErrors > 0){
        return false;
    }else{
        jQuery(this).find('[type="submit"]').attr("type", "button");
        return true;
    }

}


function previewPhotoService(){

    console.log("pare");

}

