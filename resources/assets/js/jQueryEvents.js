jQuery(document).ready(function(){
    if(jQuery("#messages").length){
       callMessages();
    }
    if(jQuery(".autoCompleteUsers").length){
       autoCompleteUsers();
    }

    if(jQuery("select.categories").length){
       listCategories();
    }

    if(jQuery(".preview").length){
       jQuery(".preview").each(function(){
           jQuery(this).on('change' ,previewImage);
       })
    }

    if(jQuery(".bannerHome").length){
       bannerHome();
    }
    jQuery(".score").on("click", score)
    jQuery("form[form-validation]").on("change", ".validation", validation);
    jQuery("form[form-validation]").on("keyup", "textarea.validation", validation);
    jQuery("form[form-validation]").on("submit", validationGeneal);

})

function bannerHome(){
    jQuery(".bannerHome .carousel").attr("banner", 0);
    animationBanner();
}

function animationBanner(){
    var actual = jQuery(".bannerHome .carousel").attr("banner");
    var next = parseInt(actual)+1;
    var description = jQuery("#bannerDescription");
    if(actual == parseInt(jQuery(".bannerHome .carousel").attr("slider"))){
        next = 1;
    }

    description.animate({opacity:0}, 100, function(){
        var newText = jQuery(".bannerHome .carousel .banner"+next).children(".description").html();

        setTimeout(function(){
            description.html(newText);
            description.animate({opacity:100}, 800);
        }, 1000);
    })

    jQuery(".bannerHome .carousel .banner"+actual).removeClass("active");
    jQuery(".bannerHome .carousel .banner"+next).addClass("active");

    jQuery(".bannerHome .carousel").attr("banner", next);
    setTimeout(animationBanner, 4000);

}

function callMessages(){

    jQuery.ajax({
        url : '/messages/'+jQuery("#messages").attr('conversation'),
        type : "GET",
        data : "key="+jQuery("#keyConversation").val(),
        success : function(data){
            if(data != ""){
                jQuery("#messages").html(data);
                jQuery(".showModal").on("click", showModal);
                jQuery(".hiddenModal").on("click", hiddenModal);
            }
        }
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

function previewImage(e){
    var id =  e.target.id;
    var files = e.target.files;
    var label = jQuery(e.target.labels[0]);
    if(files[0].size < 2000000){
        label.siblings(".error").remove();
        var image = new Image();
        var reader = new FileReader();
         reader.onload = (e) => {
             label.css("background-image", "url('"+e.target.result+"')")
         };
        reader.readAsDataURL(files[0]);
    }else{
        label.after("<p class='msg error'>El peso màximo de la imagen debe ser de 3 Megas.</p>")
    }

}

function listCategories(){

    jQuery("select.categories").each(function(){
        jQuery(this).append("<option value=''>Seleccione una categoria</option>")
        for(var index in window.categories){
            var select = ""
            if(jQuery(this).attr("option") == window.categories[index].id){
               select = "selected";
            }
            jQuery(this).append("<option value='"+window.categories[index].id+"' "+select+">"+window.categories[index].category+"</option>")
        }
    })

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

    if(allErrors > 0){
        return false;
    }else{
        jQuery(this).find('[type="submit"]').attr("type", "button");
        return true;
    }

}

function autoCompleteUsers(){
    jQuery(".autoCompleteUsers").each(function(){
        jQuery(this).before('<div id="collaborators"></div>')
        jQuery(this).after('<ul class="listComplete hidden"></ul>')
        jQuery(this).on("keyup", getAutoCompleteUsers);
        _autoCompleteUsers.el = jQuery(this);
        _autoCompleteUsers.getUsers();
        jQuery(window).click(function(e){
            var parents = jQuery(e.target).parents();
            var parent = _autoCompleteUsers.el.parent();
            var count = 0;
            for(var index in parents){
                var _class = parents[index].className;
                if(_class !== undefined){
                   if(_class.search("autoComplete") >= 0){
                        count += 1;
                    }
                }

            }
            if(count == 0){
                _autoCompleteUsers.el.siblings('.listComplete').addClass("hidden");
            }
        });
    })
}

function getAutoCompleteUsers (){
    text = jQuery(this).val();
    if(text.length >= 1){
       _autoCompleteUsers.showAutoComplete(_autoCompleteUsers.findUsers(text));
    }else{
       _autoCompleteUsers.el.siblings('.listComplete').addClass("hidden");
    }
}

var _autoCompleteUsers = {
    el : '',
    data: [],
    collaborators : [],
    collaborators_name : [],
    makeAutoComplete :function (){
        var autoCompleteHtml = '';
        for(var obj in this.data){
            autoCompleteHtml += "<li id='user"+this.data[obj].id+"' class='hidden'><input type='checkbox' id='collaborator"+this.data[obj].id+"' class='square' value='"+this.data[obj].id+"'><label for='collaborator"+this.data[obj].id+"'>"+this.data[obj].first_name+" "+this.data[obj].last_name+"</label></li>";
        }
        this.el.siblings(".listComplete").html(autoCompleteHtml);
        this.el.siblings(".listComplete").children("li").children("input").on("change", jQuery.proxy(this.addCollaborator, this))
    },
    showAutoComplete : function (list){
        if(list.length > 0){
            this.el.siblings(".listComplete").children("li").addClass("hidden")
            this.el.siblings(".listComplete").removeClass("hidden")
            for(var index in list){
                this.el.siblings(".listComplete").children("#user"+list[index]).removeClass('hidden');
            }
        }
    },
    addCollaborator : function (e){
        var elemt = jQuery(e.target);
        if(elemt.is(":checked")){
            this.collaborators.push(elemt.val());
            this.collaborators_name.push(elemt.siblings("label[for='"+elemt.attr('id')+"']").text());
        }else{
            var index = this.collaborators.indexOf(elemt.val());
            var index_name = this.collaborators_name.indexOf(elemt.siblings("label[for='"+elemt.attr('id')+"']").text());
            this.collaborators.splice(index, 1);
            this.collaborators_name.splice(index_name, 1);
        }
        this.el.siblings("#collaborators").html(this.collaborators_name.join());
        this.el.siblings("input[for='"+this.el.attr('name')+"']").val(this.collaborators)
    },
    findUsers: function(text){
        var users = [];
        for(var index in this.data){
            var name = this.data[index].first_name + " " + this.data[index].last_name;
            name = name.toLowerCase();
            text = text.toLowerCase();
            if(name.search(text) >= 0){
                users.push(this.data[index].id);
            }
        }
        return users;
    },
    getUsers : function(){
        var data
        jQuery.ajax({
            url : "/find/users",
            async : false,
            success: function(list){
                data = list
            }
        })

        this.data = JSON.parse(data);
        this.makeAutoComplete();
    }

}


